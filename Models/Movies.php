<?php

class Movies extends Database
{

    private $movie_id;
    private $movie_title;
    private $movie_picture;
    private $movie_gender;
    private $movie_duration;
    private $movie_nationality;
    private $movie_release_date;
    private $movie_director;
    private $movie_writters;
    private $movie_casting;
    private $movie_synopsis;
    private $movie_trailer;

    /**
     * Get the value of movie_id
     */
    public function getMovie_id()
    {
        return $this->movie_id;
    }

    /**
     * Set the value of movie_id
     *
     * @return  self
     */
    public function setMovie_id($movie_id)
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    /**
     * Get the value of movie_title
     */
    public function getMovie_title()
    {
        return $this->movie_title;
    }

    /**
     * Set the value of movie_title
     *
     * @return  self
     */
    public function setMovie_title($movie_title)
    {
        $this->movie_title = $movie_title;

        return $this;
    }

    /**
     * Get the value of movie_picture
     */
    public function getMovie_picture()
    {
        return $this->movie_picture;
    }

    /**
     * Set the value of movie_picture
     *
     * @return  self
     */
    public function setMovie_picture($movie_picture)
    {
        $this->movie_picture = $movie_picture;

        return $this;
    }

    /**
     * Get the value of movie_gender
     */
    public function getMovie_gender()
    {
        return $this->movie_gender;
    }

    /**
     * Set the value of movie_gender
     *
     * @return  self
     */
    public function setMovie_gender($movie_gender)
    {
        $this->movie_gender = $movie_gender;

        return $this;
    }

    /**
     * Get the value of movie_duration
     */
    public function getMovie_duration()
    {
        return $this->movie_duration;
    }

    /**
     * Set the value of movie_duration
     *
     * @return  self
     */
    public function setMovie_duration($movie_duration)
    {
        $this->movie_duration = $movie_duration;

        return $this;
    }

    /**
     * Get the value of movie_nationality
     */
    public function getMovie_nationality()
    {
        return $this->movie_nationality;
    }

    /**
     * Set the value of movie_nationality
     *
     * @return  self
     */
    public function setMovie_nationality($movie_nationality)
    {
        $this->movie_nationality = $movie_nationality;

        return $this;
    }

    /**
     * Get the value of movie_release_date
     */
    public function getMovie_release_date()
    {
        return $this->movie_release_date;
    }

    /**
     * Set the value of movie_release_date
     *
     * @return  self
     */
    public function setMovie_release_date($movie_release_date)
    {
        $this->movie_release_date = $movie_release_date;

        return $this;
    }

    /**
     * Get the value of movie_director
     */
    public function getMovie_director()
    {
        return $this->movie_director;
    }

    /**
     * Set the value of movie_director
     *
     * @return  self
     */
    public function setMovie_director($movie_director)
    {
        $this->movie_director = $movie_director;

        return $this;
    }

    /**
     * Get the value of movie_writters
     */
    public function getMovie_writters()
    {
        return $this->movie_writters;
    }

    /**
     * Set the value of movie_writters
     *
     * @return  self
     */
    public function setMovie_writters($movie_writters)
    {
        $this->movie_writters = $movie_writters;

        return $this;
    }

    /**
     * Get the value of movie_casting
     */
    public function getMovie_casting()
    {
        return $this->movie_casting;
    }

    /**
     * Set the value of movie_casting
     *
     * @return  self
     */
    public function setMovie_casting($movie_casting)
    {
        $this->movie_casting = $movie_casting;

        return $this;
    }

    /**
     * Get the value of movie_synopsis
     */
    public function getMovie_synopsis()
    {
        return $this->movie_synopsis;
    }

    /**
     * Set the value of movie_synopsis
     *
     * @return  self
     */
    public function setMovie_synopsis($movie_synopsis)
    {
        $this->movie_synopsis = $movie_synopsis;

        return $this;
    }

    /**
     * Get the value of movie_trailer
     */
    public function getMovie_trailer()
    {
        return $this->movie_trailer;
    }

