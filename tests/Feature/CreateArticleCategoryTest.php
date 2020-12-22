<?php

namespace MyVisions\Journal\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MyVisions\Journal\Models\ArticleCategory;
use MyVisions\Journal\Tests\TestCase;
use MyVisions\Journal\Tests\User;

class CreateArticleCategoryTest extends TestCase
{
    /** @test */
    public function only_authenticated_users_can_create_article_categories()
    {
        $this->assertFalse(auth()->check());

        $this->post(route('articleCategories.store'), [
            'name' => 'My first fake category'
        ])->assertForbidden();

        // Of course we start with no articles created
        $this->assertCount(0, ArticleCategory::all());

        $user = User::factory()->create();

        // create an article
        $response = $this->actingAs($user)->post(route('articleCategories.store'), [
            'name' => 'My First Fake Category',
        ]);

        // And now we should have one article
        $this->assertCount(1, ArticleCategory::all());

        tap(ArticleCategory::first(), function ($articleCategory) use ($response) {
            $this->assertEquals('My First Fake Category', $articleCategory->name);
            $response->assertRedirect(route('articleCategories.show', $articleCategory));
        });

    }
}