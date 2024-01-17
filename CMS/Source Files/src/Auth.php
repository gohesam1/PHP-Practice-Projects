<?php

class Auth {

    function checkLogin($username, $password) {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $userObj = new User($dbc);
        $userObj->findBy( 'username', $username );

        if ( property_exists ( $userObj , 'id') ) {
            // if ($userObj->password == md5($password . ENCRYPTION_SALT . $userObj->password_hash)){
            if (password_verify( $password, $userObj->password)){
                //all is good
                return true;
            }
        }
    }

    function changeUserPassword($userObj, $newPassword){
        // $tmp = date('YmdHis') . 'secrate_string123412';
        // $hash = md5($tmp);
        // $hashedpassword = md5($newPassword . ENCRYPTION_SALT . $hash);

        // $userObj->password = $hashedpassword;
        // $userObj->password_hash = $hash;
        
        // $userObj->password = password_hash($newPassword, PASSWORD_DEFAULT);
        // $userObj->password_hash = $hash;

        // $userObj->password = (md5($newPassword));
        $userObj->password = password_hash($newPassword, PASSWORD_DEFAULT);

        return $userObj;
    }
}