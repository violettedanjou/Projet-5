<?php 
namespace app\dataBase;

use Pagerfanta\Adapter\AdapterInterface;

class Pagination implements AdapterInterface {
	/**
	 * Returns the number of results.
	 *
	 * @return integer The number of results.
	 */
	function getNbResults();

	/**
	 * Returns an slice of the results.
	 *
	 * @param integer $offset The offset.
	 * @param integer $length The length.
	 *
	 * @return array|\Iterator|\IteratorAggregate The slice.
	 */
	function getSlice($offset, $length);
}