<?php

use App\Models\Board;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('boards', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
        });

        Board::query()->each(function (Board $board): void {
            $base = Str::slug($board->name);
            $slug = $base ?: 'kurul-'.Str::lower(Str::random(6));

            $count = 1;
            $candidate = $slug;
            while (Board::where('slug', $candidate)->where('id', '!=', $board->id)->exists()) {
                $candidate = $slug.'-'.$count++;
            }

            $board->slug = $candidate;
            $board->saveQuietly();
        });

        Schema::table('boards', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('boards', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
