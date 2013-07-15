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
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\UserRating', $list->first(), 'List item not instance of Series');
    }

    public function testGetPreferredLanguages()
    {
        // 73739 - Lost
        $res = $this->object->user()->getPreferredLanguage( $GLOBALS['account_id'] );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Language', $res, 'Item not instance of Language');
        $this->assertEquals('7', $res->getId(), 'Item id not correct');
        $this->assertEquals('English', $res->getName(), 'Item name not correct');
        $this->assertEquals('en', $res->getAbbreviation(), 'Item abbreviation not correct');
    }

    public function testGetFavorites()
    {
        $list = $this->object->user()->getFavorites( $GLOBALS['account_id'] );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Favorites', $list, 'List not instance of Favorites');
        $this->assertInternalType('array', $list->all(), 'List data is not an array');
    }

    public function testAddFavorite()
    {
        $list = $this->object->user()->addFavorite( $GLOBALS['account_id'], 73739 );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Favorites', $list, 'List not instance of Favorites');
    }

    public function testRemoveFavorite()
    {
        $list = $this->object->user()->removeFavorite( $GLOBALS['account_id'], 73739 );
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Favorites', $list, 'List not instance of Favorites');
    }

    public function testPostRatingForSeries()
    {
        // 73739 - Lost
        $res = $this->object->user()->postSeriesRating( $GLOBALS['account_id'] , 73739, 5);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Rating', $res, 'List not instance of Rating');
    }

    public function testPostRatingForEpisode()
    {
        // 127131 - Lost - Season 1 - Episode 1
        $res = $this->object->user()->postEpisodeRating( $GLOBALS['account_id'] , 127131, 10);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\User\Rating', $res, 'List not instance of Rating');
    }

}
