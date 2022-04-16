<?php  
    header('Content-Type: text/html; charset=UTF-8');
    
    // В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
    // и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      // Массив для временного хранения сообщений пользователю.
      $messages = array();
    
      // В суперглобальном массиве $_COOKIE PHP хранит все имена и значения куки текущего запроса.
      // Выдаем сообщение об успешном сохранении.
      if (!empty($_COOKIE['save'])) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('save', '', 100000);
        // Если есть параметр save, то выводим сообщение пользователю.
        $messages[] = 'Спасибо, результаты сохранены.';
      }
    
      // Складываем признак ошибок в массив.
      $errors = array();
      $errors['name'] = !empty($_COOKIE['name_error']);
      $errors['email'] = !empty($_COOKIE['email_error']);
      $errors['date'] = !empty($_COOKIE['date_error']);
      $errors['sex'] = !empty($_COOKIE['sex_error']);
      $errors['count_limbs'] = !empty($_COOKIE['count_limbs_error']);
      $errors['biography'] = !empty($_COOKIE['biography_error']);
      $errors['superpowers'] = !empty($_COOKIE['superpowers_error']);
      $errors['checkbox'] = !empty($_COOKIE['checkbox_error']);
    
      // Выдаем сообщения об ошибках.
      if ($errors['fio']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('fio_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Заполните имя.</div>';
      }
      if ($errors['email']) {
        setcookie('email_error', '', 100000);
        $messages[] = '<div class="error">Заполните почту.</div>';
      }
      if ($errors['date']) {
        setcookie('date_error', '', 100000);
        $messages[] = '<div class="error">Выберите дату.</div>';
      }
      if ($errors['sex']) {
        setcookie('sex_error', '', 100000);
        $messages[] = '<div class="error">Выберите ваш пол.</div>';
      }
      if ($errors['count_limbs']) {
        setcookie('count_limbs_error', '', 100000);
        $messages[] = '<div class="error">Выберите количество ваших конечностей.</div>';
      }
      if ($errors['biography']) {
        setcookie('biography_error', '', 100000);
        $messages[] = '<div class="error">Напишите что-нибудь о себе.</div>';
      }
      if ($errors['superpowers']) {
        setcookie('superpowers_error', '', 100000);
        $messages[] = '<div class="error">Выберите суперсилу.</div>';
      }
      if ($errors['checkbox']) {
        setcookie('checbox_error', '', 100000);
        $messages[] = '<div class="error">Поставьте галочку.</div>';
      }
    
      // Складываем предыдущие значения полей в массив, если есть.
      $values = array();
      $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];

      $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
      $values['date'] = empty($_COOKIE['date_value']) ? '' : $_COOKIE['date_value'];
      $values['sex'] = empty($_COOKIE['sex_value']) ? '' : $_COOKIE['sex_value'];
      $values['count_limbs'] = empty($_COOKIE['count_limbs_value']) ? '' : $_COOKIE['count_limbs_value'];
      $values['biography'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];
      $values['superpowers'] = empty($_COOKIE['superpowers_value']) ? '' : $_COOKIE['superpowers_value'];

      // Включаем содержимое файла form.php.
      // В нем будут доступны переменные $messages, $errors и $values для вывода 
      // сообщений, полей с ранее заполненными данными и признаками ошибок.
      include('index.php');
    }
    // Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.
    else {
      // Проверяем ошибки.
      $errors = FALSE;
      if (empty($_POST['fio'])) {
        // Выдаем куку на день с флажком об ошибке в поле fio.
        setcookie('fio_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        // Сохраняем ранее введенное в форму значение на месяц.
        setcookie('fio_value', $_POST['fio'], time() + 30 * 24 * 60 * 60);
      }

      if (empty($_POST['email'])) {
        setcookie('email_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
      }
      if (empty($_POST['date'])) {
        setcookie('date_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('date_value', $_POST['date'], time() + 30 * 24 * 60 * 60);
      }
      if (empty($_POST['sex'])) {
        setcookie('sex_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('sex_value', $_POST['sex'], time() + 30 * 24 * 60 * 60);
      }
      if (empty($_POST['count_limbs'])) {
        setcookie('count_limbs_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('count_limbs_value', $_POST['count_limbs'], time() + 30 * 24 * 60 * 60);
      }
      if (empty($_POST['biography'])) {
        setcookie('biography_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('biography_value', $_POST['biography'], time() + 30 * 24 * 60 * 60);
      }
      if (empty($_POST['superpowers'])) {
        setcookie('superpowers_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('superpowers_value', $_POST['superpowers'], time() + 30 * 24 * 60 * 60);
      }
      if (empty($_POST['checkbox'])) {
        setcookie('checkbox_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('checkbox_value', $_POST['checkbox'], time() + 30 * 24 * 60 * 60);
      }
    
    // *************
    // TODO: тут необходимо проверить правильность заполнения всех остальных полей.
    // Сохранить в Cookie признаки ошибок и значения полей.
    // *************
    
      if ($errors) {
        // При наличии ошибок перезагружаем страницу и завершаем работу скрипта.
        header('Location: form.php');
        exit();
      }
      else {
        // Удаляем Cookies с признаками ошибок.
        setcookie('fio_error', '', -100000);
        setcookie('email_error', '', -100000);
        setcookie('date_error', '', -100000);
        setcookie('sex_error', '', -100000);
        setcookie('count_limbs_error', '', -100000);
        setcookie('biography_error', '', -100000);
        setcookie('superpowers_error', '', -100000);
        setcookie('checkbox_error', '', -100000);
      }
    
      // Сохранение в БД.
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
    
      // Сохраняем куку с признаком успешного сохранения.
      setcookie('save', '1');
    
      // Делаем перенаправление.
      header('Location: form.php'); //скорее всего нужно сменить form на index
    }
?>