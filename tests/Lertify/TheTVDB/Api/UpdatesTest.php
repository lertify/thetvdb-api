<?php

namespace Lertify\TheTVDB\Tests\Api;

use Lertify\TheTVDB\Client;
use Exception;

class UpdatesTest extends \PHPUnit_Framework_TestCase
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
    public function testGetByPeriod()
    {
        $updates = $this->object->updates()->getByPeriod();
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Updates\Updates', $updates, 'Item not instance of Updates');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $updates->getSeries(), 'Series list not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Updates\Series', $updates->getSeries()->first(), 'Series list item not instance of Series');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $updates->getEpisodes(), 'Episodes list not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Updates\Episode', $updates->getEpisodes()->first(), 'Episodes list item not instance of Episode');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $updates->getBanners(), 'Banners list not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Updates\Banner', $updates->getBanners()->first(), 'Banners list item not instance of Banner');
    }

}
