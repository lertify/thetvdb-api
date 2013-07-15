<?php

namespace Lertify\TheTVDB\Api\Data\Series;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("series")
 */
class Series
{

    /**
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("seriesid")
     */
    protected $series_id;

    /**
     * @JMS\Type("string")
     */
    protected $imdb_id;

    /**
     * @JMS\Type("string")
     */
    protected $zap2it_id;

    /**
     * @JMS\Type("string")
     */
    protected $language;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("seriesname")
     */
    protected $series_name;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("aliasnames")
     * @JMS\Accessor(setter="setAliasNames")
     */
    protected $alias_names;

    /**
     * @JMS\Type("string")
     */
    protected $overview;

    /**
     * @JMS\Type("string")
     */
    protected $network;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("firstaired")
     * @JMS\Accessor(setter="setFirstAired")
     */
    protected $first_aired;

    /**
     * @JMS\Type("string")
     */
    protected $banner;

    /**
     * Get series id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get IMDB id
     *
     * @return string
     */
    public function getImdbId()
    {
        return $this->imdb_id;
    }

    /**
     * Get Zap2it id
     *
     * @return string
     */
    public function getZap2itId()
    {
        return $this->zap2it_id;
    }

    /**
     * Get language code
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get series name
     *
     * @return string
     */
    public function getSeriesName()
    {
        return $this->series_name;
    }

    /**
     * Set series alias names
     *
     * @access protected
     * @param string $alias_names
     *
     * @return $this
     */
    public function setAliasNames($alias_names)
    {
        $this->alias_names = explode("|", trim($alias_names, '|'));

        return $this;
    }

    /**
     * Get series alias names
     *
     * @return array<string>
     */
    public function getAliasNames()
    {
        return $this->alias_names;
    }

    /**
     * Get series overview
     *
     * @return string
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Get network
     *
     * @return string
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set first air date
     *
     * @access protected
     * @param string $value
     *
     * @return $this
     */
    public function setFirstAired($value)
    {
        $this->first_aired = \DateTime::createFromFormat('Y-m-d', $value);

        return $this;
    }

    /**
     * Get first air date
     *
     * @return \DateTime
     */
    public function getFirstAired()
    {
        return $this->first_aired;
    }

    /**
     * Get series banner path
     *
     * @return string
     */
    public function getBanner()
    {
        return $this->banner;
    }

}
