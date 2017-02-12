<?php
$user_name = 'Андрей';
$my_age = 45;
$email = 'apbelg@mail.ru';
$about = 'инженер, программист 1С';
$city = 'Белгород';
?>
<!Doctype html>
<html>
<h1> Страница пользователя  <? echo $user_name ?> </h1>
<table>
  <tr><td>Имя</td><td><? echo $user_name ?></td></tr>
  <tr><td>Возраст</td><td><? echo $my_age ?></td></tr>
  <tr><td>Электронная почта     </td><td><a href="mailto:<? echo $email ?>"><? echo $email ?></a> </td></tr>
  <tr><td>Город</td><td><? echo $city ?></td></tr>
  <tr><td>О себе</td><td><? echo $about ?></td></tr>
</table>
</html>
