<?php

namespace frontend\repositories;

use common\models\User;

interface UserRepositoryInterface {

    /**
     * @param string $email
     * @return User
     */
    public function getUserByEmail(string $email): User;
}