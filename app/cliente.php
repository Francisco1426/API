<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\clienteTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;


class cliente extends Model

    {
   use SoftDeletes;
    public $transformer = clienteTransformer::class;
    protected $table = 'clientes';
    protected $dates = ['deleted_at'];
  
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'nombre',
          'apellidos',
          'ubicacion',
          'email',
          'password',
          'telefono'
      ];
      public function detalle_compras()
      {
          return $this->belongsToMany(detalle_compra::class);
      }
}

