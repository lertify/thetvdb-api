<?php

namespace Lertify\TheTVDB\Api\Data\Updates;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("episode")
 */
class Episode
{

    /**
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @JMS\Type("string")
     */
    protected $series;

    /**
     * @JMS\Type("integer")
     * @JMS\AccessType("public_method")
     */
    protected $time;

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
     * Get series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set update time
     *
     * @param integer $time
     *
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

}
