<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('larprojects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number');

            $table->date('invoice_Date');
            $table->date('due_date');

            $table->string('product');

            $table->string('section');

            $table->string('discount');

            $table->string('rate_vat');

            $table->decimal('value_vat',8,2);

            $table->decimal('Total',8,2);

            $table->string('Status', 50);

            $table->integer('value_status');

            $table->text('note')->nullable();

            $table->string('user');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('larprojects');
    }
};
