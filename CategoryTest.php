<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */

    public function test_user_can_update_category()
    {
        $user = \App\Models\User::factory()->create();
        $category = \App\Models\Category::factory()->create([
            'name' => 'Lama',
        ]);

        $response = $this->actingAs($user)->put("/categories/{$category->id}", [
            'name' => 'Baru',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('categories', ['name' => 'Baru']);
    }

}
