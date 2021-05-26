<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "phpTest") or die("Error Error");

if( !isset($_GET['id']) ){
  echo "id를 입력해주세요";
  exit;
}

$id = intval($_GET['id']);


if( !isset($_GET['body']) ){
  echo "내용을 입력해주세요";
  exit;
}

$body = $_GET['body'];

$sql = "
INSERT INTO reply
SET regDate = NOW(),
updateDate = NOW(),
relId = '$id',
`body` = '$body'
";

mysqli_query($dbConn, $sql);

?>

<script>
alert("댓글 작성 완료");
location.replace("../article/detail.php?id=<?=$id?>");
</script>