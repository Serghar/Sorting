<?php
	function bubble($arr)
	{
		$start = microtime_float(); //Start time for timer
		for($x = count($arr) - 1; $x > 0; $x--)
		{
			for($y = 0; $y < $x; $y++)
			{
				$comp = $y + 1;
				if ($arr[$comp] < $arr[$y])
				{
					swap($arr, $y, $comp);
				}
			}
		}
		$end = microtime_float(); //End time for timer
		$totalTime = $end - $start;
		echo "This operation took " . $totalTime . " seconds to complete. ";
		return $arr;
	}

	//Take an array passed by reference and swaps 2 index position values 
	function swap(&$arr, $x, $y)
	{
		$temp = $arr[$x];
		$arr[$x] = $arr[$y];
		$arr[$y] = $temp;
	}

	function microtime_float()
	{
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	}

	//just here to test the function
	$randArray = array();
	for($x = 1; $x <= 10000; $x++)
	{
		array_push($randArray, mt_rand(0, 10000));
	}
	var_dump(bubble($randArray));
?>