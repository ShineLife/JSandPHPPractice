<?php
function countElements($arr) {
    $ary = [];
    foreach($arr as $v) {
        $ary[$v] = 10;
    }
    $ans = 0;
    foreach($arr as $v) {
        if(array_key_exists($v + 1, $ary))
            $ans += 1;
    }
    return $ans;
}
echo countElements([1, 2, 3]);