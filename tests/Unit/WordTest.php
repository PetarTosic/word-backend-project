<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class WordTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_existing_word(): void
    {
        $response = $this->get('/api/word?word=something');
        $actualValue = $response->getContent();
        $this->assertEquals($actualValue, 9);
    }

    public function test_palindrome(): void
    {
        $response = $this->get('/api/word?word=madam');
        $actualValue = $response->getContent();
        $this->assertEquals($actualValue, 6);
    }

    public function test_almost_palindrome(): void
    {
        $response = $this->get('/api/word?word=all');
        $actualValue = $response->getContent();
        $this->assertEquals($actualValue, 4);
    }

    public function test_no_word(): void
    {
        $response = $this->get('/api/word');
        $actualValue = $response->getContent();
        $this->assertEquals($actualValue, 0);
    }

    public function test_non_existent_word(): void
    {
        $response = $this->get('/api/word?word=hellaw');
        $actualValue = $response->getContent();
        $this->assertEquals($actualValue, 0);
    }

    public function test_numbers(): void 
    {
        $response = $this->get('/api/word?word=123141');
        $actualValue = $response->getContent();
        $this->assertEquals($actualValue, 0);
    }
}
