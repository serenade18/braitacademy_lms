<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCertificatePriceToWebinarsTable extends Migration
{
    public function up()
    {
        Schema::table('webinars', function (Blueprint $table) {
            $table->decimal('certificate_price', 15, 2)->nullable()->after('price');
        });
    }

    public function down()
    {
        Schema::table('webinars', function (Blueprint $table) {
            $table->dropColumn('certificate_price');
        });
    }
}