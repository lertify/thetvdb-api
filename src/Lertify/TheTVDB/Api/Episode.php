<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\Episode AS Data;
use Lertify\TheTVDB\Api\Data\ArrayCollection;
use Lertify\TheTVDB\Api\Data\PagedCollection;

class Episode extends AbstractApi
{

    /**
     * Get series episode list
     *
     * @link http://www.thetvdb.com/wiki/index.php?title=Programmers_API
     *
     * @param $series_id series id
     * @param string $language language
     * @return ArrayCollection
     */
    public function getListBySeriesId($series_id, $language = 'en') {
        $results = $this->get(':apikey/series/:seriesid/all/:language.xml', array(':seriesid' => $series_id, ':language' => $language));
        $list = new ArrayCollection();

        if(!isset($results['episode'])) return $list;

        foreach( $results['episode'] AS $actor) {
            $list->add( new Data\Episode( $actor ) );
        }

        return $list;
    }

    /**
     * Get series episode info
     *
     * @link http://www.thetvdb.com/wiki/index.php?title=Programmers_API
     *
     * @param int $series_id series id
     * @param int $season_number season number
     * @param int $episode_number episode number
     * @param string $language language
     * @param string $sort_order sort order, possible values: default or dvd
     * @return Data\Episode|null
     */
    public function getInfoBySeriesIdSeasonAndEpisodeNumber($series_id, $season_number, $episode_number, $language = 'en', $sort_order = 'default') {
        $result = $this->get(':apikey/series/:seriesid/:sort_order/:season_number/:episode_number/:language.xml', array(':seriesid' => $series_id, ':sort_order' => $sort_order, ':season_number' => $season_number, ':episode_number' => $episode_number, ':language' => $language));
        if(!isset($result['episode'])) return null;
        return new Data\Episode( $result['episode'] );
    }

    /**
     * Get series episode info
     *
     * @link http://www.thetvdb.com/wiki/index.php?title=Programmers_API
     *
     * @param int $series_id series id
     * @param int $absolute_number absolute episode number
     * @param string $language language
     * @return Data\Episode|null
     */
    public function getInfoBySeriesAndAbsoluteNumber($series_id, $absolute_number, $language = 'en') {
        $result = $this->get(':apikey/series/:seriesid/absolute/:absolute_number/:language.xml', array(':seriesid' => $series_id, ':absolute_number' => $absolute_number, ':language' => $language));
        if(!isset($result['episode'])) return null;
        return new Data\Episode( $result['episode'] );
    }

    /**
     * Get episode list by air date
     *
     * @link http://www.thetvdb.com/wiki/index.php?title=Programmers_API
     *
     * @param string $series series id
     * @param string $air_date episode air date
     * @param string $language language
     * @return ArrayCollection
     */
    public function getListByAirDate($series, $air_date, $language = 'en') {
        $results = $this->get('GetEpisodeByAirDate.php?apikey=:apikey', array('seriesid' => $series, 'airdate' => $air_date, 'language' => $language));

        $list = new ArrayCollection();

        foreach( $results AS $series) {
            $list->add( new Data\Episode( $series ) );
        }

        return $list;
    }

    /**
     * Get episode info
     *
     * @param $episode_id
     * @param string $language
     * @return Data\Episode|null
     */
    public function getInfoById($episode_id, $language = 'en') {
        $result = $this->get(':apikey/episodes/:episodeid/:language.xml', array(':episodeid' => $episode_id, ':language' => $language));
        if(!isset($result['episode'])) return null;
        return new Data\Episode( $result['episode'] );
    }

}
