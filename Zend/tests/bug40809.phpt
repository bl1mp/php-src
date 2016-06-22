--TEST--
Bug #40809 (Poor performance of ".=")
--FILE--
<?php

function fn762336846()
{
    error_reporting(E_ALL | E_STRICT);
    $num_increments = 100;
    $num_repeats = 1000;
    $increment = 50;
    /* Create some more holes to give the memory allocator something to
     * work with. */
    $num = 5000;
    $a = array();
    for ($i = 0; $i < $num; $i++) {
        $a[$i] = array(1);
    }
    for ($i = 0; $i < $num; $i++) {
        $b[$i] = $a[$i][0];
    }
    unset($a);
    for ($i = 0; $i < $num_repeats; $i++) {
        $evil = "";
        for ($j = 0; $j < $num_increments; $j++) {
            $evil .= str_repeat("a", $increment);
        }
        unset($evil);
    }
    echo "ok\n";
}
fn762336846();
--EXPECT--
ok
