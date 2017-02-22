<?php
// Числа Фибоначчи 
 $x = rand (0,100);
 echo 'Число = '.$x."<br>";
 $per_1 = 1;
 $per_2 = 1;
 $per_3 = 0;
  while (true)
   {
    if ($per_1 > $x)
     {
      echo ('Задуманное число не входит в числовой ряд !');
      break;
     }
    if ($per_1 == $x)
     {
      echo ('Задуманное число входит в числовой ряд !');
      break;
     }
    else
     {
      $per_3 = $per_1;
      $per_1 = $per_1 + $per_2;
      $per_2 = $per_3;
     }
   }
?>
