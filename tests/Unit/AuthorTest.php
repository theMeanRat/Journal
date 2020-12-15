<?php

namespace MyVisions\Journal\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MyVisions\Journal\Models\Author;
use MyVisions\Journal\Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_has_a_user_id()
    {
        $author = Author::factory()->create(['user_id' => 999]); // We use an off-limits value of user_id so it is unlikely to conflict with an existing one.
        $this->assertEquals(999, $author->user_id);
    }

    /** @test */
    public function an_author_has_a_first_name()
    {
        $author = Author::factory()->create(['first_name' => 'Jan']);
        $this->assertEquals('Jan', $author->first_name);
    }

    /** @test */
    public function an_author_has_a_last_name()
    {
        $author = Author::factory()->create(['last_name' => 'Janssen']);
        $this->assertEquals('Janssen', $author->last_name);
    }

    /** @test */
    public function an_author_has_an_email()
    {
        $author = Author::factory()->create(['email' => 'fake@email.nl']);
        $this->assertEquals('fake@email.nl', $author->email);
    }

}