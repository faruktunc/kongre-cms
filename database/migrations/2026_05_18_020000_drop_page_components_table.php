<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('page_components');
    }

    public function down(): void
    {
        // PageComponent kaldırıldığı için geri oluşturulmuyor.
    }
};
