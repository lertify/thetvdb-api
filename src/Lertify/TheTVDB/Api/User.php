<?php

namespace Lertify\TheTVDB\Api;

use Lertify\TheTVDB\Exception;
use Lertify\TheTVDB\Api\Data\User AS Data;
use Lertify\TheTVDB\Api\Data\ArrayCollection;

class User extends AbstractApi
{

    /**
     * Get series rated by user
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:GetRatingsForUser
     *
     * @param $account_id user account id
     * @param string $series_id series id
     * @return ArrayCollection
     */
    public function getRating($account_id, $series_id = '') {
        $results = $this->get('GetRatingsForUser.php?apikey=:apikey', array('accountid' => $account_id, 'seriesid' => $series_id));

        $list = new ArrayCollection();

        foreach( $results AS $series) {
            $list->add( new Data\Series( $series ) );
        }

        return $list;
    }

    /**
     * Get user prefered language
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_PreferredLanguage
     *
     * @param $account_id user account id
     * @return Data\Language|null
     */
    public function getPreferredLanguages($account_id) {
        $result = $this->get('User_PreferredLanguage.php', array('accountid' => $account_id));
        if(!isset($result['language'])) return null;
        return new Data\Language( $result['language'] );
    }

    /**
     * Get User Favorites
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Favorites
     *
     * @param $account_id user account id
     * @return ArrayCollection
     */
    public function getFavorites($account_id) {
        $results = $this->get('User_Favorites.php', array('accountid' => $account_id));

        $list = new ArrayCollection();

        foreach( $results['series'] AS $data) {
            if(empty($data)) continue;
            $list->add($data);
        }

        return $list;
    }

    /**
     * Add series to user favorites
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Favorites
     *
     * @param $account_id user account id
     * @param $series_id series id
     * @return ArrayCollection|null
     */
    public function addFavorite($account_id, $series_id) {
        $result = $this->get('User_Favorites.php', array('accountid' => $account_id, 'type' => 'add', 'seriesid' => $series_id));

        if(!isset($result['series'])) return null;

        $list = new ArrayCollection();

        foreach( $result['series'] AS $data) {
            if(empty($data)) continue;
            $list->add($data);
        }

        return $list;
    }

    /**
     * Remove series from user favorites
     *
     * @link http://www.thetvdb.com/wiki/index.php/API:User_Favorites
     *
     * @param $account_id user account id
     * @param $series_id series id
     * @return ArrayCollection|null
     */
    public function removeFavorite($account_id, $series_id) {
        $result = $this->get('User_Favorites.php', array('accountid' => $account_id, 'type' => 'remove', 'seriesid' => $series_id));

        if(!isset($result['series'])) return null;

        $list = new ArrayCollection();

        foreach( $result['series'] AS $data) {
            if(empty($data)) continue;
            $list->add($data);
        }

        return $list;
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
    public function postSeriesRating($account_id, $series_id, $rating) {
        $result = $this->postRating($account_id, 'series', $series_id, $rating);

        if(!isset($result['series'])) return null;
        return (float) $result['series']['rating'];
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
    public function postEpisodeRating($account_id, $episode_id, $rating) {
        $result = $this->postRating($account_id, 'episode', $episode_id, $rating);

        if(!isset($result['episode'])) return null;
        return (float) $result['episode']['rating'];
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
    protected function postRating($account_id, $item_type, $item_id, $rating) {
        return $this->get('User_Rating.php', array('accountid' => $account_id, 'itemtype' => $item_type, 'itemid' => $item_id, 'rating' => $rating));
    }

}
