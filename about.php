<?php
$user_name = 'Андрей';
$my_age = 45;
$email  = 'apbelg@mail.ru';
$about  = 'инженер-системотехник';
$city   = 'Белгород';
?>
<h1> Страница пользователя  <?php echo($user_name); ?> </h1>
<table>
  <tr><td>Имя</td><td><?php echo ($user_name); ?></td></tr>
  <tr><td>Возраст</td><td><?php echo ($my_age); ?></td></tr>
  <tr><td>Электронная почта     </td><td><a href="mailto:<?php echo ($email); ?>"><?php echo ($email); ?></a> </td></tr>
  <tr><td>Город</td><td><?php echo ($city); ?></td></tr>
  <tr><td>О себе</td><td><?php echo ($about); ?></td></tr>
</table>
