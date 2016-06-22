--TEST--
Bug #28800 (Incorrect string to number conversion for strings starting with 'inf')
--FILE--
<?php

function fn972143413()
{
    $strings = array('into', 'info', 'inf', 'infinity', 'infin', 'inflammable');
    foreach ($strings as $v) {
        echo $v + 0 . "\n";
    }
}
fn972143413();
--EXPECTF--

Warning: A non-numeric value encountered in %s on line %d
0

Warning: A non-numeric value encountered in %s on line %d
0

Warning: A non-numeric value encountered in %s on line %d
0

Warning: A non-numeric value encountered in %s on line %d
0

Warning: A non-numeric value encountered in %s on line %d
0

Warning: A non-numeric value encountered in %s on line %d
0

