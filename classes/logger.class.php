<?php
/*
How to use.
You need a config.ini with the line :
LOG_LOC = yourdatalocation/yourlogfile.dat
You need a directory and a file thus:
yourdatalocation/yourlogfile.dat

Now you can call the class thus:
$logster = new logger;

echo $logster->error('Nothing worked.');
or
$logster->readLog();

unset($logster);
*/
class logger
{
	private $config = NULL;
	private $logFile = NULL;

	function __construct()
	{
		$this->config = new config;
		$this->logFile = fopen($this->config->values->LOG_LOC, 'a+r');		
	}

	function error($msg = NULL)
	{
		$str = '['.date('Y/m/d h:i:s', mktime()).']'.$msg;				
		$fwrite = fwrite($this->logFile, $str.PHP_EOL);
        if ($fwrite === false)
        {
            return $this->config->LOG_LOC.' could not be written to';
        }        
    }

    function readLog()
    {
    	while(!feof($this->logFile))
		{
			echo fgets($this->logFile).'<br />';
		}
    }

	function __destruct()
	{
		fclose($this->logFile);
	}
}
?>