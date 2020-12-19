<?php
use \Rsnunes\Model\User;

function v($str){
    var_dump($str);
}
function formatPrice(float $vlprice)
{

    return number_format($vlprice, 2, ',', '.');

}

function checkLogin($inadmin = true)
{

    return User::checkLogin($inadmin);

}

function getUserName()
{

    $user = User::getFromSession();

    return $user->getdesperson();

}

?>