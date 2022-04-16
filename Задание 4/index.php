<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
    <title>Форма</title>
</head>
<body >
<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>
    <div class="wrapper">
      <div id="Myform">
              <form action="form.php" method="POST">
                <label><a id="Форма"></a>
                  <em><strong>Имя:</strong></em><br />
                  <input name="name" <?php if ($errors['name']) {print 'class="error"';} ?> value="<?php print $values['name']; ?>" />
                </label><br />
                <label>
                  <em><strong>Email:</strong></em><br />
                  <input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['name']; ?>" type="email" />
                </label><br />
                <label>
                  <em><strong>Дата рождения:</strong></em><br />
                  <input name="date" <?php if ($errors['date']) {print 'class="error"';} ?> value="" type="date" />
                </label><br />  
                <div <?php if ($errors['sex']) {print 'class="error"';} ?>>
                    <em><strong>Ваш пол:</strong></em><br />
                    <label><input type="radio" name="sex" value="M">Мужской</label>
                    <label><input type="radio" name="sex" value="W">Женский</label><br />
                </div>
                <div <?php if ($errors['count_limbs']) {print 'class="error"';} ?>>
                    <em><strong>Колличество ваших конечностей:</strong></em><br />
                    <label><input type="radio" name="count_limbs" value="<2" > Менее 2</label><br />
                    <label><input type="radio" name="count_limbs" value=">2" > Более 2</label><br />
                </div>  
                  <label>
                      <em><strong>Биография:</strong></em><br />
                      <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"';} ?>></textarea>
                  </label><br />

                <label>
                  <em><strong>Сверхспособности:</strong></em>
                  <br />
                  <select name="superpowers" <?php if ($errors['superpowers']) {print 'class="error"';} ?> multiple="multiple">
                    <option value="god">Бессмертие</option>
                    <option value="gtwalls">Прохождение сквозь стены</option>
                    <option value="fly">Левитация</option>
                  </select>
                </label><br />
                
              <br /><label><input type="checkbox" <?php if ($errors['checkbox']) {print 'class="error"';} ?> name="check" value="1" >С контрактом ознакомлен</label>
              <br /><input type="submit" value="Отправить" >
              </form>
      </div>
    </div>
</body>
</html>