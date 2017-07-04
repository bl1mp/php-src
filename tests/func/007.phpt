--TEST--
INI functions test
--FILE--
<?php

function fn325785883()
{
    $ini1 = ini_get('include_path');
    ini_set('include_path', 'ini_set_works');
    echo ini_get('include_path') . "\n";
    ini_restore('include_path');
    $ini2 = ini_get('include_path');
    if ($ini1 !== $ini2) {
        echo "ini_restore() does not work.\n";
    } else {
        echo "ini_restore_works\n";
    }
}
fn325785883();
--EXPECT--
ini_set_works
ini_restore_works
