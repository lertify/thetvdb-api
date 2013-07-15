<?php

namespace Lertify\TheTVDB\Api\Data\Updates;

use JMS\Serializer\Annotation as JMS;

use Lertify\TheTVDB\Api\Data\ArrayCollection;
use Lertify\TheTVDB\Api\Data\Updates\Series;
use Lertify\TheTVDB\Api\Data\Updates\Episode;
use Lertify\TheTVDB\Api\Data\Updates\Banner;

/**
 * @JMS\XmlRoot("data")
 */
class Updates
{

    /**
     * @JMS\XmlAttribute
     * @JMS\Type("integer")
     * @JMS\Accessor(setter="setTime")
     */
    protected $time;

    /**
     * @JMS\Type("Lertify\TheTVDB\Api\Data\ArrayCollection<Lertify\TheTVDB\Api\Data\Updates\Series>")
     * @JMS\XmlList(inline=true, entry="series")
     */
    protected $series;

    /**
     * @JMS\Type("Lertify\TheTVDB\Api\Data\ArrayCollection<Lertify\TheTVDB\Api\Data\Updates\Episode>")
     * @JMS\XmlList(inline=true, entry="episode")
     */
    protected $episodes;

    /**
     * @JMS\Type("Lertify\TheTVDB\Api\Data\ArrayCollection<Lertify\TheTVDB\Api\Data\Updates\Banner>")
     * @JMS\XmlList(inline=true, entry="banner")
     */
    protected $banners;

    /**
     * Set update time
     *
     * @param integer $time
     *
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = new \DateTime();
        $this->time->setTimestamp($time);

        return $this;
    }

    /**
     * Get update time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return ArrayCollection<Series>
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @return ArrayCollection<Episode>
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * @return ArrayCollection<Banner>
     */
    public function getBanners()
    {
        return $this->banners;
    }

}
