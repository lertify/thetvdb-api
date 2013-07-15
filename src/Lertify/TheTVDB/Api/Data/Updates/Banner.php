<?php

namespace Lertify\TheTVDB\Api\Data\Updates;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("banner")
 */
class Banner
{

    /**
     * @JMS\Type("string")
     */
    public $seasonnum;

    /**
     * @JMS\Type("string")
     */
    public $series;

    /**
     * @JMS\Type("string")
     */
    public $format;

    /**
     * @JMS\Type("string")
     */
    public $language;

    /**
     * @JMS\Type("string")
     */
    public $path;

    /**
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     */
    public $time;

    /**
     * @JMS\Type("string")
     */
    public $type;

    /**
     * Get season number
     *
     * @return mixed
     */
    public function getSeasonNum()
    {
        return $this->seasonnum;
    }

    /**
     * Get series id
     *
     * @return integer
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Get format
     *
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set update time
     *
     * @param integer $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = new \DateTime();
        $this->time->setTimestamp($time);

        return $this;
    }

    /**
     * Get update time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get banner type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

}