    /**
     * Set the value of movie_trailer
     *
     * @return  self
     */
    public function setMovie_trailer($movie_trailer)
    {
        $this->movie_trailer = $movie_trailer;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Method for add a movie with all informations
     * 
     * @param array
     * @return boolean
     */

    public function addMovie(array $arrayMovieInformations)
    {
        $query = "INSERT INTO `35m_movies` (`movie_title`, `movie_picture`, `movie_gender`, `movie_duration`, `movie_nationality`, `movie_release_date`, `movie_director`, `movie_writters`, `movie_casting`, 
        `movie_synopsis`, `movie_trailer`) 
        VALUES (:movie_title, :movie_picture, :movie_gender, :movie_duration, :movie_nationality, :movie_release_date, :movie_director, :movie_writters, :movie_casting, :movie_synopsis, :movie_trailer);";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("movie_title", $arrayMovieInformations["movieTitle"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_picture", $arrayMovieInformations["moviePicture"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_gender", $arrayMovieInformations["movieGender"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_duration", $arrayMovieInformations["movieDuration"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_nationality", $arrayMovieInformations["movieNationality"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_release_date", $arrayMovieInformations["movieReleaseDate"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_director", $arrayMovieInformations["movieDirector"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_writters", $arrayMovieInformations["movieWritters"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_casting", $arrayMovieInformations["movieCasting"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_synopsis", $arrayMovieInformations["movieSynopsis"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_trailer", $arrayMovieInformations["movieTrailer"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Method for find a movie by his title
     * 
     * @param string
     * @return array|boolean
     */

    public function dashboardSearchMovie(string $dashboardSeachMovieQuery)
    {
        $query = "SELECT `movie_id`, `movie_title`, `movie_picture`, `movie_release_date` FROM `35m_movies` WHERE `movie_title` LIKE :dashboard_search ORDER BY `movie_title` LIMIT 20;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("dashboard_search", $dashboardSeachMovieQuery, PDO::PARAM_STR);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for find a movie by his title with more informations
     * 
     * @param string
     * @return array|boolean
     */

    public function findMovie(string $findMovie)
    {
        $query = "SELECT `movie_id`, `movie_title`, `movie_picture`, `movie_gender`, `movie_duration`, `movie_release_date`, `movie_nationality` FROM `35m_movies` WHERE `movie_title` LIKE :dashboard_search ORDER BY `movie_title` LIMIT 20;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("dashboard_search", $findMovie, PDO::PARAM_STR);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for get all movie informations by id
     * 
     * @param int
     * @return array|boolean
     */

    public function getMovieInformations(int $securedId)
    {
        $query = "SELECT * FROM `35m_movies` WHERE `movie_id` = :movie_id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("movie_id", $securedId, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for get minimum movie informations by id
     * 
     * @param int
     * @return array|boolean
     */

    public function getMovieMinimumInformations(int $securedId)
    {
        $query = "SELECT `movie_title`, `movie_picture`, `movie_release_date` FROM `35m_movies` WHERE `movie_id` = :movie_id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("movie_id", $securedId, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for get all movie informations
     * 
     * @return array|boolean
     */

    public function getMoviesPaging($startId, $moviePerPage)
    {
        $query = "SELECT `movie_id`, `movie_title`, `movie_picture`, `movie_release_date` FROM `35m_movies` LIMIT :startId, :moviePerPage;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("startId", $startId, PDO::PARAM_INT);
        $buildQuery->bindValue("moviePerPage", $moviePerPage, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for count rows in movies table
     * 
     * @return array|boolean
     */
    public function countMovies()
    {
        $query = "SELECT COUNT(*) AS `totalMoviesNumber` FROM `35m_movies`;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $countMovies = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if (!empty($countMovies)) {
            return $countMovies;
        } else {
            return false;
        }
    }

    /**
     * Method for update movie informations by id
     * 
     * @param array
     * @return boolean
     */

    public function updateMovie(array $arrayMovieUpdateInformations)
    {
        $query = "UPDATE `35m_movies` SET `movie_title` = :movie_title, `movie_picture` = :movie_picture, `movie_gender` = :movie_gender, `movie_duration` = :movie_duration, 
        `movie_nationality` = :movie_nationality, `movie_release_date` = :movie_release_date, `movie_director` = :movie_director, `movie_writters` = :movie_writters, 
        `movie_casting` = :movie_casting, `movie_synopsis` = :movie_synopsis, `movie_trailer` = :movie_trailer 
        WHERE `movie_id` = :movie_id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("movie_id", $arrayMovieUpdateInformations["movieId"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_title", $arrayMovieUpdateInformations["movieTitle"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_picture", $arrayMovieUpdateInformations["moviePicture"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_gender", $arrayMovieUpdateInformations["movieGender"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_duration", $arrayMovieUpdateInformations["movieDuration"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_nationality", $arrayMovieUpdateInformations["movieNationality"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_release_date", $arrayMovieUpdateInformations["movieReleaseDate"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_director", $arrayMovieUpdateInformations["movieDirector"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_writters", $arrayMovieUpdateInformations["movieWritters"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_casting", $arrayMovieUpdateInformations["movieCasting"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_synopsis", $arrayMovieUpdateInformations["movieSynopsis"], PDO::PARAM_STR);
        $buildQuery->bindValue("movie_trailer", $arrayMovieUpdateInformations["movieTrailer"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Method for delete movie by id
     * 
     * @param int
     * @return boolean
     */

    public function deleteMovieById(int $movieId)
    {
        $query = "DELETE FROM `35m_movies` WHERE `movie_id` = :movie_id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("movie_id", $movieId, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function checkIfMovieExists(int $movieId) {
        $movieQuery = "SELECT `movie_id` FROM `35m_movies` WHERE `movie_id` = :movie_id;";
        $buildMovieQuery = parent::getDb()->prepare($movieQuery);
        $buildMovieQuery->bindValue("movie_id", $movieId);
        $buildMovieQuery->execute();
        $resultQuery = $buildMovieQuery->rowCount();
        if ($resultQuery > 0) {
            return true;
        } else {
            return false;
        }
    }
}
