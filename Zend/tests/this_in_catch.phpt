--TEST--
$this in catch
--FILE--
<?php

class C
{
    function foo()
    {
        try {
            throw new Exception();
        } catch (Exception $this) {
        }
        var_dump($this);
    }
}
function fn1481286458()
{
    $obj = new C();
    $obj->foo();
}
fn1481286458();
--EXPECTF--
Fatal error: Cannot re-assign $this in %sthis_in_catch.php on line %d
