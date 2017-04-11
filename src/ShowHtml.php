<?php

require_once("Show.php");

class ShowHtml implements Show {
	public function show(string $str) {
		echo "<!DOCTYPE html> <html> <head> <meta charset=\"utf-8\" /> </head> <body>";
		echo $str."<br>";
		echo "</body> </html>";
	}
}

