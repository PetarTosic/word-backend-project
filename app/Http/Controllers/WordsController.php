<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\WordHelper;

class WordsController extends Controller
{
    private WordHelper $wordHelper;

    public function __construct(WordHelper $wordHelper) {
        $this->wordHelper = $wordHelper;
    }

    public function check(Request $request)
    {
        if(!$request->word){
            return 0;
        }

        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/$request->word")->json();
        
        if(!array_key_exists(0, $response)){
            return 0;
        }

        $word = $response[0]['word'];
        
        $points = $this->wordHelper->uniqueLetters($word);

        if($this->wordHelper->checkPalindrome($word))
        {
            $points += 3;
        }else if($this->wordHelper->checkAlmostPalindrome($word)) 
        {
            $points += 2;
        }

        return $points;
    }
}
