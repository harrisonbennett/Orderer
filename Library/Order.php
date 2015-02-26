<?php namespace Library;

/**
 * Order
 * 
 * Takes an array of elements that need ordering and orders by a second array
 * 
 * Example
 * 
 * $order = [5,3,4,2,1]; 
 * 
 * $sort_arr = [ 
 * 				['id' => 1, 'name' => 'element 1'],
 *				['id' => 2, 'name' => 'element 2'],
 * 				['id' => 3, 'name' => 'element 3'],
 * 				['id' => 4, 'name' => 'element 4'],
 * 				['id' => 5, 'name' => 'element 5'],
 * 				];
 * 
 * $orderer = new Order;
 * 
 * $sort_arr = $orderer->sort($sort_arr, $order);
 * 
 * You can also pass a 3rd parameter as false if the array keys already match up
 * 
 * 
 * @package    Orderer
 * @author     Harrison Bennett <harrisongbennett@gmail.com>
 */
Class Order{
	
	
	/**
     * 
     * Handles sorting the keys and ordering the array
     *
     * @param array $sort Array with objects
 	 * @param array $order Array with order
 	 * @param boolean $sortKeys to add array keys
     * @return array
     */
	public function sort($sort, $order, $sortkeys = true)
	{
		
		// check if we need to sort the array keys
		if($sortkeys)
		{
			$sort = $this->addKeys($sort);	
		}
		
		// return the sorted array
		return $this->sortArrayByArray($sort, $order);
	}
	
	
	
	/**
     * 
     * Adds element key to the array key
     *
     * @param array $objects  Array with objects
     * @return array
     */
	private function addKeys(Array $objects)
	{
		// the array is empty so just return it
		if(empty($objects))
		{
			return $objects;
		}
		
		// define the array to return
		$return = [];
		
		//  loop around each object
		foreach($objects as $key => $object)
		{
			// check if its an array or an object
			if(is_object($object))
			{
				// add the object to the array with the id as the key
				$return[$object->id] = $object;
			}else if(is_array($object))
			{
				// add the array to the array with the id as the key
				$return[$object['id']] = $object;
			}

		}
		
		//  return the array of objects
		return $return;	
	}
	
	
	/**
     * 
     * Takes 2 arrays, one to sort and 1 with the order. 
     *
     * @param array $sortArray  Array to sort
     * @param array $orderArray  Array with the order
     * @return array
     */
	private function sortArrayByArray(Array $sortArray, Array $orderArray) {
		
		// if the order is array
		if(empty($orderArray))
		{
			// return the unordered array
			return $sortArray;
		}
		
		// define the new order array
	    $ordered = [];
	
		// loop around each element in the order array
	    foreach($orderArray as $key) 
		{	
			// if the key exists in the array we need to sort
	        if(array_key_exists($key,$sortArray)) 
			{
				// add the object to the array with the correct key
	            $ordered[$key] = $sortArray[$key];
				
				// unset that element now we dont need it.
				// Im doing this so that then all thats left is elements not in the order array
	            unset($sortArray[$key]);
	        }
	    }
		
		// return the freshly ordered array with anything left over attached to the end
	    return $ordered + $sortArray;
	}
	
	
	
	
	
}