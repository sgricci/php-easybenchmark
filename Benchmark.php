<?php
/*
* author sgricci
* access public
* license gpl
* website http://deepcode.net
*/
class Bench {
	private $points = array();
	private $start;

	public function __construct() {
		$this->start = $this->utime();
	}

	private function utime()
	{
		$time = explode(" ", microtime());
		$usec = (double) $time[0];
		$sec = (double) $time[1];
		return ($sec + $usec);
	}

	public function pt($name = "")
	{
		if (!$name)
			$this->points[] = $this->utime();
		else
			$this->points[$name] = $this->utime();
	}

	public function __destruct()
	{
		$this->pt("total");
		foreach ($this->points as $name => $pt)
		{
			echo $name.": ".round(abs($this->start - $pt),4)."\n";
		}
	}
}
?>
