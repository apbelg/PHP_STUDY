<?php
// инициализируем массив континетов
$continents = array ("Africa", "America", "Arctica", "Asia", "Europa");
//инициализируем массивы животных
$animals_africa  = array ("Canis aureus","Pan","Diceros bicornis");
$animals_america = array ("Panthera onca","Marmota monax","Lama","Bison");
$animals_arctica = array ("Lobodon carcinophagus","Ursus maritimus","Odobenus rosmarus");
$animals_asia    = array ("Camelus bactrianus","Bos mutus","Phodopus sungarus");
$animals_europa  = array ("Sus scorfa","Oryctolagus cuniculus","Lutra","Microtus arvalis");
// массив животных с ключами континетами
$our_array = array ( $continents[0] => $animals_africa,
                     $continents[1] => $animals_america,
                     $continents[2] => $animals_arctica,
                     $continents[3] => $animals_asia,
                     $continents[4] => $animals_europa);
//выводим полученный массив
echo "<h3>".'Исходный массив :'."</h3></br>";
foreach ( $our_array as $key => $continent ) {
    foreach ( $continent as $animalsContinent ) {
        echo $key.' : '.$animalsContinent."</br>";
    }
}
//Делаем новый массив только из названий состоящих из двух слов
foreach ( $our_array as $continent ) {
    foreach ( $continent as $animalsContinent ) {
        if( strpos($animalsContinent , ' ') ) $complexAnimals[] = $animalsContinent;
    }
}
echo "<h3>".'Массив животных только из двух слов :'."</h3></br>";
foreach ( $complexAnimals as $currentComplexAnimal ){
    echo $currentComplexAnimal."</br>";
}
// перемешиваем слова животных
$i = 0;
foreach ( $complexAnimals as $currentComplexAnimal ){
    $pieces = explode(' ',$currentComplexAnimal);
    $complexAnimals1Word[$i] = $pieces[0];
    $complexAnimals2Word[$i] = $pieces[1];
    $i++;
}
shuffle($complexAnimals1Word);
shuffle($complexAnimals2Word);
for ($i=0; $i < count($complexAnimals1Word); $i++) {
     $gibrids[$i] = $complexAnimals1Word[$i].' '.$complexAnimals2Word[$i];
}
 echo "<h3>".'Массив животных из перемешанных слов :'."</h3></br>";
 foreach ($gibrids as $currentGibrid){
     echo ($currentGibrid."</br>");
 }
// Восстановим континенты по первым слова названия и выведем результат
//echo("</br>");
foreach ($continents as $currentContinent){
    echo '<h1>'.$currentContinent.'</h1>';
    $strAnimals = '';
    for ( $i=0; $i<sizeof($gibrids); $i++ ){
        $strForFind = substr($gibrids[$i],0,strpos($gibrids[$i],' '));
        foreach ( $our_array as $key => $continent ){
            foreach ( $continent as $animalsContinent){
                if ( strpos($animalsContinent,$strForFind) === 0 ){
                    if ( $currentContinent == $key ){
                       $strAnimals = $strAnimals.$gibrids[$i].", ";
                    }
                }
            }
        }
    }
    $strAnimals = substr($strAnimals,0,-2);
    echo $strAnimals.'</br>';
}
?>
