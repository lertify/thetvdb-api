<?php

namespace Lertify\TheTVDB\Api\Data;

use Closure, InvalidArgumentException;

class PagedCollection
{

    /**
     * Items of the collection.
     * @var Closure
     */
    private $_callback;

    private $_pages = array();
    private $_total_pages;
    private $_total_results;

    /**
     * Create ArrayCollection.
     *
     * @param Closure $callback page retrieve callback
     * @param array $items collection items
     */
    public function __construct(Closure $callback)
    {
        $this->_callback = $callback;
    }

    private function warmUp() {
        // Load first page, to get the total pages and results count
        $this->loadPage(1);
    }

    private function loadPage( $number ) {
        $page_data = call_user_func($this->_callback, $number);

        if( $page_data === null ) return false;

        if( !isset($page_data['results']) || !isset($page_data['total_pages']) || !isset($page_data['total_results']) )
            throw new InvalidArgumentException('Paged collection callback parameters are incorrect');

        $this->_pages[$number] = $page_data['results'];
        $this->_total_pages = intval($page_data['total_pages']);
        $this->_total_results = intval($page_data['total_results']);

        return true;
    }

    /**
     * Get items on page
     * @param integer $number Page number
     * @return ArrayCollection
     */
    public function page( $number ) {
        if( ! isset($this->_pages[$number]) && ! $this->loadPage($number) )
            return null;

        return $this->_pages[$number];
    }

    /**
     * Check if the collection is empty
     * @return bool
     */
    public function isEmpty()
    {
        return ( $this->count() === 0 );
    }

    /**
     * Get total items count
     * @return mixed
     */
    public function count()
    {
        if($this->_total_results === null) $this->warmUp();
        return $this->_total_results;
    }

    /**
     * Get pages count
     * @return mixed
     */
    public function countPages()
    {
        if($this->_total_pages === null) $this->warmUp();
        return $this->_total_pages;
    }

}
