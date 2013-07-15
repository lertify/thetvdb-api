<?php

namespace Lertify\TheTVDB\Api\Data\Language;

use Lertify\TheTVDB\Api\Data\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("language")
 */
class LanguageCollection extends ArrayCollection
{

    /**
     * @JMS\Type("array<Lertify\TheTVDB\Api\Data\Language\Language>")
     * @JMS\XmlList(inline=true, entry="language")
     */
    protected $_items;

}
