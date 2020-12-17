<?php

namespace MyVisions\Journal\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MyVisions\Journal\Models\Article;
use MyVisions\Journal\Tests\TestCase;
use MyVisions\Journal\Tests\User;

class CreateArticleTest extends TestCase
{

    /** @test */
    public function authenticated_users_can_create_an_article()
    {
        // Of course we start with no articles created
        $this->assertCount(0, Article::all());

        $author = User::factory()->create();

        // create an article
        $response = $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'My first fake content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ]);

        // And now we should have one article
        $this->assertCount(1, Article::all());

        tap(Article::first(), function ($article) use ($response, $author) {
            $this->assertEquals('My first fake title', $article - title);
            $this->assertEquals('My first fake subtitle', $article->subtitle);
            $this->assertEquals('My first fake introduction', $article->introduction);
            $this->assertEquals('My first fake content', $article->content);
            $this->assertEquals('fake/image/path', $article->main_image);
            $this->assertTrue($article->active);
            $this->assertEquals('my-first-fake-title', $article->slug);
            $this->assertTrue($article->author->is($author));
            $response->assertRedirect(route('articles.show', $article));
        });
    }

    /** @test */
    public function an_article_requires_a_title()
    {
        $author = User::factory()->create();

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => '',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'My first fake content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ])->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_article_requires_a_subtitle()
    {
        $author = User::factory()->create();

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'My first fake title',
            'subtitle' => '',
            'introduction' => 'My first fake introduction',
            'content' => 'My first fake content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ])->assertSessionHasErrors('subtitle');
    }

    /** @test */
    public function an_article_requires_an_introduction()
    {
        $author = User::factory()->create();

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => '',
            'content' => 'My first fake content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ])->assertSessionHasErrors('introduction');
    }

    /** @test */
    public function an_article_requires_content()
    {
        $author = User::factory()->create();

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => '',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ])->assertSessionHasErrors('content');
    }

    /** @test */
    public function an_article_requires_a_main_image()
    {
        $author = User::factory()->create();

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'My first fake content',
            'main_image' => '',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ])->assertSessionHasErrors('main_image');
    }

    /** @test */
    public function an_article_requires_a_slug()
    {
        $author = User::factory()->create();

        $this->actingAs($author)->article(route('articles.store'), [
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'My first fake content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => ''
        ])->assertSessionHasErrors('slug');
    }

    /** @test */
    public function guests_can_not_create_articles()
    {
        // We're starting from an unauthenticated state
        $this->assertFalse(auth()->check());

        $this->article(route('articles.store'), [
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'My first fake content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ])->assertForbidden();
    }

    /** @test */
    public function all_articles_are_shown_via_the_index_route()
    {
        Article::factory()->create([
            'title' => 'My first fake title 1',
            'subtitle' => 'My first fake subtitle 1',
            'introduction' => 'My first fake introduction 1',
            'content' => 'My first fake content 1',
            'main_image' => 'fake/image/path1',
            'active' => true,
            'slug' => 'my-first-fake-title-1'
        ]);

        Article::factory()->create([
            'title' => 'My first fake title 2',
            'subtitle' => 'My first fake subtitle 2',
            'introduction' => 'My first fake introduction 2',
            'content' => 'My first fake content 2',
            'main_image' => 'fake/image/path2',
            'active' => true,
            'slug' => 'my-first-fake-title-2'
        ]);

        Article::factory()->create([
            'title' => 'My first fake title 3',
            'subtitle' => 'My first fake subtitle 3',
            'introduction' => 'My first fake introduction 3',
            'content' => 'My first fake content 3',
            'main_image' => 'fake/image/path3',
            'active' => true,
            'slug' => 'my-first-fake-title-3'
        ]);

        // We expect them to all show up
        // with their title on the index route
        $this->get(route('articles.index'))
            ->assertSee('My first fake title 1')
            ->assertSee('My first fake title 2')
            ->assertSee('My first fake title 3')
            ->assertDontSee('My first fake title 4');
    }

    /** @test */
    public function a_single_article_is_shown_via_the_show_route()
    {
        $article = Article::factory()->create([
            'title' => 'My first fake title',
            'subtitle' => 'My first fake subtitle',
            'introduction' => 'My first fake introduction',
            'content' => 'My first fake content',
            'main_image' => 'fake/image/path',
            'active' => true,
            'slug' => 'my-first-fake-title'
        ]);

        $this->get(route('articles.show', $article))
            ->assertSee('My first fake title')
            ->assertSee('My first fake content');
    }
}