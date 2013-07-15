<?php

namespace Lertify\TheTVDB\Api\Data\Series;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("banner")
 */
class Banner
{

    /**
     * @JMS\Type("integer")
     */
    public $id;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("bannerpath")
     */
    public $banner_path;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("bannertype")
     */
    public $banner_type;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("bannertype2")
     */
    public $banner_type2;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("colors")
     * @JMS\Accessor(setter="setColors")
     */
    public $colors;

    /**
     * @JMS\Type("string")
     */
    public $language;

    /**
     * @JMS\Type("double")
     */
    public $rating;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("ratingcount")
     */
    public $rating_count;

    /**
     * @JMS\Type("string")
     */
    public $season;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("seriesname")
     */
    public $series_name;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("thumbnailpath")
     */
    public $thumbnail_path;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("vignettepath")
     */
    public $vignette_path;

    /**
     * Get banner id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get banner path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->banner_path;
    }

    /**
     * Get banner type
     *
     * @return string
     */
    public function getType()
    {
        return $this->banner_type;
    }

    /**
     * Get banner type 2
     * For series banners it can be text, graphical, or blank.
     * For season banners it can be season or seasonwide. For fanart it can be 1280x720 or 1920x1080.
     * For poster it will always be 680x1000.
     *
     * @return string
     */
    public function getBannerType2()
    {
        return $this->banner_type2;
    }

    /**
     * Get colors
     * Returns either null or three RGB colors in decimal format and pipe delimited
     *
     * @return string
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Set colors
     *
     * @access protected
     * @param string $value
     *
     * @return $this
     */
    public function setColors($value)
    {
        $this->colors = explode('|', trim($value, '|'));

        return $this;
    }

    /**
     * Get banner language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get banner rating
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Get rating count
     *
     * @return int
     */
    public function getRatingCount()
    {
        return $this->rating_count;
    }

    /**
     * Get banner season
     *
     * @return int
     */
    public function getSeason()
    {
        return $this->season;
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
     * Get thumbnail path
     *
     * @return string
     */
    public function getThumbnailPath()
    {
        return $this->thumbnail_path;
    }

    /**
     * Get vignette path
     *
     * @return string
     */
    public function getVignettePath()
    {
        return $this->vignette_path;
    }

}
