<!Doctype html>
<html>
<head>
  <link href="b2z1.css" rel="stylesheet">
  <meta charset="utf-8">
  <title>JSON => таблица</title>
</head>
<table>
<tr>
  <th>Имя</th>
  <th>Фамилия</th>
  <th>Адрес</th>
  <th>Номер телефона</th>
</tr>
<?php
  $file_name = __DIR__."/AdressBook.json";
  $str_json = file_get_contents($file_name);
  $arr_json = json_decode($str_json,true);
   foreach ($arr_json as $items) {
?>
<tr>
  <td><?= $items['firstName'] ?> </td>
  <td><?= $items['lastName'] ?> </td>
  <td><?= $items['Adress'] ?> </td>
  <td><?= $items['PhoneNumber'] ?> </td>
</tr>
<?php }
?>
</table>
</html>
