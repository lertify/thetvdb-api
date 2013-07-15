<?php

namespace Lertify\TheTVDB\Api\Data\User;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("series")
 */
class Rating
{

    /**
     * @JMS\Type("double")
     */
    public $rating;

    /**
     * Get rating
     *
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

}
