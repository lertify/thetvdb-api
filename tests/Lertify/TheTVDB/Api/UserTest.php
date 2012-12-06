<?php

namespace Lertify\TheTVDB\Tests\Api;

use Lertify\TheTVDB\Client;
use Exception;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Client( $GLOBALS['api_key'] );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers {className}::{origMethodName}
     */
    public function testGetByUser()
    {
        $list = $this->object->user()->getRating( $GLOBALS['account_id'] );

        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Series', $list->first(), 'List item not instance of Series');
    }

    public function testGetPreferredLanguages()
    {
        // 73739 - Lost
        $res = $this->object->user()->getPreferredLanguages( $GLOBALS['account_id'] );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Language', $res, 'Item not instance of Language');
    }

    public function testGetFavorites()
    {
        $list = $this->object->user()->getFavorites( $GLOBALS['account_id'] );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
    }

    public function testAddFavorite()
    {
        $res = $this->object->user()->addFavorite( $GLOBALS['account_id'], 73739 );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $res, 'List not instance of ArrayCollection');
    }

    public function testRemoveFavorite()
    {
        $res = $this->object->user()->removeFavorite( $GLOBALS['account_id'], 73739 );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $res, 'List not instance of ArrayCollection');
    }

    public function testPostRatingForSeries()
    {
        // 73739 - Lost
        $res = $this->object->user()->postSeriesRating( $GLOBALS['account_id'] , 73739, 5);
        $this->assertNotNull($res, 'Series rating post returned an incorrect value');
    }

    public function testPostRatingForEpisode()
    {
        // 127131 - Lost - Season 1 - Episode 1
        $res = $this->object->user()->postEpisodeRating( $GLOBALS['account_id'] , 127131, 10);
        $this->assertNotNull($res, 'Episode rating post returned an incorrect value');
    }

}
