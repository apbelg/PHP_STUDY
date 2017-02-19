<?php
// инициализируем массив континетов
$continents = array ("Africa", "America", "Arctica", "Asia", "Europa");
//инициализируем массивы животных
$animals_africa = array ("Canis aureus","Pan","Diceros bicornis");
$animals_america = array ("Panthera onca","Marmota monax","Lama","Bison");
$animals_arctica = array ("Lobodon carcinophagus","Ursus maritimus","Odobenus rosmarus");
$animals_asia = array ("Camelus bactrianus","Bos mutus","Phodopus sungarus");
$animals_europa = array ("Sus scorfa","Oryctolagus cuniculus","Lutra","Microtus arvalis");
// массив животных с ключами континетами
$our_array = array($continents[0]=>$animals_africa,
                   $continents[1]=>$animals_america,
                   $continents[2]=>$animals_arctica,
                   $continents[3]=>$animals_asia,
                   $continents[4]=>$animals_europa);
//var_dump($our_array);
//выводим полученный массив
echo ("<h3>".'Исходный массив :'."</h3></br>");
foreach ($our_array as $key => $value1) {
  foreach ($value1 as $value2) {
    echo ($key.' : '.$value2."</br>");
  }
}
//Делаем новый массив только из названий состоящих из двух слов
foreach ($our_array as $value1) {
  foreach ($value1 as $value2) {
    if(strpos($value2 , ' ')) $ComplexAnimals[] = $value2;
  }
}
echo ("<h3>".'Массив животных только из двух слов :'."</h3></br>");
foreach ($ComplexAnimals as $value1){
  echo ($value1."</br>");
}
// перемешиваем слова животных

  $a = rand(1,sizeof($ComplexAnimals)-1);
  for($i=0;$i<sizeof($ComplexAnimals);$i++)
  {
    $newAnimal1part=substr($ComplexAnimals[$i],0,strpos($ComplexAnimals[$i],' '));
    $newAnimal2part=substr($ComplexAnimals[($i+$a)%sizeof($ComplexAnimals)],strpos($ComplexAnimals[($i+$a)%sizeof($ComplexAnimals)],' '));
    $newAnimal=$newAnimal1part.$newAnimal2part;
    $Gibrids[]=$newAnimal;
  }
 echo ("<h3>".'Массив животных из перемешанных слов :'."</h3></br>");
 foreach ($Gibrids as $value1){
   echo ($value1."</br>");
 }
// Восстановим континенты по первым слова названия и выведем результат
//echo("</br>");
foreach ($continents as $value3)
{
echo('<h1>'.$value3.'</h1>');
$str_animals='';
for ($i=0;$i<sizeof($Gibrids);$i++)
{
$Str_for_find = substr($Gibrids[$i],0,strpos($Gibrids[$i],' '));
foreach ($our_array as $key => $value) {
   foreach ($value as $value2)
      {
       if( strpos($value2,$Str_for_find) === 0 )
        {
          if($value3 == $key)
          {
           $str_animals = $str_animals.$value2.", ";
         }
        }
       }
     }
  }
  $str_animals = substr($str_animals,0,strlen($str_animals)-2);
  echo($str_animals.'</br>');
}
 ?>
