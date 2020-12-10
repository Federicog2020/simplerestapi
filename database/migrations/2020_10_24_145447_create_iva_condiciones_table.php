<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIvaCondicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iva_condiciones', function (Blueprint $table) {
            $table->id();
            $table->string('descrip_cond', 150);
            $table->timestamps();
        });

        DB::table('iva_condiciones')->insert([
            ['id' => 1, 'descrip_cond' => 'IVA Responsable Inscripto'],
            ['id' => 2, 'descrip_cond' => 'IVA Responsable NO Inscripto'],
            ['id' => 3, 'descrip_cond' => 'IVA no Responsable'],
            ['id' => 4, 'descrip_cond' => 'IVA Sujeto Exento'],
            ['id' => 5, 'descrip_cond' => 'Consumidor Final'],
            ['id' => 6, 'descrip_cond' => 'Responsable Monotributo'],
            ['id' => 7, 'descrip_cond' => 'Sujeto no Categorizado'],
            ['id' => 8, 'descrip_cond' => 'Proveedor del Exterior'],
            ['id' => 9, 'descrip_cond' => 'Cliente del Exterior'],
            ['id' => 10, 'descrip_cond' => 'IVA Liberado - Ley Nº 19640'],
            ['id' => 11, 'descrip_cond' => 'IVA Responsable Inscripto - Ag'],
            ['id' => 12, 'descrip_cond' => 'Pequeño Contribuyente Eventual'],
            ['id' => 13, 'descrip_cond' => 'Monotributista Social'],
            ['id' => 14, 'descrip_cond' => 'Pequeño Contribuyente Eventual']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iva_condiciones');
    }
}
