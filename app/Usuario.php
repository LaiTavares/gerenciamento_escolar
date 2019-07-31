<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //attibutes
    protected $table = "usuario";
    protected $fillable=["nome", "email", "data_nascimento", "nivel_id"];

    //relationships
    public function nivel(){
        return $this->belongsTo("App\Nivel"); //belongsTo in the model that has foreign key
    }
}
