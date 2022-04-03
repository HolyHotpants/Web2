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

$errors = FALSE;
if (empty($_POST['name']))
{
  print('Заполните имя.<br/>');
  $errors = TRUE;
}
if (empty($_POST['mail']))
{
  print('Введите почту.<br/>');
  $errors = TRUE;
}
if (empty($_POST['date']))
{
  print('Заполните дату.<br/>');
  $errors = TRUE;
}

if ($errors)
{
  print('hi error');
  exit();
}
  
$user = 'u47542';
$pass = '7615565';
$db = new PDO('mysql:host=localhost;dbname=u47542', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
  $stmt = $db->prepare("INSERT INTO site (Fio, Email, Date_birth, Sex, Count_limbs, Abilitys, Biography) 
  VALUES (:Fio, :Email, :Date_birth, :Sex, :Count_limbs, :Abilitys, :Biography)");
  
  $stmt -> bindParam(':Fio', $Fio);
  $stmt -> bindParam(':Email', $Email);
  $stmt -> bindParam(':Date_birth', $Date_birth);
  $stmt -> bindParam(':Sex', $Sex);
  $stmt -> bindParam(':Count_limbs', $Count_limbs);
  $stmt -> bindParam(':Abilitys', $Abilitys);
  $stmt -> bindParam(':Biography', $Biography);
  
  $Fio = $_POST['name'];
  print($Fio.'<br />');
  $Email = $_POST['mail'];
  print($Email.'<br />');
  $Date_birth = $_POST['date'];
  print($Date_birth.'<br />');
  $Sex = $_POST['gender'];
  print($Sex.'<br />');
  $Count_limbs = $_POST['limbs'];
  print($Count_limbs.'<br />');
  $Abilitys = $_POST['powers'];
  print($Abilitys.'<br />');
  $Biography = $_POST['biography'];
  print($Biography.'<br />');
  $stmt->execute();
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

header('Location: ?save=1');
