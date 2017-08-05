<?php
use Codecourse\Collection;

class CollectionTest extends PHPUnit\Framework\TestCase
{	
	/**
     * Check if the get() method in the Collection class exists
     * @test 
 	*/
	public function empty_instantiate_collection_return_no_items()
	{
		$collection = new Collection();
		assertEmpty($collection->get());
	}

	/**
	*	In the following method we count how many items we have in the collection 
	*	@test 
	*/
	public function count_is_correct_for_item_passed_in()
	{
		$collection = new Collection(['one', 'two', 'three']);
		assertEquals(3, $collection->count());
	}

	/** 
	* In here we check if the item we are passing are actually mathing the item we are looking for
	* @test 
	*/
	public function count_return_match_item_passed_id()
	{
		$collection = new Collection(['one', 'two']);
		
		assertCount(2, $collection->get());
		assertEquals($collection->get()[0], 'one');
		assertEquals($collection->get()[1], 'two');
	}

	/**
	* In this test we check if the collection class implements the interface IteratorAggregate 
	* @test
	*/
	public function collection_is_istance_of_iterator_aggregate()
	{
		$collection = new Collection();
		
		assertInstanceOf(IteratorAggregate::class, $collection);
	}

	/**
	*	in this test we loop on a collection we have created and thanks to the getIterator method we get and count the items
	* 	@test
	**/
	public function collection_can_be_iterated()
	{
		$collection = new Collection([
			'one','two','three'
		]);

		$items = [];
		foreach ($collection as $value) {
			$items[] = $value;
		}

		assertCount(3, $items);
		assertInstanceOf(ArrayIterator::class, $collection->getIterator());
	}

	/**
	* @test
	*/
	public function collection_can_be_merged_with_another_collection()
	{
		$collection1 = new Collection(['one','two','three']);
		$collection2 = new Collection(['four','five']);

		$collection1->merge($collection2);
		
		assertCount(5, $collection1->get());
		assertEquals(5, $collection1->count());

	}

	/**
	* @test
	*/
	public function can_add_to_existing_collection()
	{
		$collection = new Collection(['one','two','three']);
		$collection->add(['four','five','six']);

		assertCount(6, $collection->get());
		assertEquals(6, $collection->count());
	}
}
