<?php

namespace Model\Resource;

use \Model\User as UserModel;

class User extends Base 
{
    public function authUser(string $email, string $password)
    {
        $con = $this->connect();

        $sql = "
        SELECT `id`, 
            `email`
            FROM `user`
            WHERE `email` = %s
                AND `passwd` = %s
        ";

        $tmp = sprintf($sql, $con->quote($email), $con->quote($password));

        $stmt = $con->query($tmp);

        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $user = new UserModel();
            $user->setEmail($row['email']);
            $user->setId($row['id']);

            return $user;
        }

        return false;
    }
}