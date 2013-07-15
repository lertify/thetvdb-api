<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;

/**
 * Class Updates
 * @package Lertify\TheTVDB\Api
 * @description Update api
 */
class Updates extends AbstractApi
{

    /**
     * Get updates for period
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:Update_Records
     *
     * @param string $period possible values: day, week, month, all
     *
     * @return \Lertify\TheTVDB\Api\Data\Updates\Updates
     */
    public function getByPeriod($period = 'day')
    {
        return $this->get('Updates\Updates', ':apikey/updates/updates_:period.xml', array(':period' => $period));
    }

}
