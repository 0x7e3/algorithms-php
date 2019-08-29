<?php

class Algorithm 
{

	public function binary_search(array $array, $item){
		
		/* init */
		$min = 0;
		$max = count($array)-1;

		/* start */
		while ( $min <= $max ) {
			$point = (int) (($max + $min) / 2);
			if ($array[$point] == $item)
				return $point+1;
			if ($array[$point] > $item)
				$max = $point-1;
			if ($array[$point] < $item)
				$min = $point+1;
		}
		return false;
	}

	public function selection_sort(array $array){

		for ($j=0; $j <= count($array)-1; $j++) {
			$min = $array[$j];
			$min_index = $j;
			for ($i=$j; $i <= count($array)-1; $i++) {
				if ($min > $array[$i]) {
					$min = $array[$i];
					$min_index = $i;
				}
			}
			$array[$min_index] = $array[$j];
			$array[$j] = $min;
		}
		
		return $array;
	}

	public function recursion($n, $f = 'factorial'){
		
		$factorial = function($n) use (&$factorial){
			if (0 == $n)
				return 1;
			return $n * $factorial($n - 1);
		};

		$fibonacci = function($n) use (&$fibonacci){
			if (1 >= $n)
				return $n;
			return $fibonacci($n-1) + $fibonacci($n-2);
		};

		$sum = function(array $n) use (&$sum){
			if (0 == count($n))
				return 0;
			return array_pop($n) + $sum($n);
		};

		$func = ['factorial' => $factorial, 'fibonacci' => $fibonacci, 'sum' => $sum];
		if (!array_key_exists($f, $func))
			return false;
		if ((!is_array($n)) && ($n < 1))
			return false;

		return $func[$f]($n);
	}

	public function quick_sort(array $array){

		/* helper function */
		$divide = function($mass, $j, $sign){

			$less = function($a, $b){ return $a <= $b; };
			$greater = function($a, $b){ return $a > $b; };
			$compare_arr = ['<=' => $less, '>' => $greater];
			$compare_func = $compare_arr[$sign];
			$arr = [];

			for ($i=0; $i < count($mass); $i++) { 
				if ($j == $i)
					continue;
				if ($compare_func($mass[$j], $mass[$i]))
					array_push($arr, $mass[$i]);
			}

			return $arr;
		};

		/* base case */
		if (2 > count($array))
			return $array;

		/* recursive case */
		$i = rand(0, count($array)-1);
		$less_arr = $divide($array, $i, '>');
		$greater_arr = $divide($array, $i, '<=');
	
		return array_merge($this->quick_sort($less_arr), [$array[$i]], $this->quick_sort($greater_arr));
	}

}