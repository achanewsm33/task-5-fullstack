<?php

namespace Database\Factories;

use App\Models\Category; // ← tambahkan ini di atas class

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Category::class; // ← INI YANG HARUS ADA

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'user_id' => 1, // sesuaikan dengan user seeder
        ];
    }
}
