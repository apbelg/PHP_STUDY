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
// формируем номер статьи
$nom_arcticle = rand(1,172223);
$article = 'https://habrahabr.ru/post/'.$nom_arcticle."/";
// Получаем HTML страницы с проверкой на доступность
$homepage = file_get_contents($article);
echo($article.'</br>');
if ($homepage === false)
 {
  echo '<h2>'.'Доступ к публикации закрыт или другая причина ошибки !!!'.'</h2>';
  $array['status'] = 'error';
  echo(json_encode($array));
 }
else
 {
  // Вырезаем зашоловок
  $title = '<h1 class="post__title">';
  $c = our_find($title,$homepage,"</span>");
  echo($c.'</br>');
  $array['title'] = $c;
  // Вырезаем первое предложение
  $text_1 = '<div class="content html_format">';
  $c = our_find($text_1,$homepage,"</div>");
  $a = mb_strpos($c,".");
  $c = mb_substr($c,0,$a+1);
  echo($c.'</br>');
  $array['text'] = $c;
  // Вырезаем дату публикации
  $date_pub = '<span class="post__time_published">';
  $c = our_find($date_pub,$homepage,"</span>");
  echo($c.'</br>');
  $array['date'] = $c;
  // Вырезаем рейтинг статьи
  $text_1 = '<div class="views-count_post"';
  $c = our_find($text_1,$homepage,'</div>');
  echo($c.'</br>');
  $array['rating'] = $c;
  // Вырезаем количество звезд
  $text_1 = '<span class="voting-wjt__counter-score js-score"';
  $c = our_find($text_1,$homepage,'</div>');
  echo($c.'</br>');
  $array['stars'] = $c;
  // Вырезаем количество просмотров
  $text_1 = '<span class="favorite-wjt__counter js-favs_count"';
  $c = our_find($text_1,$homepage,'</div>');
  echo($c.'</br>');
  $array['views'] = $c;
  // Вырезаем тэги
  $text_1 = '<div class="post__tags">';
  $c = our_find($text_1,$homepage,'</div>');
  $c = str_replace("\n", NULL, $c);
  echo($c.'</br></br>');
  $array['tags'] = explode(",",$c);
  // Делаем строку JSON
  echo(json_encode($array,JSON_UNESCAPED_UNICODE));
}
?>
