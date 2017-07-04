--TEST--
Bug #41026 (segfault when calling "self::method()" in shutdown functions)
--FILE--
<?php

class try_class
{
    public static function main()
    {
        register_shutdown_function(array("self", "on_shutdown"));
    }
    public static function on_shutdown()
    {
        printf("CHECKPOINT\n");
        /* never reached */
    }
}
function fn1210068132()
{
    try_class::main();
    echo "Done\n";
}
fn1210068132();
--EXPECTF--	
Done

Warning: (Registered shutdown functions) Unable to call self::on_shutdown() - function does not exist in Unknown on line %d
