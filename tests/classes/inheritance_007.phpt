--TEST--
Ensure inherited old-style constructor doesn't block other methods
--FILE--
<?php

class A
{
    public function B()
    {
        echo "In " . __METHOD__ . "\n";
    }
    public function A()
    {
        echo "In " . __METHOD__ . "\n";
    }
}
class B extends A
{
}
function fn1435764682()
{
    $rc = new ReflectionClass('B');
    var_dump($rc->getMethods());
    $b = new B();
    $b->a();
    $b->b();
}
fn1435764682();
--EXPECTF--
Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP; A has a deprecated constructor in %s on line %d
array(2) {
  [0]=>
  object(ReflectionMethod)#%d (2) {
    ["name"]=>
    string(1) "B"
    ["class"]=>
    string(1) "A"
  }
  [1]=>
  object(ReflectionMethod)#%d (2) {
    ["name"]=>
    string(1) "A"
    ["class"]=>
    string(1) "A"
  }
}
In A::A
In A::A
In A::B
