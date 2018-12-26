<?php

namespace Session;

use \Model\Resource\UserResource;

class User
{
    public static function login(string $email, string $passwd)
    {
        self::initSession();

        $resourceModel = new UserResource();
        $user = $resourceModel->authUser($email, $passwd);

        if($user != false) {
            $_SESSION['user_id']    = $user->getId();
            $_SESSION['user_email'] = $user->getEmail();

            return true;
        } else {
            $_SESSION['mgs'] = "Sign in failed.";
        }

        return false;
    }

    public static function logout()
    {
        self::initSession();
        session_destroy();
    }

    public static function isLoggedIn()
    {
        self::initSession();

        if(isset($_SESSION['user_id'])) {
            return true;
        }

        return false;
    }

    public static function initSession()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function checkLogin()
    {
        if (!self::isLoggedIn()) {
            $url = \App::getBaseUrl() . 'index/login';
            header("Location: $url");
        }
    }
}
