<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\Series AS Data;
use Lertify\TheTVDB\Api\Data\Episode AS EpisodeData;
use Lertify\TheTVDB\Api\Data\ArrayCollection;
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
     * @return ArrayCollection<Data\Series>
     */
    public function getByName($name, $language = 'en')
    {
        return $this->get('Series\SeriesCollection', 'GetSeries.php', array('seriesname' => $name, 'language' => $language));
    }

    /**
     * Get series by IMDB id
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetSeriesByRemoteID
     *
     * @param string $id IMDB id
     * @return Data\Series
     * @throws NotFoundException
     */
    public function getByImdb($id)
    {
        /** @var Data\Series $series */
        $series = $this->get('Series\Series<single>', 'GetSeriesByRemoteID.php', array('imdbid' => $id));

        if (null === $series->getId()) {
            throw new NotFoundException(sprintf('Series not found by IMDB id %s', $id));
        }

        return $series;
    }

    /**
     * Get series by Zap2It id
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetSeriesByRemoteID
     *
     * @param integer $id zap2it id
     * @return Data\Series
     * @throws NotFoundException
     */
    public function getByZap2It($id)
    {
        /** @var Data\Series $series */
        $series = $this->get('Series\Series<single>', 'GetSeriesByRemoteID.php', array('zap2it' => $id));

        if (null === $series->getId()) {
            throw new NotFoundException(sprintf('Series not found by IMDB id %s', $id));
        }

        return $series;
    }

    /**
     * Get series info
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:Base_Series_Record
     *
     * @param $series_id series id
     * @param string $language language
     * @throws NotFoundException
     * @return Data\SeriesInfo
     */
    public function getInfo($series_id, $language = 'en')
    {
        /** @var Data\SeriesInfo $series */
        $series = $this->get('Series\SeriesInfo<single>', ':apikey/series/:seriesid/:language.xml', array(':seriesid' => $series_id, ':language' => $language));

        if (null === $series->getId()) {
            throw new NotFoundException(sprintf('Series not found by id %s ( %s )', $series_id, $language));
        }

        return $series;
    }

    /**
     * Get series banners
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:banners.xml
     *
     * @param $series_id series id
     * @return ArrayCollection
     */
    public function getBanners($series_id)
    {
        return $this->get('Series\BannerCollection', ':apikey/series/:seriesid/banners.xml', array(':seriesid' => $series_id));
    }

    /**
     * Get series actors
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:actors.xml
     *
     * @param $series_id series id
     * @return ArrayCollection
     */
    public function getActors($series_id)
    {
        return $this->get('Series\ActorCollection', ':apikey/series/:seriesid/actors.xml', array(':seriesid' => $series_id));
    }

}
