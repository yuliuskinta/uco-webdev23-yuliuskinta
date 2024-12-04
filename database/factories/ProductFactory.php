<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil category secara random
        $category = Category::inRandomOrder()->first();

        // Buat nama palsu
        $name = fake()->name();

        // Download gambar dari https://placehold.co dengan warna background random, warna font putih, dan bertuliskan nama produk
        $image_color = str_replace('#', '', fake()->hexColor());
        $file_image = file_get_contents(url()->query("https://placehold.co/400x400/$image_color/white/png", ['text' => $name]));

        // Simpan ke folder public/storage/products dengan nama random dari uniqid
        $file_path = "storage/products/".uniqid().".png";
        file_put_contents("public/". $file_path, $file_image);

        return [
            'name' => $name,
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(100000, 5000000),
            'category_id' => $category->id,
            'image' => $file_path
        ];
    }
}
