<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('documents')
            ->whereIn('type', ['pdfDocument', 'infoPdf'])
            ->delete();
    }

    public function down(): void
    {
        // Kaldırılan PDF içerikleri geri yüklenmiyor.
    }
};
