<?php

namespace Lertify\TheTVDB\Api\Data\User;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("language")
 */
class Language
{

    /**
     * @JMS\Type("integer")
     */
    public $id;

    /**
     * @JMS\Type("string")
     */
    public $name;

    /**
     * @JMS\Type("string")
     */
    public $abbreviation;

    /**
     * Get language id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get language name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get language abbreviation
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

}
