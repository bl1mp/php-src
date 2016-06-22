--TEST--
reusing anonymous classes
--FILE--
<?php

function fn873203485()
{
    while (@$i++ < 10) {
        var_dump(new class($i)
        {
            public function __construct($i)
            {
                $this->i = $i;
            }
        });
    }
}
fn873203485();
--EXPECTF--
object(class@%s)#1 (1) {
  ["i"]=>
  int(1)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(2)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(3)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(4)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(5)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(6)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(7)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(8)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(9)
}
object(class@%s)#1 (1) {
  ["i"]=>
  int(10)
}

