<?php

namespace Lertify\TheTVDB\Api\Data\Series;

use Lertify\TheTVDB\Api\Data\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("actors")
 */
class ActorCollection extends ArrayCollection
{

    /**
     * @JMS\Type("array<Lertify\TheTVDB\Api\Data\Series\Actor>")
     * @JMS\XmlList(inline=true, entry="actor")
     */
    protected $_items;

}
