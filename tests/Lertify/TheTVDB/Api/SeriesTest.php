<?php

namespace Lertify\TheTVDB\Tests\Api;

use Lertify\TheTVDB\Client;
use Exception;

class SeriesTest extends \PHPUnit_Framework_TestCase
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
    public function testGetByName()
    {
        $list = $this->object->series()->getByName('Lost');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Series', $list->first(), 'List item not instance of Series');
    }

    public function testGetByImdb()
    {
        $info = $this->object->series()->getByImdb('tt0411008');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Series', $info, 'Item not instance of Series');
    }

    public function testGetByZap2itId()
    {
        $info = $this->object->series()->getByZap2It('SH672362');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Series', $info, 'Item not instance of Series');
    }

    public function testGetInfo()
    {
        $info = $this->object->series()->getInfo(73739);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\SeriesInfo', $info, 'Item not instance of Series Info');
    }

    public function testGetBanners()
    {
        $list = $this->object->series()->getBanners(73739);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Banner', $list->first(), 'List item not instance of Banner');
    }

    public function testGetActors()
    {
        $list = $this->object->series()->getActors(73739);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Actor', $list->first(), 'List item not instance of Actor');
    }

}
