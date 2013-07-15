<?php

namespace Lertify\TheTVDB\Api\Data\User;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("favorites")
 */
class Favorites
{

    /**
     * @JMS\Type("array<integer>")
     * @JMS\XmlList(inline = true, entry = "series")
     */
    public $series;

    /**
     * Get favorite series list
     *
     * @return array
     */
    public function all()
    {
        return $this->series;
    }

}
