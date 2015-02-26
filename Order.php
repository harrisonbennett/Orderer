<?php




	
$book1 = new stdClass;
$book1->id = 1;
$book1->name = 'this is hte name';

$book2 = new stdClass;
$book2->id = 2;
$book2->name = 'this is hte name';

$book3 = new stdClass;
$book3->id = 3;
$book3->name = 'this is hte name';

$book4 = new stdClass;
$book4->id = 4;
$book4->name = 'this is hte name';

$book5 = new stdClass;
$book5->id = 5;
$book5->name = 'this is hte name';

$temp[]= $book1;
$temp[]= $book2;
$temp[]= $book3;
$temp[]= $book4;
$temp[]= $book5;

	
$ord = [4,5,2,3,1,0];

$order = new Order;

$array = $order->sort($temp, $ord);



print'<pre>';

print_r($array);

print '</pre>';


Class Order{
	
	
	
	public function __construct()
	{
		
	}
	
	
	public function sortFromName($name = null, $sortArray)
	{
		
		if($name == null)
		{
			return $sortArray;
		}
		
		//  make it extend eloquent
		// firstOrCreate
		
		
	}
	
	
	
	
	public function sort($sort, $order, $sortkeys = true)
	{
		if($sortkeys)
		{
			$sort = $this->addKeys($sort);	
		}
		
		return $this->sortArrayByArray($sort, $order);
	}
	
	
	
	
	private function addKeys(Array $array)
	{
		if(empty($array))
		{
			return $array;
		}
		
		$return = [];
		
		
		foreach($array as $key => $value)
		{
			$return[$value->id] = $value;
		}
		
		return $return;	
	}
	
	
	
	
	
	private function sortArrayByArray(Array $sortArray, Array $orderArray) {
		
		if(empty($orderArray))
		{
			return $sortArray;
		}
		
	    $ordered = [];
	
	    foreach($orderArray as $key) 
		{
	        if(array_key_exists($key,$sortArray)) 
			{
	            $ordered[$key] = $sortArray[$key];
	            unset($sortArray[$key]);
	        }
	    }
		
	    return $ordered + $sortArray;
	}
	
	
	
	
	
}