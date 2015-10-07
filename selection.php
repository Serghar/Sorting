<?php
	//Selection sort function using an array passed by reference
	function sel_sort(&$array)
	{
		$runtime = 0; //Number of times a conditional statement is run

		$start = microtime_float(); //Start time for timer
		for($x = 0; $x < count($array); $x++)
		{
			for($y = $x + 1; $y < count($array); $y++)
			{
				if($array[$x] > $array[$y])
				{
					swap($array, $x, $y);
				}
				$runtime++;
			}
		}
		$end = microtime_float(); //End time for timer
		$totalTime = $end - $start;
		echo "This operation took " . $totalTime . " seconds to complete. ";
		echo "It had ". $runtime . " if/else statements execute.";
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

	$randArray = array();
	for($x = 1; $x <= 10000; $x++)
	{
		array_push($randArray, mt_rand(0, 10000));
	}
	sel_sort($randArray);
	var_dump($randArray);

?>