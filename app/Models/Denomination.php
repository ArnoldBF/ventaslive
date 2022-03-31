<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
    use HasFactory;
    protected $fillable=['type','value','image'];

    public function getImagenAttribute(){
        if($this->image==null)
        return'imagen-no-disponible.jpg';
        if(file_exists('storage/denominations/'.$this->image))
        return $this->image;
        else
        return'imagen-no-disponible.jpg';
 
    }
}
