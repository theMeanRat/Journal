<?php

namespace MyVisions\Journal\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MyVisions\Journal\Tests\TestCase;
use MyVisions\Journal\Models\ArticleCategory;

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
}