<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_can_create_article()
    {
        $user = \App\Models\User::factory()->create();
        $category = \App\Models\Category::factory()->create([
            'name' => 'Test Category',
        ]);
        
        $response = $this->actingAs($user)->post('/articles', [
            'title' => 'Test Judul',
            'content' => 'Ini isi test',
            'category_id' => $category->id,
        ]);
        
        $response->assertRedirect(); // pastikan controller memang redirect
        $this->assertDatabaseHas('articles', ['title' => 'Test Judul']);
    }

}
