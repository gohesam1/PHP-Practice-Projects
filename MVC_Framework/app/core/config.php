<?php

if($_SERVER['SERVER_NAME']=='localhost')
{
    define('DBNAME','mvc_db');
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    
    define ('ROOT', 'http://localhost/Learning/My%20practice%20files/PHP%20Practice%20Projects/MVC_Framework/public/');

} else {

    define('DBNAME','mvc_db');
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');

    define ('ROOT', 'https://www.mysite.com');
}

?>