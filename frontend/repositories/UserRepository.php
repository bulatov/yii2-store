<?php

namespace frontend\repositories;

use common\models\User;

class UserRepository implements UserRepositoryInterface {

    /**
     * @inheritdoc
     */
    public function getUserByEmail(string $email):User {
        return User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $email,
        ]);
    }
}