<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfilcliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->integer('telefono');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('pago', function (Blueprint $table) {
            $table->id('id_pago');
            $table->decimal('monto');
            $table->timestamps();
        });

        Schema::create('compra', function (Blueprint $table) {
            $table->id('id_compra');
            $table->unsignedBigInteger('cliente_id'); // Relación con categorias
            $table->foreign('cliente_id')->references('id_cliente')->on('perfilcliente');
            $table->unsignedBigInteger('pago_id'); // Relación con categorias
            $table->foreign('pago_id')->references('id_pago')->on('pago');
            $table->string('estado');
            $table->timestamps();

        });

        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->string('imagen');
            $table->timestamps();
        });

        Schema::create('detallecompras', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')->references('id_compra')->on('compra');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id_producto')->on('producto');
            $table->integer('cantidad');
            $table->decimal('preciocompra');
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
        Schema::dropIfExists('detallecompras');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('compra');
        Schema::dropIfExists('pago');
        Schema::dropIfExists('perfilcliente');
    }
}
