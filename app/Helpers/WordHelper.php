<?php

namespace App\Helpers;

class WordHelper {

  public function checkPalindrome($word) {
    if($word === strrev($word)) {
      return true;
    }

    return false;
  }

  public function checkAlmostPalindrome($word) {
    $checker = false;

    for($i = 0; $i < strlen($word); $i++) {

      $helperWord = substr($word, 0, $i) . substr($word, $i + 1);
      if($helperWord === strrev($helperWord)) {
        $checker = true;
        break;
      }
    }

    return $checker;
  }

  public function uniqueLetters($word) {
    return count(array_unique(str_split($word)));
  }
};