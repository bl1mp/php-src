--TEST--
Testing declare statement with several type values
--SKIPIF--
<?php
if (!extension_loaded("mbstring")) {
  die("skip Requires ext/mbstring");
}
?>
--INI--
zend.multibyte=1
--FILE--
<?php

declare (encoding=1);
declare (encoding=1123131232131312321);
declare (encoding='utf-8');
declare (encoding=M_PI);
function fn103892046()
{
    print 'DONE';
}
fn103892046();
--EXPECTF--
Warning: Unsupported encoding [%d] in %sdeclare_002.php on line %d

Warning: Unsupported encoding [%f] in %sdeclare_002.php on line %d

Fatal error: Encoding must be a literal in %sdeclare_002.php on line %d
