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
		$this-&gt;start = $this-&gt;utime();
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
			$this-&gt;points[] = $this-&gt;utime();
		else
			$this-&gt;points[$name] = $this-&gt;utime();
	}

	public function __destruct()
	{
		$this-&gt;pt("total");
		foreach ($this-&gt;points as $name =&gt; $pt)
		{
			echo $name.": ".round(abs($this-&gt;start - $pt),4)."\n";
		}
	}
}
?>
