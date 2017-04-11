<?php

require_once("ShowHtml.php");

class Palindrome {
	private $minPalLength = 3;
	private $palindrome = "";

	private $renderer;

	public function __construct(int $minLength = 0) {
		$this->renderer = new ShowHtml();
		if($minLength > 0) $this->minPalLength = $minLength;
	}

	public function check(string $str) {
		$str = trim($str);
		$this->palindrome = mb_substr($str, 0, 1);
		$plainStr = preg_replace( "/[^\w]+/u", "", mb_strtolower($str) );

		$plainArr = preg_split("//u", $plainStr, null, PREG_SPLIT_NO_EMPTY);
		$revArr = array_reverse($plainArr);
		$revStr = implode("", $revArr);

		if ($plainStr == $revStr) {
			$this->renderer->show($str);
			return;
		}

		$length = count($plainArr);

		if($length < $this->minPalLength) {
			$this->renderer->show("Too small string for search");
			return;
		}

		for ($i=0; $i <= $length-$this->minPalLength; $i++) {
			$this->compareArrays($plainArr, $revArr, $i);
			$this->compareArrays($revArr, $plainArr, $i);
		}

		$this->renderer->show($this->palindrome);
	}

	private function compareArrays(Array $arr1, Array $arr2, int $offset) {
		$counter = 0;
		$subPal = "";
		for ($i=0; $i < count($arr1)-$offset; $i++) {
			if ($arr1[$i] == $arr2[$i+$offset]) {
				$counter++;
				$subPal .= $arr1[$i];
				if ($counter >= $this->minPalLength && $counter > mb_strlen($this->palindrome)) {
					$this->palindrome = $subPal;
				}
			} else {
				$counter = 0;
				$subPal = "";
			}
		}
	}

}

