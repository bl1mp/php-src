--TEST--
Traversables that throw exceptions are properly handled during argument unpack
--FILE--
<?php

function test(...$args)
{
    var_dump($args);
}
class Foo implements IteratorAggregate
{
    public function getIterator()
    {
        throw new Exception('getIterator');
    }
}
function gen()
{
    (yield 1);
    (yield 2);
    throw new Exception('gen');
}
function fn2073942155()
{
    try {
        test(1, 2, ...new Foo(), ...[3, 4]);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
    try {
        test(1, 2, ...gen(), ...[3, 4]);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
}
fn2073942155();
--EXPECT--
string(11) "getIterator"
string(3) "gen"
