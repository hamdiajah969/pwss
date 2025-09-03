<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('dues_categories', function (Blueprint $table) {
            $table->string('petugas')->after('payment_type')->nullable();
        });
    }

     
    public function down(): void
    {
        Schema::table('dues_categories', function (Blueprint $table) {
            $table->dropColumn('petugas');
        });
    }
};
