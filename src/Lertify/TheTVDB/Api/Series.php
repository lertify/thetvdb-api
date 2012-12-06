<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\Series AS Data;
use Lertify\TheTVDB\Api\Data\Episode AS EpisodeData;
use Lertify\TheTVDB\Api\Data\ArrayCollection;
use Lertify\TheTVDB\Api\Data\PagedCollection;
use Lertify\TheTVDB\Exception\NotFoundException;

class Series extends AbstractApi
{

    /**
     * Get series by name
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetSeries
     *
     * @param string $name series name
     * @param string $language language
     * @return ArrayCollection
     */
    public function getByName($name, $language = 'en') {
        $results = $this->get('GetSeries.php', array('seriesname' => $name, 'language' => $language));

        $list = new ArrayCollection();

        foreach( $results['series'] AS $series) {
            $list->add( new Data\Series( $series ) );
        }

        return $list;
    }

    /**
     * Get series by IMDB id
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetSeries
     *
     * @param string $id IMDB id
     * @return Data\Series
     * @throws NotFoundException
     */
    public function getByImdb($id) {
        $result = $this->get('GetSeriesByRemoteID.php', array('imdbid' => $id));
        if(!isset($result['series'])) throw new NotFoundException('Series not found');
        return new Data\Series( $result['series'] );
    }

    /**
     * Get series by Zap2It id
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetSeries
     *
     * @param $id zap2it id
     * @return Data\Series
     * @throws NotFoundException
     */
    public function getByZap2It($id) {
        $result = $this->get('GetSeriesByRemoteID.php', array('zap2it' => $id));
        if(!isset($result['series'])) throw new NotFoundException('Series not found');
        return new Data\Series( $result['series'] );
    }

    /**
     * Get series info
     *
     * @link http://www.thetvdb.com/wiki/index.php?title=Programmers_API
     *
     * @param $series_id series id
     * @param string $language language
     * @return Data\SeriesInfo|null
     */
    public function getInfo($series_id, $language = 'en') {
        $result = $this->get(':apikey/series/:seriesid/:language.xml', array(':seriesid' => $series_id, ':language' => $language));
        if(!isset($result['series'])) return null;
        return new Data\SeriesInfo( $result['series'] );
    }

    /**
     * Get series banners
     *
     * @link http://www.thetvdb.com/wiki/index.php?title=Programmers_API
     *
     * @param $series_id series id
     * @return ArrayCollection
     */
    public function getBanners($series_id) {
        $results = $this->get(':apikey/series/:seriesid/banners.xml', array(':seriesid' => $series_id));
        $list = new ArrayCollection();

        if(!isset($results['banner'])) return $list;

        foreach( $results['banner'] AS $banner) {
            $list->add( new Data\Banner( $banner ) );
        }

        return $list;
    }

    /**
     * Get series actors
     *
     * @link http://www.thetvdb.com/wiki/index.php?title=Programmers_API
     *
     * @param $series_id series id
     * @return ArrayCollection
     */
    public function getActors($series_id) {
        $results = $this->get(':apikey/series/:seriesid/actors.xml', array(':seriesid' => $series_id));
        $list = new ArrayCollection();

        if(!isset($results['actor'])) return $list;

        foreach( $results['actor'] AS $actor) {
            $list->add( new Data\Actor( $actor ) );
        }

        return $list;
    }

}
