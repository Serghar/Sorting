<?php
	//Note: Still need to figure out how to deal with negative numbers

	//Radix Sorting Function
	function radix($arr)
	{
		$start = microtime_float(); //Start time for timer
		//Set up a count array for the middle operation of the sort
		$countArr = array(0,0,0,0,0,0,0,0,0,0);

		//Sets up a temp array. The values don't matter currently but this makes it the same size as the original
		$tempArr = $arr;
		
		//Establish what is the max digit so you know number of times to run sort
		$max = $arr[0];
		for ($x = 0; $x < count($arr); $x++)
		{
			if ($arr[$x] > $max)
			{
				$max = $arr[$x];
			}
		}

		//Size is a variable for our loop size (number of times run)
		$size = strlen($max);

		for ($x = 0; $x < count($arr); $x++)
		{
			if (strlen($arr[$x]) < $size)
			{
				$arr[$x] = str_pad($arr[$x], $size, 0, STR_PAD_LEFT);
			}
		}


		//Beginning of sorting
		for ($y = 0; $y < $size; $y++)
		{
			//Builds count array
			for($i = 0; $i < count($arr); $i++)
			{
				$countArr[substr($arr[$i], -1 * ($y + 1), 1)]++;
			}
			
			//Make each index of the count array the sum of itself and the previous index value
			for($i = 1; $i < count($countArr); $i++)
			{
				$countArr[$i] += $countArr[$i - 1];
			}

			//Loop backwards through your array you are working with
			for($i = (count($arr) - 1); $i >= 0; $i--)
			{
				$arrValue = substr($arr[$i], -1 * ($y + 1), 1);
				$countArr[$arrValue]--;
				//Place array values into indexs of tempArr corresponding with the count array value
				$tempArr[$countArr[$arrValue]] = $arr[$i];
			}


			//Replace array with temp array and normalize the count array
			$arr = $tempArr;
			zero($countArr);

		}

		//Make sure everything in the array is typecasted back to int
		for($x = 0; $x < count($arr); $x++)
		{
			$arr[$x] = (int)$arr[$x];
		}
		$end = microtime_float(); //End time for timer
		$totalTime = $end - $start;
		echo "This operation took " . $totalTime . " seconds to complete. ";
		return $arr;
	}

	//Sets all values in the array to zero (used for normalizing count array)
	function zero(&$arr)
	{
		for($x = 0; $x < count($arr); $x++)
		{
			$arr[$x] = 0;
		}
	}

	function microtime_float()
	{
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	}

	//Testing Testing
	$randArray = array();
	for($x = 1; $x <= 10000; $x++)
	{
		array_push($randArray, mt_rand(0, 10000));
	}
	var_dump(radix($randArray));
	
?>
