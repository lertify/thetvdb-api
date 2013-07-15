<?php

namespace Lertify\TheTVDB\Api\Data\Series;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("data")
 */
class SeriesInfo extends Series
{

    /**
     * @JMS\Type("string")
     * @JMS\Accessor(setter="setActors")
     */
    protected $actors;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("airs_dayofweek")
     */
    protected $airs_day_of_week;

    /**
     * @JMS\Type("string")
     */
    protected $airs_time;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("contentrating")
     */
    protected $content_rating;

    /**
     * @JMS\Type("string")
     * @JMS\Accessor(setter="setGenre")
     */
    protected $genre;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("networkid")
     */
    protected $network_id;

    /**
     * @JMS\Type("double")
     */
    protected $rating;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("ratingcount")
     */
    protected $rating_count;

    /**
     * @JMS\Type("integer")
     */
    protected $runtime;

    /**
     * @JMS\Type("string")
     */
    protected $status;

    /**
     * @JMS\Type("string")
     */
    protected $added;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("addedby")
     */
    protected $added_by;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("fanart")
     */
    protected $fan_art;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("lastupdated")
     * @JMS\Accessor(setter="setLastUpdated")
     */
    protected $last_updated;

    /**
     * @JMS\Type("string")
     */
    protected $poster;

    /**
     * Set actors
     *
     * @access protected
     * @param string $actors
     *
     * @return $this
     */
    public function setActors($actors)
    {
        $this->actors = explode('|', trim($actors, '|'));

        return $this;
    }

    /**
     * Get actor names
     *
     * @return array
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set added
     *
     * @param string $added
     * @return $this
     */
    public function setAdded($added)
    {
        $this->added = $added;

        return $this;
    }

    /**
     * Get added
     *
     * @return mixed
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set added by
     *
     * @param $added_by
     * @return $this
     */
    public function setAddedBy($added_by)
    {
        $this->added_by = $added_by;

        return $this;
    }

    /**
     * Get added by
     *
     * @return mixed
     */
    public function getAddedBy()
    {
        return $this->added_by;
    }

    /**
     * Set air day of the week
     *
     * @param $airs_day_of_week
     * @return $this
     */
    public function setAirs_DayOfWeek($airs_day_of_week)
    {
        $this->airs_day_of_week = $airs_day_of_week;

        return $this;
    }

    /**
     * Get air day of the week
     *
     * @return mixed
     */
    public function getAirsDayOfWeek()
    {
        return $this->airs_day_of_week;
    }

    /**
     * Set airs time
     *
     * @param $airs_time
     * @return $this
     */
    public function setAirs_Time($airs_time)
    {
        $this->airs_time = $airs_time;

        return $this;
    }

    /**
     * Get airs time
     *
     * @return mixed
     */
    public function getAirsTime()
    {
        return $this->airs_time;
    }

    /**
     * Set content rating
     *
     * @param $content_rating
     * @return $this
     */
    public function setContentRating($content_rating)
    {
        $this->content_rating = $content_rating;

        return $this;
    }

    /**
     * Get content rating
     *
     * @return mixed
     */
    public function getContentRating()
    {
        return $this->content_rating;
    }

    /**
     * Set fan art
     *
     * @param $fan_art
     * @return $this
     */
    public function setFanArt($fan_art)
    {
        $this->fan_art = $fan_art;

        return $this;
    }

    /**
     * Get fan art
     *
     * @return mixed
     */
    public function getFanArt()
    {
        return $this->fan_art;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return $this
     */
    public function setGenre($genre)
    {
        $this->genre = explode('|', trim($genre, '|'));

        return $this;
    }

    /**
     * Get genre
     *
     * @return array
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set last updated
     *
     * @param $last_updated
     * @return $this
     */
    public function setLastUpdated($last_updated)
    {
        $this->last_updated = new \DateTime();
        $this->last_updated->setTimestamp($last_updated);

        return $this;
    }

    /**
     * Get last updated
     *
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->last_updated;
    }

    /**
     * Set network id
     *
     * @param $network_id
     * @return $this
     */
    public function setNetworkId($network_id)
    {
        $this->network_id = $network_id;

        return $this;
    }

    /**
     * Get network id
     *
     * @return mixed
     */
    public function getNetworkId()
    {
        return $this->network_id;
    }

    /**
     * Set poster
     *
     * @param $poster
     * @return $this
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get poster
     *
     * @return mixed
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set rating
     *
     * @param $rating
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = (float) $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set rating count
     *
     * @param $rating_count
     * @return $this
     */
    public function setRatingCount($rating_count)
    {
        $this->rating_count = (int) $rating_count;

        return $this;
    }

    /**
     * Get rating count
     *
     * @return integer
     */
    public function getRatingCount()
    {
        return $this->rating_count;
    }

    /**
     * Set runtime
     *
     * @param $runtime
     * @return $this
     */
    public function setRuntime($runtime)
    {
        $this->runtime = (int) $runtime;

        return $this;
    }

    /**
     * Get runtime
     *
     * @return integer
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * Set status
     *
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

}
