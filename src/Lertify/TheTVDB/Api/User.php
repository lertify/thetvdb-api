<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\User AS Data;
use Lertify\TheTVDB\Api\Data\ArrayCollection;

/**
 * Class User
 * @package Lertify\TheTVDB\Api
 * @description User api
 */
class User extends AbstractApi
{

    /**
     * Get series rated by user
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetRatingsForUser
     *
     * @param $account_id user account id
     * @param string $series_id series id
     *
     * @return ArrayCollection
     */
    public function getRating($account_id, $series_id = '')
    {
        return $this->get('User\RatingCollection', 'GetRatingsForUser.php?apikey=:apikey', array('accountid' => $account_id, 'seriesid' => $series_id));
    }

    /**
     * Get user preferred language
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_PreferredLanguage
     *
     * @param $account_id user account id
     * @return Data\Language|null
     */
    public function getPreferredLanguage($account_id)
    {
        return $this->get('User\Language<single>', 'User_PreferredLanguage.php', array('accountid' => $account_id));
    }

    /**
     * Get User Favorites
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Favorites
     *
     * @param $account_id user account id
     * @return Data\Favorites
     */
    public function getFavorites($account_id)
    {
        return $this->get('User\Favorites', 'User_Favorites.php', array('accountid' => $account_id));
    }

    /**
     * Add series to user favorites
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Favorites
     *
     * @param $account_id user account id
     * @param $series_id series id
     * @return Data\Favorites
     */
    public function addFavorite($account_id, $series_id)
    {
        return $this->get('User\Favorites', 'User_Favorites.php', array('accountid' => $account_id, 'type' => 'add', 'seriesid' => $series_id));
    }

    /**
     * Remove series from user favorites
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Favorites
     *
     * @param $account_id user account id
     * @param $series_id series id
     * @return Data\Favorites
     */
    public function removeFavorite($account_id, $series_id)
    {
        return $this->get('User\Favorites', 'User_Favorites.php', array('accountid' => $account_id, 'type' => 'remove', 'seriesid' => $series_id));
    }

    /**
     * Post series rating
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Rating
     *
     * @param $account_id user account id
     * @param $series_id series id
     * @param $rating series rating
     * @return float|null
     */
    public function postSeriesRating($account_id, $series_id, $rating)
    {
        return $this->postRating($account_id, 'series', $series_id, $rating);
    }

    /**
     * Post episode rating
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Rating
     *
     * @param $account_id user account id
     * @param $episode_id episode id
     * @param $rating episode rating
     * @return float|null
     */
    public function postEpisodeRating($account_id, $episode_id, $rating)
    {
        return $this->postRating($account_id, 'episode', $episode_id, $rating);
    }

    /**
     * Post user rating
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Rating
     *
     * @param $account_id
     * @param $item_type
     * @param $item_id
     * @param $rating
     * @return object
     */
    protected function postRating($account_id, $item_type, $item_id, $rating)
    {
        return $this->get('User\Rating<single>', 'User_Rating.php', array('accountid' => $account_id, 'itemtype' => $item_type, 'itemid' => $item_id, 'rating' => $rating));
    }

}
