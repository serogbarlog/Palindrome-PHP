<?php

mb_internal_encoding('utf-8');
mb_regex_encoding('utf-8');

require_once("src/Palindrome.php");

$pal = new Palindrome();
$pal->check("Аргентина манит негра");
$pal->check("Doc, note: I dissent. A fast never prevents a fatness. I diet on cod");
$pal->check("Как Ока?");

