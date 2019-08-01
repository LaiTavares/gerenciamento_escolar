<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model{
    protected $table = "nivel";
    protected $fillable = ["nome"];

    public $timestamps = false;

    //relationships
    public function usuarios(){
        return $this->hasMany("App\Usuario");
    }


}
