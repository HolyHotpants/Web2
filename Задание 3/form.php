<?php
    header('Content-Type: text/html; charset=UTF-8');
    
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["date"]))
    {

            $user='u47542';
            $pass='7615565';
            $conn= new PDO('mysql:host=localhost;dbname=u47542', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
            try {
                $Insert_form=$conn->prepare("INSERT INTO Ex3 (Fio, Email, Date_birth, Sex, Count_limbs, Abilitys, Biography) 
                VALUES (:Fio, :Email, :Date_birth, :Sex, :Count_limbs, :Abilitys, :Biography)");

                $Insert_form->bindParam(':Fio',$Fio);
                $Insert_form->bindParam(':Email',$Email);
                $Insert_form->bindParam(':Date_birth',$Date_birth);
                $Insert_form->bindParam(':Sex',$Sex);
                $Insert_form->bindParam(':Count_limbs',$Count_limbs);
                $Insert_form->bindParam(':Abilitys',$Abilitys);
                $Insert_form->bindParam(':Biography',$Biography);

                $Fio=$_POST["name"];
                $Email=$_POST["email"];
                $Date_birth=$_POST["date"];
                $Sex=$_POST["sex"];
                $Count_limbs=$_POST["count_limbs"];
                $Abilitys=$_POST["superpowers"];
                $Biography=$_POST["biography"];
                $Insert_form->execute();
            }catch(PDOException $e){
                print('Error : ' . $e->getMessage());
                exit();
            }
    }
    else
    {   
        print("Заполните все поля!");
    }

    header("Location: ?save=1");
?>
