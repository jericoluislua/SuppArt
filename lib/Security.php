<?php
class Security
{
    const SESSION_USER = 'LoggedIn';
    const ADMIN = "denis.chanmong@gmail.com" | "jericoluislua@yahoo.com.ph";
    //static function to check if user is logged in
    public static function isAuthenticated() {
        return isset($_SESSION[Security::getUser()]) && $_SESSION[Security::getUser()]->id > 0;
    }
    //static function to get current user
    public static function getUser() {
        return (!empty($_SESSION['LoggedIn'])) ? $_SESSION[Security::SESSION_USER] : null;
    }
    //static function to get current user's id
    public static function getUserId() {
        return (!empty($_SESSION[Security::getUser()])) ? $_SESSION[Security::getUser()]->id : 0;
    }
    //static function to check if user is admin
    public static function isAdmin(){
        if (isset($_SESSION[Security::getUser()])){
            if ($_SESSION[Security::getUser()]->email==Security::ADMIN){
                return true;
            }
            else{
                return false;
            }
        }
    }
}