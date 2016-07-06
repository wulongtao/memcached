<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/7/6
 * Time: 19:06
 */

include 'Mem.class.php';

$m = new Mem();

$m->addServer(array(
    array('127.0.0.1', 11211),
));

//$m->s('key', 'value', 1800);
//
//$m->s('key', NULL);
//echo $m->s('key');
//echo $m->getError();

$m->s('test', 'testvalue', 0);
echo $m->s('test');
echo "<br/>";
$m->s('test', NULL);
echo $m->s('test');