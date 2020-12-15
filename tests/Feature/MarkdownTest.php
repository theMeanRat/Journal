<?php

use MyVisions\Journal\Tests\TestCase;

class MarkdownTest extends TestCase
{

    /** @test */
    public function experiment()
    {
        $parsedown = new Parsedown();

        $this->assertTrue(true);
    }
}