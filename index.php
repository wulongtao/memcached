<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/7/6
 * Time: 12:03
 */

$m = new Memcached;
$arr = array(
    array('127.0.0.1', 11211),
    array('127.0.0.2', 11211),
);
$m->addServer('127.0.0.1', 11211);
print_r($m->getStats());
echo "<br/>";
print_r($m->getVersion());
echo "<br/>";


$data = array(
    'key' => 'value',
    'key2' => 'value2',
);
//$m->setMulti($data, 600);
$result = $m->getMulti(array('key', 'key2'));
$m->deleteMulti(array('key', 'key2'));
//print_r($result);
echo $m->get('key');

echo $m->getResultCode();
echo $m->getResultMessage();

//$m->add('mkey', 'mvalue', 600);
//$m->replace('mkey', 'mvalue2', 1);

//$m->flush();

//$m->set('num', 50, 600);

//$m->increment('num', 5);

$m->decrement('num', 5);

echo $m->get('num');

$m->flush();