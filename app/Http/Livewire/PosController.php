<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use Livewire\Component;
use App\Models\Product;
use Darryldecode\cart\Facades\cartFacade as Cart;
use DB;

class PosController extends Component
{
    public $total,$itemsQuantity,$efectivo,$change;
    public function mount(){
     $this->efectivo=0;
     $this->change=0;
     $this->total=Cart::getTotal();
     $this->itemsQuantity=Cart::getTotalQuantity();
    }
    public function render()
    {

        return view('livewire.pos.component',[
            'denominations'=>Denomination::orderBY('value','desc')->get(),
            'cart'=>Cart::getContent()->sortBy('name')
        ])->extends('layouts.theme.app')->section('content');
    }
    public function ACash($value){
        $this->efectivo+=($value==0?$this->total: $value);
        $this->change=($this->efectivo-$this->total);
    }
     protected $listeners=[
        'scan-code'=>'ScanCode',
        'removeItam'=>'removeItem',
        'clearCart'=>'clearCart',
        'saveSale'=>'saveSale'
     ];
     public function ScanCode($barcode,$cant=1){
        $product=Product::where('barcode',$barcode)->first();
        if ($product==null||empty($empty)) {
            $this->emit('scan-notfound','El producto no esta registrado');
        }else{
            if ($this->InCart($product->id)) {
                $this->increaseQty($product->id);
                return;
            }
            if ($product->stock<1) {
                $this->emit('no-stock','Stock insuficiente');
                return;

             }
           Cart::add($product->id,$product->name,$product->price,$cant,$product->image);
           $this->total=Cart::getTotal();
           $this->emit('scan-ok','Producto Agregado');
        }
     }
     public function InCart($productId){
      $exist=Cart::get($productId);
      if ($exist)
          return true;
          else
            return false;

     }
     public function increaseQty($productId,$cant=1){
        $title='';
        $product=Product::find($productId);
        $exist=Cart::get($productId);
        if ($exist)
           $title='Cantidad actualizada';
           else $title='Producto Agregado';
        if ($exist) {
        if ($product->stock<($cant+$exist->quantity)) {
            $this->emit('no-stock','Stock insuficiente');
            return;
        }
        }
        Cart::add($product->id,$product->name,$product->price,$cant,$product->image);
         $this->total=Cart::getTotal();
         $this->itemsQuantity=Cart::getTotalQuantity();
         $this->emit('scan-ok',$title);
     }
     public function updateQty($productId,$cant=1){
       $title='';
       $products=Product::find($productId);
       $exist=Cart::get($productId);
       if ($exist)
        $title='Cantidad actualizada';
        else
            $title='Producto agregadp';
        if ($exist) {
            if ($product->stock<$cant){
                $this->emit('no-stock','Stock insuficiente');
                return;
            }
        }
        $this->removeItem($productId);
        if ($cant>0) {
            Cart::add($product->id,$product->name,$product->price,$cant,$product->image);
            $this->total=Cart::getTotal();
            $this->itemsQuantity=Cart::getTotalQuantity();
            $this->emit('scan-ok',$title);
        }
    }
        public function removeItem($productId){
            Cart::remove($productId);
            $this->total=Cart::getTotal();
            $this->itemsQuantity=Cart::getTotalQuantity();
            $this->emit('scan-ok','Producto eliminado');
        }
        public function decreaseQty($productId){
         $item=Cart::get($productId);
         Cart::remove($productId);
         $newQty=($item->quantity)-1;
         if ($newQty>0)
             Cart::add($item->id,$item->name,$item->price,$newQty,$item->attributes[0]);
         $this->total=Cart::getTotal();
            $this->itemsQuantity=Cart::getTotalQuantity();
            $this->emit('scan-ok','Cantidad actualizada');
        }
        public function clearCart(){
            Cart::clear();
            $this->efectivo=0;
            $this->change=0;
           $this->total=Cart::getTotal();
            $this->itemsQuantity=Cart::getTotalQuantity();
            $this->emit('scan-ok','Carro vacio');
        }
      public function saveSale(){
        if ($this->total<=0) {
            $this->emit('sale-error','Agrega Productos a la venta');
            return;
        }
        if ($this->efectivo<=0) {
            $this->emit('sale-error','ingresa el efectivo');
            return;
        }
        if ($this->total>$this->efectivo) {
            $this->emit('sale-error','El Efectivo debe ser mayor o igual al total');
            return;
        }
        DB::beginTransaction();
        try{
         $sale=Sale::create([
            'total'=>$this->total,
            'items'=>$this->itemsQuantity,
            'cash'=>$this->efectivo,
            'change'=>$this->change,
            'user_id'=>Auth()->user()->id
         ]);
         if ($sale) {
             $items=Cart::getContent();
             foreach($items as $item){
               SaleDetail::create([
                'price'=>$item->price,
                'quantity'=>$item->quantity,
                'product_id'=>$item->product_id,
                'sale'=>$sale->id,
               ]);
               //update stock
               $product=Product::find($item->id);
               $product->stock=$product->stock-$item->quantity;
               $product->save();
             }
         }
         DB::commit();
         Cart::clear();
         $this->efectivo=0;
         $this->change=0;
        $this->total=Cart::getTotal();
            $this->itemsQuantity=Cart::getTotalQuantity();
            $this->emit('sale-ok','Venta registrada correctamente');
            $this->emit('print-ticket',$sale->id);
        }catch(Exception $e){
          DB::rollback();
          $this->emit('sale-error',$e->getMessage());
        }
      }
      public function printTicket($sale){
        return Redirect::to("print://$sale->id");
      }

}
