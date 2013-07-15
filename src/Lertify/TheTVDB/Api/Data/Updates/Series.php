<?php

namespace Lertify\TheTVDB\Api\Data\Updates;

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
     * @JMS\AccessType("public_method")
     */
    protected $time;

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
     * Set update time
     *
     * @param integer $time
     *
     * @return self
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
