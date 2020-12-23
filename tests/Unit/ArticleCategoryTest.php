<?php

namespace MyVisions\Journal\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MyVisions\Journal\Tests\TestCase;
use MyVisions\Journal\Models\ArticleCategory;
use MyVisions\Journal\Models\Article;

class ArticleCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_article_category_has_a_name()
    {
        $articleCategory = ArticleCategory::factory()->create([
            'name' => 'Fake Category Name'
        ]);

        $this->assertEquals('Fake Category Name', $articleCategory->name);
    }

    /** @test */
    public function an_article_category_has_many_articles()
    {
        $firstArticleCategory = ArticleCategory::factory()->create([
            'name' => 'First category'
        ]);

        $secondArticleCategory = ArticleCategory::factory()->create([
            'name' => 'Second category'
        ]);

        Article::factory()->create([
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => $firstArticleCategory->id,
            'slug' => 'my-first-fake-title',
            'title' => 'Fake First Title'
        ]);

        Article::factory()->create([
            'subtitle' => 'My second fake subtitle',
            'introduction' => 'My second fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => $firstArticleCategory->id,
            'slug' => 'my-second-fake-title',
            'title' => 'Fake Second Title'
        ]);

        Article::factory()->create([
            'subtitle' => 'My third fake subtitle',
            'introduction' => 'My third fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => $firstArticleCategory->id,
            'slug' => 'my-third-fake-title',
            'title' => 'Fake Third Title'
        ]);

        Article::factory()->create([
            'subtitle' => 'My fourth fake subtitle',
            'introduction' => 'My fourth fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => $secondArticleCategory->id,
            'slug' => 'my-fourth-fake-title',
            'title' => 'Fake Fourth Title'
        ]);

        Article::factory()->create([
            'subtitle' => 'My fifth fake subtitle',
            'introduction' => 'My fifth fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => $secondArticleCategory->id,
            'slug' => 'my-fifth-fake-title',
            'title' => 'Fake Fifth Title'
        ]);

        $this->assertCount(3, $firstArticleCategory->articles()->get());
        $this->assertCount(2, $secondArticleCategory->articles()->get());
    }
}