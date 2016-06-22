--TEST--
Conversion of special float values to int
--FILE--
<?php

function fn333962891()
{
    $values = [0.0, INF, -INF, 1 / INF, -1 / INF, NAN];
    foreach ($values as $value) {
        var_dump($value);
        var_dump((int) $value);
        echo PHP_EOL;
    }
}
fn333962891();
--EXPECT--
float(0)
int(0)

float(INF)
int(0)

float(-INF)
int(0)

float(0)
int(0)

float(-0)
int(0)

float(NAN)
int(0)