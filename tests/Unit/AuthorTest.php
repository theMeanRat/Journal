<?php

namespace MyVisions\Journal\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MyVisions\Journal\Models\Author;
use MyVisions\Journal\Tests\TestCase;
use MyVisions\Journal\Tests\User;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $user->autdhor()->create([
            'first_name' => 'Fake first name',
            'last_name' => 'Fake last name',
            'email' => 'fake@email.nl'
        ]);

        $this->assertCount(1, User::all());

        $author = $user->author();
        echo $author->first_name;
        die();
        // Using tap() to alias $user->author() to $author
        // To provide cleaner and grouped assertions
        tap($user->author(), function ($author) use ($user) {
            $this->assertEquals('Fake first name', $author->first_name);
            $this->assertEquals('Fake last name', $author->last_name);
            $this->assertTrue($author->user->is($user));
        });
    }

    /** @test */
    function an_author_has_a_user_type()
    {
        $user = User::factory()->create(['user_type' => 'Fake\User']);
        $this->assertEquals('Fake\User', $user->user_type);
    }

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