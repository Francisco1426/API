<?php

namespace App;

use App\cliente;
use App\producto;

use App\Transformers\detalle_compraTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class detalle_compra extends Model
{
      use SoftDeletes;
    public $transformer = detalle_compraTransformer::class;
    protected $table = 'detalle_compras';
    protected $dates = ['deleted_at'];
  
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
      
        'idcliente',
        'idproducto'
      ];
      public function clientes()
    {
        return $this->belongsToMany(cliente::class);
    }
    public function productos()
    {
        return $this->belongsToMany(producto::class);
    }
}
