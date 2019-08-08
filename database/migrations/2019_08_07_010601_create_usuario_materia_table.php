<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //relação n para n -> abaixo está sendo criada a tabela
    public function up()


    {
        Schema::create('usuario_materia', function (Blueprint $table) {
            $table->integer('carga_horaria');
            $table->integer('materia_id')->unsigned();
            $table->integer('usuario_id')->unsigned(); //coluninha da tabela 
            //referencia a coluna criada acima com uma coluna de outra tabela.
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade'); 
            $table->foreign('materia_id')->references('id')->on('materia')->onDelete('cascade');
            //a linha abaixo aponta para as variaveis e diz que elas as chaves primárias
            $table->primary(['materia_id', 'usuario_id']); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_materia');
    }
}
