<?php

namespace Lertify\TheTVDB\Api\Data\Language;

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
    public $abbreviation;

    /**
     * @JMS\Type("string")
     */
    public $name;

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
     * Get abbreviation
     *
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
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

}
