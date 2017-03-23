
<?php
  $biblio = new PDO('mysql:host=localhost; dbname=global; charset=utf8','root');
  //'protasov', 'neto0895');
  $biblio->query('SET NAMES utf8');
  $sql = "SELECT * FROM books WHERE isbn = :isbn";
  //LIKE '%:isbn%';";
  //AND name LIKE "%?%" AND author LIKE "%?%"';
  $sql1 = '';
  $isbn = '';
  $nameBook = '';
  $authorBook = '';
  if (isset($_POST['isbn']) && !$_POST['isbn']=='') {
    //  $sql1= ' isbn LIKE "%?%"';
      $isbn = $_POST['isbn'];
  }
  if (isset($_POST['nameBook']) && !$_POST['nameBook']=='') {
      $nameBook = $_POST['nameBook'];
  }
  if (isset($_POST['authorBook']) && !$_POST['authorBook']=='') {
      $authorBook = $_POST['authorBook'];
  }
//  if ($sql1 !== '') {
//      $sql = $sql.' WHERE';
//      $sql = $sql.$sql1;
//      $sql = $sql.';';
      $stm = $biblio->prepare($sql);
      $param = array ($isbn);
      //,$nameBook,$authorBook);
      //echo $stm;
      var_dump($stm);
      $stm->execute( array ('isbn' => $isbn));
      $result = $stm->fetchAll();
//  }
//  else{
//      $sql = $sql.';';
//      $sql = $sql.$sql1;
//      $stm = $biblio->prepare($sql);
//      $stm->execute();
//      $result = $stm->fetchAll();
//  }
  echo $sql;
  // $sql = $sql.$sql1;
  // $stm = $biblio->prepare($sql);
  //
  // $stm->execute();
  // $result = $stm->fetchAll();
?>
<!Doctype html>
<html>
<head>
  <link href="table.css" rel="stylesheet">
  <meta charset="utf-8">
  <title>Библиотека</title>
</head>
<h1> Библиотека успешного человека </h1>
<form method = 'POST'>
   <input type = 'text' name = 'isbn' value = "<?= $isbn ?>" placeholder = "ISBN">
   <input type = 'text' name = 'nameBook' value = "<?= $nameBook ?>" placeholder = "Название книги">
   <input type = 'text' name = 'authorBook' value = "<?= $authorBook ?>" placeholder = "Автор книги">
   <button type = 'submit'>Выбрать</button>
</form>
<br>
<table>
<tr>
  <th>Название</th>
  <th>Автор</th>
  <th>Год выпуска</th>
  <th>Жанр</th>
  <th>ISBN</th>
</tr>
<?php
   foreach ($result as $items) {
?>
<tr>
  <td><?= $items['name']?></td>
  <td><?= $items['author']?></td>
  <td><?= $items['year']?></td>
  <td><?= $items['genre']?></td>
  <td><?= $items['isbn']?></td>
</tr>
<?php } ?>
</table>
</html>
