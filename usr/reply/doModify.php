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
FROM reply AS R
WHERE R.id = '$id'
";

$rs = mysqli_query($dbConn, $sql);

$reply = mysqli_fetch_assoc($rs);


$sql2 = "
UPDATE reply
SET updateDate = NOW(),
title = '$title',
`body` = '$body'
WHERE id = '$id'
";

mysqli_query($dbConn, $sql2);

?>

<script>
alert("<?=$id?>번 댓글 삭제 완료");
location.replace("../article/detail.php?id=<?=$reply['relId']?>");
</script>