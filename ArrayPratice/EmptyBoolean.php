<?php
	$he = [];
	echo isPalindrome($he);
	function isPalindrome($head) {
        echo empty($head)?"true":array_reverse($head) == $head;
    }