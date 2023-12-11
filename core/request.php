<?php

function checkRequestMethod($method)
{
    if($method=='POST')
    {
        return true;
    }
    return false;
}


?>