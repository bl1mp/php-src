--TEST--
Testing several magic methods
--FILE--
<?php

class foo
{
    function __unset($a)
    {
        print "unset\n";
        var_dump($a);
    }
    public function __call($a, $b)
    {
        print "call\n";
        var_dump($a);
    }
    function __clone()
    {
        print "clone\n";
    }
    public static function __callstatic($a, $b)
    {
        print "callstatic\n";
    }
    public function __tostring()
    {
        return 'foo';
    }
}
function fn696741476()
{
    $a = new foo();
    $a->sdfdsa();
    $a::test();
    clone $a;
    var_dump((string) $a);
    unset($a->a);
}
fn696741476();
--EXPECT--
call
string(6) "sdfdsa"
callstatic
clone
string(3) "foo"
unset
string(1) "a"
