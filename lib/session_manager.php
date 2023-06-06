<?php 

// load config starting from the root directory

session_start();


class SessionManager {
   

    public static function isLoggedIn() {
        return isset($_SESSION['userid']);
    }

    public static function login($username, $password) {

        $user = User::getByUsername($username);

        if ($user && $user->verifyPassword($password)) {
            self::loguser($user);
            return true;
        }

        return false;
    }

    public static function loguser($user) {
        $_SESSION['userid'] = $user->id;
        $_SESSION['username'] = $user->username;
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

}