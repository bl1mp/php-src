--TEST--
Optimization of constant switch expression
--FILE--
<?php

function fn1692334012()
{
    try {
        switch ("1" . (int) 2) {
            case 12:
                throw new Exception();
        }
    } catch (Exception $e) {
        echo "exception\n";
    }
}
fn1692334012();
--EXPECT--
exception
