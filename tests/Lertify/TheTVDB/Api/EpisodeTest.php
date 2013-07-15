<?php

namespace Lertify\TheTVDB\Tests\Api;

use Lertify\TheTVDB\Client;

class EpisodeTest extends \PHPUnit_Framework_TestCase
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
    public function testGetListByAirDate()
    {
        // 73739 - Lost
        $list = $this->object->episode()->getListByAirDate(73739, '2004-09-22');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Episode\Episode', $list->first(), 'List item not instance of Episode');
    }

    public function testGetInfoById()
    {
        $info = $this->object->episode()->getInfoById(73739);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Episode\Episode', $info, 'Item not instance of Episode');
    }

    public function testGetListBySeriesId()
    {
        $list = $this->object->episode()->getListBySeriesId(73739);

        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Episode\Episode', $list->first(), 'List item not instance of Episode');
    }

    public function testGetInfoBySeriesSeasonAndEpisodeId()
    {
        $info = $this->object->episode()->getInfoBySeriesIdSeasonAndEpisodeNumber(73739, 1, 1);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Episode\Episode', $info, 'Item not instance of Episode');
    }

    public function testGetInfoBySeriesAndAbsoluteId()
    {
        $info = $this->object->episode()->getInfoBySeriesAndAbsoluteNumber(73739, 1);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Episode\Episode', $info, 'Item not instance of Episode');
    }

}
