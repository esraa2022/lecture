<?php
session_start();  

function sessionStore($key,$value)
{
     $_SESSION[$key]=$value;

}

function  sessionGet($key)
{
    return $_SESSION[$key]?? [];
}

function  sessionRemove($key)
{
    if(isset($_SESSION[$key]))
    {
        unset($_SESSION[$key]);
    }
}
?>