<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\Episode AS Data;
use Lertify\TheTVDB\Api\Data\ArrayCollection;

/**
 * Class Episode
 * @package Lertify\TheTVDB\Api
 * @description Episode api
 */
class Episode extends AbstractApi
{

    /**
     * Get series episode list
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:Full_Series_Record
     *
     * @param $series_id series id
     * @param string $language language
     * @return ArrayCollection
     */
    public function getListBySeriesId($series_id, $language = 'en')
    {
        return $this->get('Episode\EpisodeCollection', ':apikey/series/:seriesid/all/:language.xml', array(':seriesid' => $series_id, ':language' => $language));
    }

    /**
     * Get series episode info
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:Base_Episode_Record
     *
     * @param int $series_id series id
     * @param int $season_number season number
     * @param int $episode_number episode number
     * @param string $language language
     * @param string $sort_order sort order, possible values: default or dvd
     * @return Data\Episode|null
     */
    public function getInfoBySeriesIdSeasonAndEpisodeNumber($series_id, $season_number, $episode_number, $language = 'en', $sort_order = 'default')
    {
        return $this->get('Episode\Episode<single>', ':apikey/series/:seriesid/:sort_order/:season_number/:episode_number/:language.xml', array(':seriesid' => $series_id, ':sort_order' => $sort_order, ':season_number' => $season_number, ':episode_number' => $episode_number, ':language' => $language));
    }

    /**
     * Get series episode info
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:Base_Episode_Record
     *
     * @param int $series_id series id
     * @param int $absolute_number absolute episode number
     * @param string $language language
     * @return Data\Episode|null
     */
    public function getInfoBySeriesAndAbsoluteNumber($series_id, $absolute_number, $language = 'en')
    {
        return $this->get('Episode\Episode<single>', ':apikey/series/:seriesid/absolute/:absolute_number/:language.xml', array(':seriesid' => $series_id, ':absolute_number' => $absolute_number, ':language' => $language));
    }

    /**
     * Get episode list by air date
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetEpisodeByAirDate
     *
     * @param string $series series id
     * @param string $air_date episode air date
     * @param string $language language
     * @return ArrayCollection
     */
    public function getListByAirDate($series, $air_date, $language = 'en')
    {
        return $this->get('Episode\EpisodeCollection', 'GetEpisodeByAirDate.php?apikey=:apikey', array('seriesid' => $series, 'airdate' => $air_date, 'language' => $language));
    }

    /**
     * Get episode info
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:Base_Episode_Record
     *
     * @param $episode_id
     * @param string $language
     * @return Data\Episode|null
     */
    public function getInfoById($episode_id, $language = 'en')
    {
        return $this->get('Episode\Episode<single>', ':apikey/episodes/:episodeid/:language.xml', array(':episodeid' => $episode_id, ':language' => $language));
    }

}
