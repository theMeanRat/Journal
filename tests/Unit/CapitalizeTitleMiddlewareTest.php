<?php

namespace MyVisions\Journal\Tests\Unit;

use Illuminate\Http\Request;
use MyVisions\Journal\Http\Middleware\CapitalizeTitle;
use MyVisions\Journal\Tests\TestCase;

class CapitalizeTitleMiddlewareTest extends TestCase
{
    /** @test */
    public function it_capitalizes_the_request_title()
    {
        $request = new Request();

        $request->merge(['title' => 'some title']);

        (new CapitalizeTitle())->handle($request, function($request) {
            $this->assertEquals('Some title', $request->title);
        });
    }
}