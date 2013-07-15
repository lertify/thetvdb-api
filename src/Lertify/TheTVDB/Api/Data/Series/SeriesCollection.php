<?php

namespace Lertify\TheTVDB\Api\Data\Series;

use Lertify\TheTVDB\Api\Data\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("data")
 */
class SeriesCollection extends ArrayCollection
{

    /**
     * @JMS\Type("array<Lertify\TheTVDB\Api\Data\Series\Series>")
     * @JMS\XmlList(inline=true, entry="series")
     */
    protected $_items;

}
