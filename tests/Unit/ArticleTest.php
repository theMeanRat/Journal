<?php

namespace MyVisions\Journal\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MyVisions\Journal\Tests\TestCase;
use MyVisions\Journal\Models\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_article_has_an_author_id()
    {
        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => 999,
            'slug' => 'my-first-fake-title'
        ]);

        // We use an off-limits value of author_id so it is unlikely to conflict with an existing one.
        $this->assertEquals(999, $article->author_id);
    }

    /** @test */
    public function an_article_has_a_title()
    {
        $article = Article::factory()->create([
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => 999,
            'slug' => 'my-first-fake-title',
            'title' => 'Fake Title'
        ]);
        $this->assertEquals('Fake Title', $article->title);
    }

    /** @test */
    public function an_article_has_a_subtitle()
    {
        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => 999,
            'slug' => 'my-first-fake-title',
            'subtitle' => 'Fake Subtitle'
        ]);
        $this->assertEquals('Fake Subtitle', $article->subtitle);
    }

    /** @test */
    public function an_article_has_an_introduction()
    {
        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => 999,
            'slug' => 'my-first-fake-title',
            'introduction' => 'Fake Introduction'
        ]);
        $this->assertEquals('Fake Introduction', $article->introduction);
    }

    /** @test */
    public function an_article_has_content()
    {
        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'article_category_id' => 999,
            'author_id' => 999,
            'slug' => 'my-first-fake-title'
        ]);
        $this->assertEquals('Fake Content', $article->content);
    }

    /** @test */
    public function an_article_has_a_main_image()
    {
        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => 999,
            'slug' => 'my-first-fake-title'
        ]);
        $this->assertEquals('fake/image/path', $article->main_image);
    }

    /** @test */
    public function an_article_has_a_date_published()
    {
        $datetime = new \DateTime();

        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => 999,
            'slug' => 'my-first-fake-title',
            'date_published' => $datetime->format("Y-m-d H:i:s")]);
        $this->assertEquals($datetime->format("Y-m-d H:i:s"), $article->date_published);
    }

    /** @test */
    public function an_article_has_a_date_published_to()
    {
        $datetime = new \DateTime();

        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'Fake Content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'author_id' => 999,
            'article_category_id' => 999,
            'slug' => 'my-first-fake-title',
            'date_published_to' => $datetime->format("Y-m-d H:i:s")]);
        $this->assertEquals($datetime->format("Y-m-d H:i:s"), $article->date_published_to);
    }
}