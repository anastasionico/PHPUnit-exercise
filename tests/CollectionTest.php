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
	*	In this test we loop through the items on in a collection, we can do so thanks to the IteratorAggregate predefinite php class.
	*	the test check that the items in the collection are the same number of the item we pass when we instanciate the class and using the assertIstanceOf we verify that the Collection class implements the ArrayIterator class
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
	*	The purpose of this test is to merge all the items of the two classes into the fist Collection to do so we use the add function that call for the add method (inside the add method we merge the array of the item of collection1 with the array of collection2 that has been injected). then we count that the total amount of items is the same of the items we have passed when we instanciate the two Collection
	* 	@test
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
	*	here we test the $collection->add() method by simply merging the items passed when we instanciate the collection class summed an array of other items
	* 	@test
	*/
	public function can_add_to_existing_collection()
	{
		$collection = new Collection(['one','two','three']);
		$collection->add(['four','five','six']);

		assertCount(6, $collection->get());
		assertEquals(6, $collection->count());
	}

	/**
	*	In the following test we inject an associative array to the collection and testing the toJson method we check: 1 using the assertInternalType that the oucome is a string, 2 the result of the toJson method is equal to the one we want 
	* 	@test
	*/
	public function return_json_encoded_items()
	{
		$collection = new Collection([
			['username' => 'Nico'],
			['username' => 'Tom'],
		]);

		assertInternalType('string', $collection->toJson()); // assertInternalType check that the method (2' par) return the type we asked for on the first par
		assertEquals('[{"username":"Nico"},{"username":"Tom"}]', $collection->toJson());
	}

	/**
	*	The following test is very similar to return_json_encoded_items() but instead of calling the json_encode using the toJson() method we let do this by implementing the php class JsonSerializable and calling his abstract method jsonSerialize
	* @test
	*/
	public function return_json_encoded_jsonformat()
	{
		$collection = new Collection([
			['username' => 'Nico'],
			['username' => 'Anastasio'],
		]);

		$encoded = json_encode($collection);

		assertInternalType('string', $encoded);
		assertEquals('[{"username":"Nico"},{"username":"Anastasio"}]', $encoded);
	}

}
