<?php

namespace Lertify\TheTVDB\Api\Data\Episode;

use Lertify\TheTVDB\Api\Data\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("episode")
 */
class EpisodeCollection extends ArrayCollection
{

    /**
     * @JMS\Type("array<Lertify\TheTVDB\Api\Data\Episode\Episode>")
     * @JMS\XmlList(inline=true, entry="episode")
     */
    protected $_items;

}
