--TEST--
ob_start(): Ensure unerasable buffer cannot be accessed or flushed by ob_get_flush().
--FILE--
<?php

function callback($string)
{
    static $callback_invocations;
    $callback_invocations++;
    return "[callback:{$callback_invocations}]{$string}\n";
}
function fn1749487545()
{
    ob_start('callback', 0, false);
    echo "This call will obtain the content, but will not flush the buffer.";
    $str = ob_get_flush();
    var_dump($str);
}
fn1749487545();
--EXPECTF--
[callback:1]This call will obtain the content, but will not flush the buffer.
Notice: ob_get_flush(): failed to send buffer of callback (0) in %s on line %d

Notice: ob_get_flush(): failed to delete buffer of callback (0) in %s on line %d
string(65) "This call will obtain the content, but will not flush the buffer."
