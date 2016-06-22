--TEST--
Bug #71922: Crash on assert(new class{});
--INI--
zend.assertions=1
assert.exception=1
--FILE--
<?php

function fn527459672()
{
    try {
        assert(0 && new class
        {
        } && new class(42) extends stdclass
        {
        });
    } catch (AssertionError $e) {
        echo "Assertion failure: ", $e->getMessage(), "\n";
    }
}
fn527459672();
--EXPECT--
Assertion failure: assert(0 && new class {
} && new class(42) extends stdclass {
})
