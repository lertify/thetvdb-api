<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\Language AS Data;
use Lertify\TheTVDB\Api\Data\ArrayCollection;

class Language extends AbstractApi
{

    /**
     * Get Language list
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:languages.xml
     *
     * @return ArrayCollection
     */
    public function getList() {
        $results = $this->get(':apikey/languages.xml');

        $list = new ArrayCollection();

        foreach( $results['language'] AS $language) {
            $list->add( new Data\Language( $language ) );
        }

        return $list;
    }

}
