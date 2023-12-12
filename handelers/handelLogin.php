<?php
include ('../core/validation.php');
include('../core/sessions.php');

include ('../core/request.php');

if(checkRequestMethod("POST"))
{
    foreach($_POST as $key=>$value)
    {
    $$key=sanitizeInput($value);
    }

//password validation

    if(requiredInput($password))
    {
        $Lerrores[] ="password is requerd";
    }
    elseif(minInput($password,3))
    {
        $Lerrores[] ="password must be larger than 3";
    }
   else if(maxInput($password,10))
    {
        $Lerrores[] ="password must be smaller than 30";
    }

   
//email validation 
    if(requiredInput($email))
    {
        $Lerrores[] ="email is requerd";
    }
    elseif(emailInput($email))
    {
        $Lerrores[] ="Enter valide email";
    }



    if(empty($Lerrores))
    {
        $file = fopen("../data/user.csv", "r");
        while (!feof($file)) {
            $data = fgetcsv($file);
            if ($data !== false && trim($data[1]) == $email && $data[2] == sha1($password)) {
                $name = trim($data[0]);
                $auth = [$name, $email];
                sessionStore('auth', $auth);
                fclose($file);
                redirect("../index.php");
                die;
            }
        }
        fclose($file);
        
        $Lerrores[]="Not correct email or password";

    }

        if(!empty($Lerrores))
        {    
             sessionStore('login',$Lerrores);
             redirect("../login.php");
        
             die;
        }

    

 }
else 
{
    echo "request not correct";
}
?>