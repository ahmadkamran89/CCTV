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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('id')->constrained()->onDelete('set null');
        });

        // Data Migration
        $products = DB::table('products')->get();
        foreach ($products as $product) {
            if ($product->category) {
                $categoryName = match($product->category) {
                    'wireless'   => 'Wireless Cameras',
                    'outdoor'    => 'Outdoor & Wired Systems',
                    'smart_home' => 'Smart Home Security',
                    default      => ucwords(str_replace('_', ' ', $product->category))
                };

                $categoryId = DB::table('categories')->where('slug', $product->category)->value('id');

                if (!$categoryId) {
                    $categoryId = DB::table('categories')->insertGetId([
                        'name' => $categoryName,
                        'slug' => $product->category,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                DB::table('products')->where('id', $product->id)->update(['category_id' => $categoryId]);
            }
        }

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('category')->after('category_id')->nullable();
        });

        // Optional: Re-migrate data back if needed, but usually rollback just drops columns
        
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
