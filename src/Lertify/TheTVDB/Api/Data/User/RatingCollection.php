<?php

namespace Lertify\TheTVDB\Api\Data\User;

use Lertify\TheTVDB\Api\Data\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("data")
 */
class RatingCollection extends ArrayCollection
{

    /**
     * @JMS\Type("array<Lertify\TheTVDB\Api\Data\User\UserRating>")
     * @JMS\XmlList(inline=true, entry="series")
     */
    protected $_items;

}
