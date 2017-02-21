<?php

// функция вырезания информации
function our_find ($date_pub,$homepage,$end_str)
{
  $a = mb_strpos($homepage,$date_pub);
  $homepage1 = mb_substr($homepage,$a);
  $b = mb_strpos($homepage1,$end_str);
  $c = mb_substr($homepage1,0,$b+1);
  $c = trim(strip_tags($c));
  return $c;
}

// Основной модуль

mb_internal_encoding('utf-8');
$nom_arcticle = rand(1,172223);
$article = 'https://habrahabr.ru/post/'.$nom_arcticle."/";

$homepage = file_get_contents($article);
if ($homepage === false)
 {
  echo '<h2>'.'Доступ к публикации закрыт или другая причина ошибки !!!'.'</h2>';
  $array['status'] = 'error';
  echo(json_encode($array));

}
else {

$title = '<h1 class="post__title">';
$c = our_find($title,$homepage,"</span>");
echo($c.'</br>');
$array['title'] = $c;

$text_1 = '<div class="content html_format">';
$c = our_find($text_1,$homepage,".");
echo($c.'</br>');
$array['text'] = $c;

echo($article.'</br>');
$date_pub = '<span class="post__time_published">';
$c = our_find($date_pub,$homepage,"</span>");
echo($c.'</br>');
$array['date'] = $c;

$text_1 = '<div class="views-count_post"';
$c = our_find($text_1,$homepage,'</div>');
echo($c.'</br>');
$array['rating'] = $c;

$text_1 = '<span class="voting-wjt__counter-score js-score"';
$c = our_find($text_1,$homepage,'</div>');
echo($c.'</br>');
$array['stars'] = $c;

$text_1 = '<span class="favorite-wjt__counter js-favs_count"';
$c = our_find($text_1,$homepage,'</div>');
echo($c.'</br>');
$array['views'] = $c;

$text_1 = '<div class="post__tags">';
$c = our_find($text_1,$homepage,'</div>');
$c = str_replace("\n", NULL, $c);
echo($c.'</br>');
$array['tags'] = $c;

echo(json_encode($array,JSON_UNESCAPED_UNICODE));

}

?>
