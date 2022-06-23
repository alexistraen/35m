<?php

class UserLists extends Database
{
    private $user_list_id;
    private $user_list_name;
    private $account_id;

    /**
     * Get the value of user_list_id
     */
    public function getUser_list_id()
    {
        return $this->user_list_id;
    }

    /**
     * Set the value of user_list_id
     *
     * @return  self
     */
    public function setUser_list_id($user_list_id)
    {
        $this->user_list_id = $user_list_id;

        return $this;
    }

    /**
     * Get the value of user_list_name
     */
    public function getUser_list_name()
    {
        return $this->user_list_name;
    }

    /**
     * Set the value of user_list_name
     *
     * @return  self
     */
    public function setUser_list_name($user_list_name)
    {
        $this->user_list_name = $user_list_name;

        return $this;
    }

    /**
     * Get the value of account_id
     */
    public function getAccount_id()
    {
        return $this->account_id;
    }

    /**
     * Set the value of account_id
     *
     * @return  self
     */
    public function setAccount_id($account_id)
    {
        $this->account_id = $account_id;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Method for add default user lists at the user account creation
     * 
     * @param int
     * @return boolean
     */

    public function newUserDefaultLists(int $account_id)
    {
        $query = "INSERT INTO `35m_user_lists` (`user_list_name`, `account_id`) VALUES ('likedMovies', :account_id), ('toWatchMovies', :account_id);";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_id", $account_id);
        return $buildQuery->execute();
    }

    /**
     * Method for get liked movies id list by user id
     * 
     * @param int
     * @return array|boolean
     */

    public function getLikedMoviesId(int $account_id)
    {
        $query = "SELECT `user_list_id`, `user_list_name` FROM `35m_user_lists` WHERE `account_id` = :account_id AND `user_list_name` = 'likedMovies';";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_id", $account_id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery["user_list_id"];
        } else {
            return false;
        }
    }

    /**
     * Method for get to watch movies id list by user id
     * 
     * @param int
     * @return array|boolean
     */

    public function getToWatchMoviesId(int $account_id)
    {
        $query = "SELECT `user_list_id`, `user_list_name` FROM `35m_user_lists` WHERE `account_id` = :account_id AND `user_list_name` = 'toWatchMovies';";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_id", $account_id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery["user_list_id"];
        } else {
            return false;
        }
    }

    /**
     * Method for get all movies in a list
     * 
     * @param 
     * @return 
     */

    public function getMoviesFromList(int $listId)
    {
        $query = "SELECT `35m_movies`.`movie_id`, `movie_title`, `movie_picture`, `movie_release_date`, `movie_add_date` 
        FROM `35m_movies`
        INNER JOIN `35m_listes`
        ON `35m_movies`.`movie_id` = `35m_listes`.`movie_id`
        WHERE `user_list_id` = :listId;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("listId", $listId, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for get list name by his id
     * 
     * @param 
     * @return 
     */

    public function getListName(int $listId)
    {
        $query = "SELECT `user_list_name` FROM `35m_user_lists` WHERE `user_list_id` = :listId;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("listId", $listId, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function removeMovieInSeenList(int $seenListId, int $movieId)
    {
        $query = "DELETE FROM `35m_listes` WHERE `user_list_id` = :seenListId AND `movie_id` = :movieId;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("seenListId", $seenListId, PDO::PARAM_INT);
        $buildQuery->bindValue("movieId", $movieId, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function addMovieInSeenList(int $seenListId, int $movieId, $currentTime) {
        $query = "INSERT INTO `35m_listes` (`user_list_id`, `movie_id`, `movie_add_date`) VALUES (:seenListId, :movieId, :currentTime);";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("seenListId", $seenListId, PDO::PARAM_INT);
        $buildQuery->bindValue("movieId", $movieId, PDO::PARAM_INT);
        $buildQuery->bindValue("currentTime", $currentTime, PDO::PARAM_STR);
        return $buildQuery->execute();
    }
}
