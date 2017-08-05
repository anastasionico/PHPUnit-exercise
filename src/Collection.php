<?php
namespace Codecourse;

use IteratorAggregate;
use ArrayIterator;

class Collection implements IteratorAggregate
{
	protected $items = [];
	/**
	*
	*	to create a Collection object we inject an array of items when we instanziate it
	*
	*/
	public function __construct(array $items = [])
	{
		foreach ($items as $item) {
			$this->items[] = $item;
		}
	}
	
	public function get()
	{
		return $this->items;
	}

	public function count()
	{
		return count($this->items);
	}

	public function add(array $items)
	{
		return $this->items =  array_merge($this->items, $items); 
	}

	public function merge(Collection $collection)
	{
		return $this->add($collection->get());
	}

	//The IteratorAggregate interface make this call possible to be iterated buy it required the getIterator method
	public function getIterator()
	{
		return new ArrayIterator($this->items);
	}

	
}