<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link href="style3.css" rel="stylesheet">
    <title>Форма</title>
</head>
<body >
    <div class="wrapper">
      <div id="Myform">
              <form action="" method="POST">
                <label><a id="Форма"></a>
                  <em><strong>Имя:</strong></em><br />
                  <input name="name" value="Имя" />
                </label><br />
                <label>
                  <em><strong>Email:</strong></em><br />
                  <input name="email" value="test@example.com" type="email" />
                </label><br />
                <label>
                  <em><strong>Дата рождения:</strong></em><br />
                  <input name="date" value="2019-08-13" type="date" />
                </label><br />  

                <em><strong>Ваш пол:</strong></em><br />
                <label><input type="radio" name="sex" value="1">Мужской</label>
                <label><input type="radio" name="sex" value="1">Женский</label><br />
                  
                <em><strong>Колличество ваших конечностей:</strong></em><br />
                <label><input type="radio" name="count_limbs" value="1" > Менее 2</label><br />
                <label><input type="radio" name="count_limbs" value="1" > Более 2</label><br />

                  <label>
                      <em><strong>Биография:</strong></em><br />
                      <textarea name="biography">Введите текст</textarea>
                  </label><br />

                <label>
                  <em><strong>Сверхспособности:</strong></em>
                  <br />
                  <select name="superpowers[]" multiple="multiple">
                    <option value="god">Бессмертие</option>
                    <option value="gtwalls">Прохождение сквозь стены</option>
                    <option value="fly">Левитация</option>
                  </select>
                </label><br />
                
              <br /><label><input type="checkbox" name="check" value="1" >С контрактом ознакомлен</label>
              <br /><input type="submit" value="Отправить" >
              </form>
      </div>
    </div>
</body>
</html>
