<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\Updates AS Data;
use Lertify\TheTVDB\Api\Data\ArrayCollection;

class Updates extends AbstractApi
{

    /**
     * Get updates for period
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:Update_Records
     *
     * @param string $period possible values: day, week, month, all
     * @return ArrayCollection
     */
    public function getByPeriod($period = 'day') {
        $results = $this->get(':apikey/updates/updates_:period.xml', array(':period' => $period));

        $updates = new Data\Updates();
        $series_list = new ArrayCollection();
        $episode_list = new ArrayCollection();
        $banner_list = new ArrayCollection();

        foreach( $results['series'] AS $series) {
            $series_list->add( new Data\Series( $series ) );
        }

        foreach( $results['episode'] AS $episode) {
            $episode_list->add( new Data\Episode( $episode ) );
        }

        foreach( $results['banner'] AS $banner) {
            $banner_list->add( new Data\Banner( $banner ) );
        }

        $updates->setSeries($series_list);
        $updates->setEpisodes($episode_list);
        $updates->setBanners($banner_list);

        return $updates;
    }

}
