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
        $this->checkResultForLost($list->first());
    }

    public function testGetByNameSingleResult()
    {
        $list = $this->object->series()->getByName('Fringe');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\ArrayCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Series', $list->first(), 'List item not instance of Series');
    }

    public function testGetByImdb()
    {
        $info = $this->object->series()->getByImdb('tt0411008');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Series', $info, 'Item not instance of Series');
        $this->assertEquals(73739, $info->getId(), 'Incorrect series returned');
    }

    public function testGetByImdbNotFound()
    {
        $info = null;
        try {
            $info = $this->object->series()->getByImdb('XXXXXXXXXXXX');
        } catch(\Lertify\TheTVDB\Exception\NotFoundException $e ) {

        }
        $this->assertNull($info, 'Incorrect IMDB id returned a valid response, error');
    }

    public function testGetByZap2itId()
    {
        $info = $this->object->series()->getByZap2It('SH672362');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\Series', $info, 'Item not instance of Series');
        $this->assertEquals(73739, $info->getId(), 'Incorrect series returned');
    }

    public function testGetByZap2itIdNotFound()
    {
        $info = null;
        try {
            $info = $this->object->series()->getByZap2It('XXXXXXXXXXXX');
        } catch(\Lertify\TheTVDB\Exception\NotFoundException $e ) {

        }
        $this->assertNull($info, 'Incorrect Zap2It id returned a valid response, error');
    }

    public function testGetInfo()
    {
        $info = $this->object->series()->getInfo(73739);
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Series\SeriesInfo', $info, 'Item not instance of Series Info');
        $this->assertEquals(73739, $info->getId(), 'Incorrect series returned');
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

    protected function checkResultForLost(\Lertify\TheTVDB\Api\Data\Series\Series $data)
    {
        $this->assertEquals(73739, $data->getId(), 'Incorrect series returned, Lost should have id = 73739');
        $this->assertEquals('en', $data->getLanguage(), 'Incorrect series returned, Lost should have id = 73739');
        $this->assertEquals('Lost', $data->getSeriesName(), 'Incorrect series returned, Lost should have id = 73739');
        $this->assertNotNull($data->getBanner(), 'Incorrect series returned, banner missing');
        $this->assertNotNull($data->getOverview(), 'Incorrect series returned, overview missing');
        $this->assertNotNull($data->getFirstAired(), 'Incorrect series returned, first air date missing');
        $this->assertNotNull($data->getNetwork(), 'Incorrect series returned, network missing');
        $this->assertNotNull($data->getImdbId(), 'Incorrect series returned, imdb id missing');
        $this->assertNotNull($data->getZap2itId(), 'Incorrect series returned, zap2it id missing');
    }

}
