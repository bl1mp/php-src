--TEST--
Testing property_exists()
--FILE--
<?php

class aParent
{
    public static function staticTest()
    {
        $a = new A();
        var_dump(property_exists($a, "prot"));
        var_dump(property_exists($a, "prot2"));
        var_dump(property_exists($a, "prot3"));
        print "------------------\n";
        var_dump(property_exists("A", "prot"));
        var_dump(property_exists("A", "prot2"));
        var_dump(property_exists("A", "prot3"));
        print "------------------\n";
    }
    public function nonstaticTest()
    {
        $a = new A();
        var_dump(property_exists($a, "prot"));
        var_dump(property_exists($a, "prot2"));
        var_dump(property_exists($a, "prot3"));
        print "------------------\n";
        var_dump(property_exists("A", "prot"));
        var_dump(property_exists("A", "prot2"));
        var_dump(property_exists("A", "prot3"));
    }
}
class A extends aParent
{
    public static $prot = "prot";
    protected static $prot2 = "prot";
    private static $prot3 = "prot";
}
function fn1104149285()
{
    A::staticTest();
    $a = new a();
    $a->nonstaticTest();
}
fn1104149285();
--EXPECT--
bool(true)
bool(true)
bool(true)
------------------
bool(true)
bool(true)
bool(true)
------------------
bool(true)
bool(true)
bool(true)
------------------
bool(true)
bool(true)
bool(true)
