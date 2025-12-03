<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // If weight/category already exist, remove these two lines
          
            $table->decimal('price_dubai', 10, 2)->nullable()->after('s_price');
            $table->decimal('price_shj_ajm', 10, 2)->nullable()->after('price_dubai');
            $table->decimal('price_other', 10, 2)->nullable()->after('price_shj_ajm');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'price_dubai',
                'price_shj_ajm',
                'price_other',
            ]);
        });
    }
};
