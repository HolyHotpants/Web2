<?php
    header('Content-Type: text/html; charset=UTF-8');
    try{
        $user="u47542";
        $pass="7615565";
        $conn= new PDO('mysql:host=212.192.134.20;dbname=UDB', $user, $pass, array(PDO::ATTR_PERSISTENT => true))
    }catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }

    if(isset($_POST["name"]) && isset($_POST["email"]) && 
        isset($_POST["date"]) && (isset($_POST["sex_M"])||isset($_POST["sex_W"]))&&
        (isset($_POST["Count_limbs_l2"])||isset($_POST["Count_limbs_m2"]))&&
        isset($_POST["biography"])&&isset($_POST["superpowers"])) 
    {
        if($_POST["check"])
        {
            


            $Id=$conn->lastInsertId();


        }
        else
            print_r("Поставьте галочку!");
    }
    else
    {   
        print_r("Заполните все поля!");
    }

    header("Location: https://www.youtube.com/watch?v=wQ8s8PCUTzY");
