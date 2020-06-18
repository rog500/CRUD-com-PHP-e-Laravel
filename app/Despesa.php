<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
    {
        protected $fillable=['descricao','data','valor','categoria_id'];
        protected $guarded=['id','created_at','update_at'];
        protected $table='despesas';
    
        public function categorias(){
            return $this->hasMany(Categoria::class);
        }
    }  

