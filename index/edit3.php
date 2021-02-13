<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>留言板</title>

  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link active" href="#">編號</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">姓名</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">email</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">留言</a>
    </li>
  </ul>

</head>

<?php
require_once 'DB.php';
// 以switch...case 處理 'insert','update','delete'
if(!empty($_POST['message'])){
if (isset($_REQUEST['command'])) {
  

 
  switch ($_REQUEST['command']) {
    case 'insert':
      // if (empty($_REQUEST['name']) || 
      //  !preg_match('/^[0-9]+$/', $_REQUEST['email'])) break;
      $sql = $pdo->prepare('insert into text values(null,?,?,?)');
      $sql->execute(
        [htmlspecialchars($_REQUEST['name']), $_REQUEST['email'], $_REQUEST['message']]
      );
      header('location: ../addmessage.php?info=success');
      break;
    case 'update':
      // if (empty($_REQUEST['name']) || 
      //  !preg_match('/^[0-9]+$/', $_REQUEST['email'])) break;
      $sql = $pdo->prepare(
        'update text set name=?, email=? where mb_id=?'
      );
      $sql->execute(
        [
          htmlspecialchars($_REQUEST['name']), $_REQUEST['email'],
          $_REQUEST['mb_id']
        ]
      );
      break;
    case 'delete':
      $sql = $pdo->prepare('delete from text where mb_id=?');
      $sql->execute([$_REQUEST['mb_id']]);
      break;
  }
}
}
//刷新頁面
foreach ($pdo->query('select * from text') as $row) {
  echo '<tr>';
  echo '<form action="edit3.php" method="post">';
  echo '<input type="hidden" name="command" value="update">';
  echo '<input type="hidden" name="mb_id" value="', $row['mb_id'], '">';
  echo '<td>', $row['mb_id'], '</td>';
  echo '<td>';
  echo '<input type="text" name="name" value="', $row['name'], '">';
  echo '</td>';
  echo '<td>';
  echo '<input type="text" name="email" value="', $row['email'], '">';
  echo '</td>';
  echo '<td>';
  echo '<input type="text" name="message" value="', $row['message'], '">';
  echo '</td>';

  echo '<td><input type="submit" value="確定修改"></td>';
  echo '</form>';
  echo '<form action="edit3.php" method="post">';
  echo '<input type="hidden" name="command" value="delete">';
  echo '<input type="hidden" name="mb_id" value="', $row['mb_id'], '">';
  echo '<td><input type="submit" value="確定刪除"></td>';
  echo '</form>';
  echo '</tr>';
  echo "\n";
}
?>



<body>
  <style>
    .head {
      margin-left: auto;
      margin-right: auto;
      max-width: 500px;
      background: #fada9e;
      padding: 30px 30px 20px 30px;
      font: 16px Arial, Helvetica, sans-serif;
      color: #666;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      text-align: justify;
      text-justify: inter-ideograph;

    }

    .body {
      margin-left: auto;
      margin-right: auto;
      max-width: 500px;
      background: #F8F8F8;
      padding: 30px 30px 20px 30px;
      font: 12px Arial, Helvetica, sans-serif;
      color: rgb(102, 102, 102);
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
    }
  </style>

  <body>
    <div class="body">
      <form action="edit3.php" method="post">
        <input type="hidden" name="command" value="insert">
        <td></td>
        <td><input type="text" name="name"></td>
        <td><input type="text" name="email"></td>
        <td><input type="text" name="message"></td>
        <td><input type="submit" value="確定新增"></td>
      </form>
    </div>
    </tr>
    </table>
  </body>