<?php namespace Mahony0\CliFork;

/* Read stdin as Resource */
$stdinCarrier = fopen('php://stdin', 'r');

/* Read stdin Line by Line to variable */
$params = [];
$params['options'] = unserialize(fgets($stdinCarrier));
$params['datas'] = unserialize(fgets($stdinCarrier));

/* DO YOUR OPS HERE */
file_put_contents('a.txt', json_encode($params));

/* Do not forget to close stdin.. */
fclose($stdinCarrier);
