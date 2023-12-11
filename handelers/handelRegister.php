<?php
include ('../core/validation.php');
include('../core/sessions.php');

include ('../core/request.php');

if(checkRequestMethod($_SERVER['REQUEST_METHOD']))
{
    foreach($_POST as $key=>$value)
    {
    $$key=sanitizeInput($value);
    }
//name validation
    if(requiredInput($name))
    {
        $errores[] ="name is requerd";
    }
    elseif(minInput($name,3))
    {
        $errores[] ="name must be larger than 3";
    }
    elseif(maxInput($name,30))
    {
        $errores[] ="name must be smaller than 30";
    }
//password validation

    if(requiredInput($password))
    {
        $errores[] ="password is requerd";
    }
    elseif(minInput($password,3))
    {
        $errores[] ="password must be larger than 3";
    }
   else if(maxInput($password,10))
    {
        $errores[] ="password must be smaller than 30";
    }

    //confirm password validation
    if(requiredInput($confirm_password))
    {
        $errores[] ="password is requerd";
    }
   else if(sameInput($password,$confirm_password))
     {
    $errores[] ="confirm password must equl password";
    }
//email validation 
    if(requiredInput($email))
    {
        $errores[] ="email is requerd";
    }
    elseif(emailInput($email))
    {
        $errores[] ="Enter valide email";
    }



    if(empty($errores))
    {
       $file_name = fopen("../data/user.csv","a+");
       $data=[$name , $email , sha1($password)];
       fputcsv($file_name , $data);
       $auth=[$name , $email ];
       sessionStore('auth', $auth);
    
       redirect("../index.php");
    
        die;
    }
    else{
        sessionStore('errors',$errores);
        redirect("../register.php");
        
        die;


    }

}
else 
{
    echo "request not correct";
}
?>