<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Helpers\WordHelper;
use Illuminate\Http\Request;
use Tests\TestCase;

class FunctionTest extends TestCase
{
    private WordHelper $wordHelper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->wordHelper = app(WordHelper::class);
    }
	
    public function test_for_palindrome(): void 
    {
        $helper = $this->wordHelper->checkPalindrome('madam');
        $helper2 = $this->wordHelper->checkPalindrome('hello');

		$this->assertEquals($helper, true);
        $this->assertEquals($helper2, false);
    }

    public function test_for_unique_letters(): void 
    {
        $helper = $this->wordHelper->uniqueLetters('something');
        $helper2 = $this->wordHelper->uniqueLetters('airplane');

        $this->assertEquals($helper, 9);
        $this->assertEquals($helper2, 7);
    }

    public function test_for_almost_palindrome(): void 
    {
        $helper = $this->wordHelper->checkAlmostPalindrome('all');
        $helper2 = $this->wordHelper->checkAlmostPalindrome('hello');
        
        $this->assertEquals($helper, true);
        $this->assertEquals($helper2, false);
    }
}
