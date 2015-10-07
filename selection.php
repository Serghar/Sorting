<?php
	//Selection sort function using an array passed by reference
	function sel_sort(&$array)
	{
		$runtime = 0; //Number of times a conditional statement is run

		$start = microtime_float(); //Start time for timer
		$top = (count($array) - 1);
        for($x = 0; $x <= $top; $x++)
        {
        	//Find and swap the min value
            $change = False;
            $minValue = $array[$x];
            $minIndex = $x;
            for($y = $x; $y < count($array); $y++)
            {
                if($minValue > $array[$y])
                {
                    $minIndex = $y;
                    $minValue = $array[$y];
                    $change = True;
                    $runtime++;
                }
            }
            if($change)
            {
                swap($array, $x, $minIndex);
                $change = False;
                $runtime++;
            }
            
            //Find and swap the max value
            $maxValue = $array[$top];
            $maxIndex = $top;
            for($i = $top; $i > $x; $i--)
            {
                if($maxValue < $array[$i])
                {
                    $maxValue = $array[$i];
                    $maxIndex = $i;
                    $change = True;
                    $runtime++;
                }
            }
            if($change)
            {
                swap($array, $top, $maxIndex);
                $change = False;
                $runtime++;
            }
            $top--;
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
	//var_dump($randArray);

?>