<?php

class Login
{
}

$login = new Login();

//* way to find the Name of the Class
var_dump($login::class); //! PHP 8 way
var_dump(get_class($login));
var_dump(Login::class);
