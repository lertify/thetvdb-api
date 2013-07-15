<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\Language AS Data;
use Lertify\TheTVDB\Api\Data\ArrayCollection;

/**
 * Class Language
 * @package Lertify\TheTVDB\Api
 * @description Language api
 */
class Language extends AbstractApi
{

    /**
     * Get Language list
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:languages.xml
     *
     * @return ArrayCollection
     */
    public function getList()
    {
        return $this->get('Language\LanguageCollection', ':apikey/languages.xml');
    }

}
