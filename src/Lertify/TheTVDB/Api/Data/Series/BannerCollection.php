<?php

namespace Lertify\TheTVDB\Api\Data\Series;

use Lertify\TheTVDB\Api\Data\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("banners")
 */
class BannerCollection extends ArrayCollection
{

    /**
     * @JMS\Type("array<Lertify\TheTVDB\Api\Data\Series\Banner>")
     * @JMS\XmlList(inline=true, entry="banner")
     */
    protected $_items;

}
