<?php

namespace Lertify\TheTVDB\Api\Data\Series;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("actor")
 */
class Actor
{

    /**
     * @JMS\Type("integer")
     */
    public $id;

    /**
     * @JMS\Type("string")
     */
    public $image;

    /**
     * @JMS\Type("string")
     */
    public $name;

    /**
     * @JMS\Type("string")
     */
    public $role;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("sortorder")
     */
    public $sort_order;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get sort order
     *
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }
    
}
