<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model

    {
        protected $fillable=['descricao'];
        protected $guarded=['id','created_at','update_at'];
        protected $table='categorias';
    
        public function despesas(){
            return $this->belongsTo(Despesa::class);
        }
    }  

