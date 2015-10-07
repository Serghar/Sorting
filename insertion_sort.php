<?php
	//Insertion sort
	function insertion($arr)
	{
		for ($i = 1; $i < count($arr); $i++)
		{
			$x = $arr[$i];
			$y = $i;
			while (($y > 0) && ($arr[$y - 1] > $x))
			{
				$arr[$y] = $arr[$y - 1];
				$y--;
			}
			$arr[$y] = $x; 
		}
		return $arr;
	}
	
	//just here to test the function
	$randArray = array();
	for($x = 1; $x <= 10; $x++)
	{
		array_push($randArray, mt_rand(0, 10000));
	}
	var_dump($randArray);
	var_dump(insertion($randArray));

?>