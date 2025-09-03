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
        // Schema::table('payments', function (Blueprint $table) {
        //     // tambah kolom status
        //     $table->string('status')->default('pending')->after('id');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('payments', function (Blueprint $table) {
        //     // hapus kolom status kalau rollback
        //     $table->dropColumn('status');
        // });
    }
};
