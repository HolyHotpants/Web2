<?php
    header('Content-Type: text/html; charset=UTF-8');

    if ($_SERVER['REQUEST_METHOD'] == 'GET')	
    {
        if (!empty($_GET['save']))
        {
            print('Спасибо, результаты сохранены.');
        }
        include('form.php');
        exit();
    }

    
    if(isset($_POST["name"]) && isset($_POST["email"]) && 
        isset($_POST["date"]) && (isset($_POST["sex_M"])||isset($_POST["sex_W"]))&&
        (isset($_POST["count_limbs_l2"])||isset($_POST["count_limbs_m2"]))&&
        isset($_POST["biography"])&&isset($_POST["superpowers"])) 
    {
        if($_POST["check"])
        {
            $user='u47542';
            $pass='7615565';
            $conn= new PDO('mysql:host=localhost;dbname=u47542', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
            try {
                $Insert_form=$conn->prepare("INSERT INTO Ex3 (Fio, Email, Date_birth, Sex, Count_limbs, Abilitys, Biography) 
                VALUES (:Fio, :Email, :Date_birth, :Sex, :Count_limbs, :Abilitys, :Biography)");

                $Insert_form->bindParam(':Fio',$Name);
                $Insert_form->bindParam(':Email',$Email);
                $Insert_form->bindParam(':Date_birth',$DateBirth);
                $Insert_form->bindParam(':Sex',$Sex);
                $Insert_form->bindParam(':Count_limbs',$Count_limbs);
                $Insert_form->bindParam(':Abilitys',$Abilitys);
                $Insert_form->bindParam(':Biography',$Biography);

                $Name=$_POST["name"];
                $Email=$_POST["email"];
                $DateBirth=$_POST["date"];
                $Sex=$_POST["sex"];
                $count_limbs='>2';
                $Count_limbs=$_POST["count_limbs"];
                $Abilitys="";
                $Superpowers=$_POST["superpowers"];
                foreach($Superpowers as $power)
                    $Abilitys+=$power+", ";
                $Abilitys-=", ";
                $Biography=$_POST["biography"];
                $Insert_form->execute();
            }catch(PDOException $e){
                print('Error : ' . $e->getMessage());
                exit();
            }
        }
        else
            print("Поставьте галочку!");
    }
    else
    {   
        print("Заполните все поля!");
    }

    header("Location: index3.php");
?>

