--TEST--
Bug #43426 (crash on nested call_user_func calls)
--FILE--
<?php

function foo2($d)
{
}
function fn777332418()
{
    $c = 1;
    // doesn't matter
    call_user_func("foo2", $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c, $c);
    echo "ok\n";
}
fn777332418();
--EXPECT--
ok
