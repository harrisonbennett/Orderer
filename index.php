<?php

function __autoload($class)
{
	$class = str_replace('\\', '/', $class). '.php';
	require $class;
}


use Library\Order;



// just make a few test objects
$book1 = new stdClass;
$book1->id = 1;
$book1->name = 'Book name 1';

$book2 = new stdClass;
$book2->id = 2;
$book2->name = 'Book name 2';

$book3 = new stdClass;
$book3->id = 3;
$book3->name = 'Book name 3';

$book4 = new stdClass;
$book4->id = 4;
$book4->name = 'Book name 4';

$book5 = new stdClass;
$book5->id = 5;
$book5->name = 'Book name 5';



// save all the objects into an array
$temp = [ $book1, $book2 , $book3 ,$book4 ,$book5];

//  define the order we want
$ord = [4,5,2,3,1];


// define the class
$order = new Order;

// reorder the array
$array = $order->sort($temp, $ord);


// Just dump out the array to prove its reordered
print'<pre>';
print_r($array);
print '</pre>';