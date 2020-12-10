<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('descrip_prov', 150);
            $table->timestamps();
        });

        DB::table('provincias')->insert([
            ['id' => 1, 'descrip_prov' => 'CIUDAD AUTONOMA DE BS. AS.'],
            ['id' => 2, 'descrip_prov' => 'BUENOS AIRES'],
            ['id' => 3, 'descrip_prov' => 'CATAMARCA'],
            ['id' => 4, 'descrip_prov' => 'CORDOBA'],
            ['id' => 5, 'descrip_prov' => 'CORRIENTES'],
            ['id' => 6, 'descrip_prov' => 'ENTRE RIOS'],
            ['id' => 7, 'descrip_prov' => 'JUJUY'],
            ['id' => 8, 'descrip_prov' => 'MENDOZA'],
            ['id' => 9, 'descrip_prov' => 'LA RIOJA'],
            ['id' => 10, 'descrip_prov' => 'SALTA'],
            ['id' => 11, 'descrip_prov' => 'SAN JUAN'],
            ['id' => 12, 'descrip_prov' => 'SAN LUIS'],
            ['id' => 13, 'descrip_prov' => 'SANTA FE'],
            ['id' => 14, 'descrip_prov' => 'SANTIAGO DEL ESTERO'],
            ['id' => 15, 'descrip_prov' => 'TUCUMAN'],
            ['id' => 16, 'descrip_prov' => 'CHACO'],
            ['id' => 17, 'descrip_prov' => 'CHUBUT'],
            ['id' => 18, 'descrip_prov' => 'FORMOSA'],
            ['id' => 19, 'descrip_prov' => 'MISIONES'],
            ['id' => 20, 'descrip_prov' => 'NEUQUEN'],
            ['id' => 21, 'descrip_prov' => 'LA PAMPA'],
            ['id' => 22, 'descrip_prov' => 'RIO NEGRO'],
            ['id' => 23, 'descrip_prov' => 'SANTA CRUZ'],
            ['id' => 24, 'descrip_prov' => 'TIERRA DE FUEGO'],
            ['id' => 25, 'descrip_prov' => 'EXTERIOR']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
