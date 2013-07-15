<?php

namespace Lertify\TheTVDB\Api\Data\User;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("series")
 */
class UserRating
{

    /**
     * @JMS\Type("integer")
     */
    public $seriesid;

    /**
     * @JMS\Type("double")
     */
    public $userrating;

    /**
     * @JMS\Type("double")
     */
    public $communityrating;

    /**
     * Get series id
     *
     * @return int
     */
    public function getSeriesId()
    {
        return $this->seriesid;
    }

    /**
     * Get user rating
     *
     * @return float
     */
    public function getUserRating()
    {
        return $this->userrating;
    }

    /**
     * Get community rating
     *
     * @return float
     */
    public function getCommunityRating()
    {
        return $this->communityrating;
    }

}
