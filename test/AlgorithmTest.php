<?php

require_once  './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use \Algorithm;

class AlgorithmTest extends TestCase
{

    private $a;

    function __construct()
    {
        parent::__construct();
        $this->a = new Algorithm;
    }

    /** @test */
    public function TestBinarySearch()
    {

        // binary_search method return index of element in sorted array
    
        $array = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
        $this->assertSame(2, $this->a->binary_search($array, 'b'));
        $this->assertSame(6, $this->a->binary_search($array, 'f'));

        $array = [50, 75, 110, 200];
        $this->assertSame(2, $this->a->binary_search($array, 75));
    }

    /** @test */
    public function TestSelectionSort()
    {

        // selection_sort method return sorted array
    
        $array = ['e', 'c', 'd', 'a', 'b'];
        $this->assertSame(['a', 'b', 'c', 'd', 'e'], $this->a->selection_sort($array));

        $array = [75, 200, 50, 110];
        $this->assertSame([50, 75, 110, 200], $this->a->selection_sort($array));
    }

    /** @test */
    public function TestRecursion()
    {

        // recursion method provide examples of recurcion functions
    
        $n = 5;
        $this->assertSame(120, $this->a->recursion($n, 'factorial'));

        $n = 10;
        $this->assertSame(55, $this->a->recursion($n, 'fibonacci'));

        $array = [75, 200, 50, 110];
        $this->assertSame(435, $this->a->recursion($array, 'sum'));
    }

    /** @test */
    public function TestQuickSort()
    {

        // quick_sort method return sorted array
    
        $array = ['e', 'c', 'd', 'a', 'b'];
        $this->assertSame(['a', 'b', 'c', 'd', 'e'], $this->a->quick_sort($array));

        $array = [75, 200, 50, 110, 110];
        $this->assertSame([50, 75, 110, 110, 200], $this->a->quick_sort($array));
    }
}