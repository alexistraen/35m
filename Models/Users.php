<?php

class Users extends Database {

    private $account_id;
    private $account_name;
    private $account_email;
    private $account_password;
    private $role_id;

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

    /**
     * Get the value of account_name
     */ 
    public function getAccount_name()
    {
        return $this->account_name;
    }

    /**
     * Set the value of account_name
     *
     * @return  self
     */ 
    public function setAccount_name($account_name)
    {
        $this->account_name = $account_name;

        return $this;
    }

    /**
     * Get the value of account_email
     */ 
    public function getAccount_email()
    {
        return $this->account_email;
    }

    /**
     * Set the value of account_email
     *
     * @return  self
     */ 
    public function setAccount_email($account_email)
    {
        $this->account_email = $account_email;

        return $this;
    }

    /**
     * Get the value of account_password
     */ 
    public function getAccount_password()
    {
        return $this->account_password;
    }

    /**
     * Set the value of account_password
     *
     * @return  self
     */ 
    public function setAccount_password($account_password)
    {
        $this->account_password = $account_password;

        return $this;
    }

    /**
     * Get the value of role_id
     */ 
    public function getRole_id()
    {
        return $this->role_id;
    }

    /**
     * Set the value of role_id
     *
     * @return  self
     */ 
    public function setRole_id($role_id)
    {
        $this->role_id = $role_id;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Method for check if an account name exists
     * 
     * @param string
     * @return array|boolean
     */

    public function checkExistsAccountName(string $checkName)
    {
        $query = "SELECT `account_name` FROM `35m_accounts` WHERE `account_name` = :checkName;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("checkName", $checkName);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for check if an email exists (register page)
     * 
     * @param string
     * @return array|boolean
     */

    public function checkExistsEmail(string $checkEmail)
    {
        $query = "SELECT `account_email` FROM `35m_accounts` WHERE `account_email` = :checkEmail;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("checkEmail", $checkEmail);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for return account id if an email exists
     * 
     * @param array
     * @return array|boolean
     */

    public function checkOthersAccountsEmail(array $arrayUpdateAccountInformations)
    {
        $query = "SELECT `account_id` FROM `35m_accounts` WHERE `account_email` = :account_email;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_email", $arrayUpdateAccountInformations["userAccountEmail"], PDO::PARAM_STR);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for create user account
     * 
     * @param array
     * @return boolean
     */

    public function addUser(array $arrayAccountInformations)
    {
        $query = "INSERT INTO `35m_accounts` (`account_name`, `account_email`, `account_password`) VALUES (:account_name, :account_email, :account_password);";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_name", $arrayAccountInformations["userAccountName"], PDO::PARAM_STR);
        $buildQuery->bindValue("account_email", $arrayAccountInformations["userAccountEmail"], PDO::PARAM_STR);
        $buildQuery->bindValue("account_password", $arrayAccountInformations["userAccountPassword"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Method for get all informations about an account with his role name
     * 
     * @param string
     * @return array|boolean
     */

    public function checkAccountInformations(string $userAccountName)
    {
        $query = "SELECT `account_id`, `account_name`, `account_email`, `account_password`, `role_name` 
        FROM `35m_accounts` 
        INNER JOIN `35m_users_role` 
        ON `35m_accounts`.`role_id` = `35m_users_role`.`role_id` 
        WHERE `35m_accounts`.`account_name` = :userAccountName;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("userAccountName", $userAccountName);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for get current password
     * 
     * @param int
     * @return array|boolean
     */

    public function getCurrentPassword(int $userAccountId)
    {
        $query = "SELECT `account_password` FROM `35m_accounts` WHERE `account_id` = :account_id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_id", $userAccountId, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Method for update account informations (mail)
     * 
     * @param array
     * @return boolean
     */

    public function updateAccountInformations(array $arrayUpdateAccountInformations)
    {
        $query = "UPDATE `35m_accounts` 
        SET `account_email` = :account_email 
        WHERE `account_id` = :account_id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_id", $arrayUpdateAccountInformations["userAccountId"], PDO::PARAM_INT);
        $buildQuery->bindValue("account_email", $arrayUpdateAccountInformations["userAccountEmail"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Method for update password
     * 
     * @param array
     * @return boolean
     */

    public function updateAccountPassword(array $arrayUpdateAccountInformations)
    {
        $query = "UPDATE `35m_accounts` 
        SET `account_password` = :account_password 
        WHERE `account_id` = :account_id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_id", $arrayUpdateAccountInformations["userAccountId"], PDO::PARAM_INT);
        $buildQuery->bindValue("account_password", $arrayUpdateAccountInformations["userAccountNewPassword"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Method for delete account by id
     * 
     * @param int
     * @return boolean
     */

    public function deleteAccountById(int $userAccountId) {
        $query = "DELETE FROM `35m_accounts` WHERE `account_id` = :account_id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("account_id", $userAccountId, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function getSeenListId(int $userAccountId) {
        $listIdQuery = "SELECT `user_list_id` FROM `35m_user_lists` WHERE `account_id` = :account_id AND `user_list_name` = 'likedMovies';";
        $buildlistIdQuery = parent::getDb()->prepare($listIdQuery);
        $buildlistIdQuery->bindValue("account_id", $userAccountId, PDO::PARAM_INT);
        $buildlistIdQuery->execute();
        $resultQuery = $buildlistIdQuery->fetch();
        return $resultQuery;
    }

    public function userHasSeenMovie(int $listId, int $movieId) {
        $movieQuery = "SELECT `movie_id` FROM `35m_listes` WHERE `user_list_id` = :user_list_id AND `movie_id` = :movie_id;";
        $buildMovieQuery = parent::getDb()->prepare($movieQuery);
        $buildMovieQuery->bindValue("user_list_id", $listId);
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