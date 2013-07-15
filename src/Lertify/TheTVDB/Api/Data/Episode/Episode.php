<?php

namespace Lertify\TheTVDB\Api\Data\Episode;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("episode")
 */
class Episode
{

    /**
     * @JMS\Type("integer")
     */
    public $id;

    /**
     * @JMS\Type("integer")
     */
    public $combined_episodenumber;

    /**
     * @JMS\Type("integer")
     */
    public $combined_season;

    /**
     * @JMS\Type("integer")
     */
    public $dvd_chapter;

    /**
     * @JMS\Type("integer")
     */
    public $dvd_discid;

    /**
     * @JMS\Type("string")
     */
    public $dvd_episodenumber;

    /**
     * @JMS\Type("integer")
     */
    public $dvd_season;

    /**
     * @JMS\Type("string")
     */
    public $director;

    /**
     * @JMS\Type("integer")
     */
    public $epimgflag;

    /**
     * @JMS\Type("string")
     */
    public $episodename;

    /**
     * @JMS\Type("integer")
     */
    public $episodenumber;

    /**
     * @JMS\Type("string")
     * @JMS\Accessor(setter="setFirstAired")
     */
    public $firstaired;

    /**
     * @JMS\Type("string")
     * @JMS\Accessor(setter="setGuestStars")
     */
    public $gueststars;

    /**
     * @JMS\Type("string")
     */
    public $imdb_id;

    /**
     * @JMS\Type("string")
     */
    public $language;

    /**
     * @JMS\Type("string")
     */
    public $overview;

    /**
     * @JMS\Type("string")
     */
    public $productioncode;

    /**
     * @JMS\Type("double")
     */
    public $rating;

    /**
     * @JMS\Type("integer")
     */
    public $seasonnumber;

    /**
     * @JMS\Type("string")
     * @JMS\Accessor(setter="setWriter")
     */
    public $writer;

    /**
     * @JMS\Type("integer")
     */
    public $absolute_number;

    /**
     * @JMS\Type("string")
     */
    public $filename;

    /**
     * @JMS\Type("integer")
     * @JMS\Accessor(setter="setLastUpdated")
     */
    public $lastupdated;

    /**
     * @JMS\Type("integer")
     */
    public $seasonid;

    /**
     * @JMS\Type("integer")
     */
    public $seriesid;

    /**
     * @JMS\Type("integer")
     */
    public $flagged;

    /**
     * @JMS\Type("string")
     * @JMS\Accessor(setter="setMirrorUpdated")
     */
    public $mirrorupdate;

    /**
     * @JMS\Type("integer")
     */
    public $ratingcount;

    /**
     * @JMS\Type("integer")
     */
    public $airsafter_season;

    /**
     * @JMS\Type("integer")
     */
    public $airsbefore_episode;

    /**
     * @JMS\Type("integer")
     */
    public $airsbefore_season;

    /**
     * Get episode id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get absolute number
     *
     * @return mixed
     */
    public function getAbsoluteNumber()
    {
        return $this->absolute_number;
    }

    /**
     * Get airs after season
     *
     * @return mixed
     */
    public function getAirsAfterSeason()
    {
        return $this->airsafter_season;
    }

    /**
     * Get airs before episode
     *
     * @return mixed
     */
    public function getAirsBeforeEpisode()
    {
        return $this->airsbefore_episode;
    }

    /**
     * Get airs before seasons
     * @return mixed
     */
    public function getAirsBeforeSeason()
    {
        return $this->airsbefore_season;
    }

    /**
     * Get combined episode number
     *
     * @return mixed
     */
    public function getCombinedEpisodeNumber()
    {
        return $this->combined_episodenumber;
    }

    /**
     * Get combined season
     *
     * @return mixed
     */
    public function getCombinedSeason()
    {
        return $this->combined_season;
    }

    /**
     * Get director
     *
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Get dvd chapter
     *
     * @return mixed
     */
    public function getDvdChapter()
    {
        return $this->dvd_chapter;
    }

    /**
     * Get dvd disc id
     * @return mixed
     */
    public function getDvdDiscId()
    {
        return $this->dvd_discid;
    }

    /**
     * Get dvd episode number
     *
     * @return mixed
     */
    public function getDvdEpisodeNumber()
    {
        return $this->dvd_episodenumber;
    }

    /**
     * Get dvd season
     *
     * @return mixed
     */
    public function getDvdSeason()
    {
        return $this->dvd_season;
    }

    /**
     * Get episode image flag
     *
     * @return mixed
     */
    public function getEpisodeImgFlag()
    {
        return $this->epimgflag;
    }

    /**
     * Get episode name
     *
     * @return mixed
     */
    public function getEpisodeName()
    {
        return $this->episodename;
    }

    /**
     * Get episode number
     *
     * @return mixed
     */
    public function getEpisodeNumber()
    {
        return $this->episodenumber;
    }

    /**
     * Get filename
     *
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Get first aired
     *
     * @return mixed
     */
    public function getFirstAired()
    {
        return $this->firstaired;
    }

    /**
     * Get flagged
     *
     * @return mixed
     */
    public function getFlagged()
    {
        return $this->flagged;
    }

    /**
     * Get guest stars
     *
     * @return mixed
     */
    public function getGuestStars()
    {
        return $this->gueststars;
    }

    /**
     * Get imdb id
     *
     * @return mixed
     */
    public function getImdbId()
    {
        return $this->imdb_id;
    }

    /**
     * Get language
     *
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get last updated
     *
     * @return mixed
     */
    public function getLastUpdated()
    {
        return $this->lastupdated;
    }

    /**
     * Get mirror update
     *
     * @return mixed
     */
    public function getMirrorUpdate()
    {
        return $this->mirrorupdate;
    }

    /**
     * Get overview
     *
     * @return mixed
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Get production code
     * @return mixed
     */
    public function getProductionCode()
    {
        return $this->productioncode;
    }

    /**
     * Get rating
     *
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Get rating count
     *
     * @return mixed
     */
    public function getRatingCount()
    {
        return $this->ratingcount;
    }

    /**
     * Get season id
     *
     * @return mixed
     */
    public function getSeasonId()
    {
        return $this->seasonid;
    }

    /**
     * Get season number
     *
     * @return mixed
     */
    public function getSeasonNumber()
    {
        return $this->seasonnumber;
    }

    /**
     * Get series id
     *
     * @return mixed
     */
    public function getSeriesId()
    {
        return $this->seriesid;
    }

    /**
     * Get writer
     *
     * @return mixed
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * Set first air date
     *
     * @param string $value
     * @return $this
     */
    public function setFirstAired($value)
    {
        $this->firstaired = \DateTime::createFromFormat('Y-m-d', $value);

        return $this;
    }

    /**
     * Set last updated
     *
     * @param string $value
     * @return $this
     */
    public function setLastUpdated($value)
    {
        $this->lastupdated = new \DateTime();
        $this->lastupdated->setTimestamp($value);

        return $this;
    }

    /**
     * Set mirror updated
     *
     * @param string $value
     * @return $this
     */
    public function setMirrorUpdated($value)
    {
        $this->mirrorupdate = \DateTime::createFromFormat('Y-m-d H:i:s', $value);

        return $this;
    }

    /**
     * Set guest stars
     *
     * @param string $value
     * @return $this
     */
    public function setGuestStars($value)
    {
        $this->gueststars = array_map('trim', explode('|', trim($value, '|')));

        return $this;
    }

    /**
     * Set writers
     *
     * @param string $value
     * @return $this
     */
    public function setWriter($value)
    {
        $this->writer = array_map('trim', explode('|', trim($value, '|')));

        return $this;
    }

}
