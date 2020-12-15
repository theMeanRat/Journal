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
        $article = Article::factory()->create(['author_id' => 999]); // We use an off-limits value of author_id so it is unlikely to conflict with an existing one.
        $this->assertEquals(999, $article->author_id);
    }

    /** @test */
    public function an_article_has_a_title()
    {
        $article = Article::factory()->create(['title' => 'Fake Title']);
        $this->assertEquals('Fake Title', $article->title);
    }

    /** @test */
    public function an_article_has_a_subtitle()
    {
        $article = Article::factory()->create(['subtitle' => 'Fake Subtitle']);
        $this->assertEquals('Fake Subtitle', $article->subtitle);
    }

    /** @test */
    public function an_article_has_an_introduction()
    {
        $article = Article::factory()->create(['introduction' => 'Fake Introduction']);
        $this->assertEquals('Fake Introduction', $article->introduction);
    }

    /** @test */
    public function an_article_has_content()
    {
        $article = Article::factory()->create(['content' => 'Fake Content']);
        $this->assertEquals('Fake Content', $article->content);
    }

    /** @test */
    public function an_article_has_a_main_image()
    {
        $article = Article::factory()->create(['main_image' => 'fake/main/image']);
        $this->assertEquals('fake/main/image', $article->main_image);
    }

    /** @test */
    public function an_article_has_a_date_published()
    {
        $datetime = new \DateTime();

        $article = Article::factory()->create(['date_published' => $datetime->format("Y-m-d H:i:s")]);
        $this->assertEquals($datetime->format("Y-m-d H:i:s"), $article->date_published);
    }

    /** @test */
    public function an_article_has_a_date_published_to()
    {
        $datetime = new \DateTime();

        $article = Article::factory()->create(['date_published_to' => $datetime->format("Y-m-d H:i:s")]);
        $this->assertEquals($datetime->format("Y-m-d H:i:s"), $article->date_published_to);
    }
}