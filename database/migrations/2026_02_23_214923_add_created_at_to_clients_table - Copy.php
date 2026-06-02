<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (! Schema::hasColumn('clients', 'created_at')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->timestamp('created_at')->nullable();
            });
        }
    }

    public function down()
    {
        // Do nothing, because created_at may already belong to the original clients table.
    }
};