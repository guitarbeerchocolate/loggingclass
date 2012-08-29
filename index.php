<?php
require_once 'classes/logger.class.php';
$logster = new logger;
// echo $logster->error('Nothing worked.');
$logster->readLog();
unset($logster);
?>