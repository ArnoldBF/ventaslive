<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductsController extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $barcode, $cost, $price, $stock, $alerts, $categoryid,$search,$image,$selected_id,
    $pageTitle,$componentName;
    private $pagination=4;
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function mount(){
        $this->pageTitle='Listado';
        $this->componentName='Productos';
        $this->categoryid='Elegir';
    }
    public function render()
    {
        if (strlen($this->search) > 0)
         $products= Product::join('categories as c','c.id','products.category_id')
            ->select('products.*','c.name as category')
            ->where('products.name','like','%'.$this->search.'%')
            ->orWhere('products.barcode','like','%'.$this->search.'%')
            ->orWhere('c.name','like','%'.$this->search.'%')
            ->orderby('products.name','asc')
             ->paginate($this->pagination);

        else
             $products= Product::join('categories as c','c.id','products.category_id')
             ->select('products.*','c.name as category')
             ->orderby('products.name','asc')
             ->paginate($this->pagination);
        return view('livewire.products.component',[
            'data'=>$products,
            'categories'=>Category::orderby('name','asc')->get()

        ])->extends('layouts.theme.app')
          ->section('content');
    }

    public function Store(){
       $rules=[
        'name'=> 'required|unique:products|min:3',
        'cost'=>'required',
        'price'=>'required',
        'stock'=>'required',
        'alerts'=>'required',
        'categoryid'=>'required|not_in:Elegir',

       ];
       $messages=[
        'name.required'=>'Favor de ingresar el nombre del producto',
        'name.unique'=>'El nombre de producto se encuentra en uso',
        'name.min'=>'El nombre del producto no cuenta con el minimo de caracteres',
        'cost.required'=>'El costo es requerido',
        'price.required'=>'El precio es requerido',
        'stock.required'=>'El stock es requerido',
        'alerts.required'=>'Favor de ingresar el valor minimo en inventario',
        'categoryid.not_in'=>'Favor de selecionar un categoria',
       ];

       $this->validate($rules, $messages);
      $product=Product::create([
        'name'=>$this->name,
        'cost'=>$this->cost,
        'price'=>$this->price,
        'barcode'=>$this->barcode,
        'stock'=>$this->stock,
        'alerts'=>$this->alerts,
        'category_id'=>$this->categoryid


      ]);
        $customFileName;

      if ($this->image) {
          // code...
        $customFileName=uniqid(). '_.'.$this->image->extension();
        $this->image->storeAs('public/products',$customFileName);
        $product->image=$customFileName;
        $product->save();
      }
      $this->resetUI();
      $this->emit('product-added', 'Producto Registrado');


    }
    public function resetUI(){


    }
}
