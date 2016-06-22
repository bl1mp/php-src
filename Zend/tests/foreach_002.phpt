--TEST--
Creating recursive array on foreach using same variable
--INI--
zend.enable_gc=1
--FILE--
<?php

function fn1238866183()
{
    error_reporting(E_ALL);
    foreach ($a = array('a' => array('a' => &$a)) as $a) {
        var_dump($a);
    }
}
fn1238866183();
--EXPECT--
array(1) {
  ["a"]=>
  &array(1) {
    ["a"]=>
    *RECURSION*
  }
}
