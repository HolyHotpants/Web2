<?php
    header('Content-Type: text/html; charset=UTF-8');

    $conn= new PDO('mysql:host=localhost;dbname=u47542', "u47542", "7615565", array(PDO::ATTR_PERSISTENT => true));
    if(isset($_POST["name"]) && isset($_POST["email"]) && 
        isset($_POST["date"]) && (isset($_POST["sex_M"])||isset($_POST["sex_W"]))&&
        (isset($_POST["count_limbs_l2"])||isset($_POST["count_limbs_m2"]))&&
        isset($_POST["biography"])&&isset($_POST["superpowers"])) 
    {
        if($_POST["check"])
        {
            $Name=$_POST["name"];
            $Email=$_POST["email"];
            $DateBirth=$_POST["date"];
            $Sex=$_POST["sex"];
            $Count_limbs=$_POST["count_limbs"];
            $Abilitys="";
            $Superpowers=$_POST["superpowers"];
            foreach($Superpowers as $power)
                $Abilitys+=$power+", ";
            $Abilitys-=", ";
            $Biography=$_POST["biography"];
            $Insert_form=$conn->prepare("INSERT INTO Ex3 (Fio, Email, Date_birth, Sex, Count_limbs, Abilitys, Biography) 
                                        VALUES (':name', ':email', :date, ':sex', ':count_limbs', ':superpowers', ':biography')");
            $Insert_form->bindParam(':name',$Name);
            $Insert_form->bindParam(':email',$Email);
            $Insert_form->bindParam(':date',$DateBirth);
            $Insert_form->bindParam(':sex',$Sex);
            $Insert_form->bindParam(':count_limbs',$Count_limbs);
            $Insert_form->bindParam(':superpowers',$Abilitys);
            $Insert_form->bindParam(':biography',$Biography);
            $Insert_pform=$Insert_form->execute();

        }
        else
            print_r("Поставьте галочку!");
    }
    else
    {   
        print_r("Заполните все поля!");
    }

    header("Location: index3.html");
?>
