<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('razon', 150);
            $table->string('nom_fantasia', 150)->default('');
            $table->foreignId('iva_condicione_id')->constrained();
            $table->string('cuit', 15)->default('');
            $table->date('fec_inicio')->nullable();
            $table->string('nro_iibb', 15)->default('');
            $table->string('cbu_alias_fce', 30)->default('');
            $table->string('email', 150)->default('');
            $table->string('domicilio', 200)->default('');
            $table->string('localidad', 200)->default('');
            $table->string('cod_postal', 15)->default('');
            $table->foreignId('provincia_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
