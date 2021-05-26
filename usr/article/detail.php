<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "phpTest") or die("Error Error");

if( !isset($_GET['id']) ){
  echo "id를 입력해주세요";
  exit;
}

$id = intval($_GET['id']);

$sql = "
SELECT *
FROM article AS A
WHERE A.id = '$id'
";

$rs = mysqli_query($dbConn, $sql);

$article = mysqli_fetch_assoc($rs);

if($article == null){
  echo "없는 게시물 번호입니다.";
  exit;
}

$sqlReply = "
SELECT *
FROM reply AS R
WHERE R.relId = '$id'
ORDER BY R.id DESC
";

$rsReply = mysqli_query($dbConn, $sqlReply) or die(mysqli_error($dbConn));

$replies = [];

while( $reply = mysqli_fetch_assoc($rsReply) ){
  $replies[] = $reply;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="atc.css">
  <title>게시물 상세, <?=$id?>번 게시물</title>
</head>
<body>
  <h1><?=$id?>번 게시물 상세보기</h1>
  <hr>

  <div>번호 : <?=$article['id']?></div>
  <div>등록일 : <?=$article['regDate']?></div>
  <div>수정일 : <?=$article['updateDate']?></div>
  <div>제목 : <?=$article['title']?></div>
  <div>내용 : <?=$article['body']?></div>
  <hr>

  <a href="list.php">리스트로 돌아가기</a>
  <a onclick="if (confirm('정말 삭제하시겠습니까?') == false) return false; " href="doDelete.php?id=<?=$article['id']?>">삭제</a>
  <a href="modify.php?id=<?=$article['id']?>">수정</a>

  <hr>
  <br>

  <form action="../reply/doWrite.php">

  <div>
    <input type="hidden" name="id" value="<?=$article['id']?>">
  </div>

  <div>
  <span>댓글입력</span>
  <br>
  <textarea name="body"></textarea>
  </div>
  
  <div class="replySubmitBottonBox">
    <input type="submit" value="댓글등록">
  </div>
  
  </form>

  <hr>
  <h2>댓글 목록</h2>

  <?php foreach($replies as $reply) {?>
    
    번호 : <?=$reply['id']?> &emsp; &emsp;
    등록일 : <?=$reply['regDate']?><br>
    내용 : <?=$reply['body']?><br>
    <hr>
  <?php }?>


</body>
</html>