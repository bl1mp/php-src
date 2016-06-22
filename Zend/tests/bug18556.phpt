--TEST--
Bug #18556 (Setting locale to 'tr_TR' lowercases class names)
--FILE--
<?php

class InfoBlob
{
    var $foo;
    function __construct()
    {
        $this->foo = "Foo";
    }
}
function fn1002958593()
{
    $g_lang = 'tr_TR';
    putenv("LANG={$g_lang}");
    setlocale(LC_ALL, $g_lang);
    echo "Instantiating an infoBlob with a lowercase i\n";
    $foobar = new infoBlob();
    echo $foobar->foo;
    echo "\nInstantiating an InfoBlob with an uppercase I\n";
    $foobar = new InfoBlob();
    echo $foobar->foo;
    echo "\n";
    setlocale(LC_ALL, "tr_TR.utf8");
    foreach (get_declared_classes() as $class) {
        if (!class_exists($class)) {
            echo "{$class} No Longer Exists!\n";
        }
    }
    echo "Done.\n";
}
fn1002958593();
--EXPECT--
Instantiating an infoBlob with a lowercase i
Foo
Instantiating an InfoBlob with an uppercase I
Foo
Done.
