<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\productoTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;


class producto extends Model
{
      use SoftDeletes;
    public $transformer = productoTransformer::class;
    protected $table = 'productos';
    protected $dates = ['deleted_at'];
  
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'nombre',
          'descripcion',
          'cantidad',
          'costo'
      ];
      public function detalle_compras()
      {
          return $this->belongsToMany(detalle_compra::class);
      }
}