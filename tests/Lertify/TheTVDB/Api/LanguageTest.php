<?php

namespace Lertify\TheTVDB\Tests\Api;

use Lertify\TheTVDB\Client;
use Exception;

class LanguageTest extends \PHPUnit_Framework_TestCase
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
    public function testGetList()
    {
        $list = $this->object->language()->getList();
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Language\LanguageCollection', $list, 'List not instance of ArrayCollection');
        $this->assertInstanceOf('Lertify\TheTVDB\Api\Data\Language\Language', $list->first(), 'List item not instance of Language');
        $this->assertEquals('English', $list->get(20)->getName(), 'Language name by id 20 should be English');
        $this->assertEquals('en', $list->get(20)->getAbbreviation(), 'Language abbreviation by id 20 should be English');
    }

}
