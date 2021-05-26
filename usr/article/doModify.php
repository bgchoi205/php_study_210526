<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "phpTest") or die("Error Error");

if( !isset($_GET['id']) ){
  echo "id를 입력해주세요";
  exit;
}

$id = intval($_GET['id']);

if( !isset($_GET['title']) ){
  echo "제목을 입력해주세요";
  exit;
}

if( !isset($_GET['body']) ){
  echo "내용을 입력해주세요";
  exit;
}

$title = $_GET['title'];
$body = $_GET['body'];

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

$sql2 = "
UPDATE article
SET updateDate = NOW(),
title = '$title',
`body` = '$body'
WHERE id = '$id'
";

mysqli_query($dbConn, $sql2);

?>

<script>
alert("<?=$id?>번 게시물 수정 완료");
location.replace("detail.php?id=<?=$id?>");
</script>