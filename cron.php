<?php namespace Mahony0\CliFork;

$cronFile = realpath(dirname(__FILE__))."/fork.php";
$options = [
    'day' => 5,
    'month' => 4,
    'year' => 2015,
    'title' => 'Test title',
    'order' => 1
];
$additionalData = 'TEST parameter';

/**
 * Source:
 * https://stackoverflow.com/questions/13352388/running-php-script-as-cron-job-timeout-issues/13352693#13352693
 */
$bgproc = popen("php $cronFile", 'w');

if ($bgproc === false) {
    die('Could not open bgrnd process');
} else {
    // send params through stdin pipe to bgrnd process:
    $options = serialize($options);
    $datas = serialize($additionalData);

    fwrite($bgproc, $options."\n".$datas."\n");
    pclose($bgproc);
}
