<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "phpTest") or die("Error Error");

if( !isset($_GET['id']) ){
  echo "id를 입력해주세요";
  exit;
}

$id = intval($_GET['id']);

$sql = "
SELECT *
FROM reply AS R
WHERE R.id = '$id'
";

$rs = mysqli_query($dbConn, $sql);

$reply = mysqli_fetch_assoc($rs);


$sql2 = "
DELETE FROM reply
WHERE id = '$id'
";

mysqli_query($dbConn, $sql2);

?>

<script>
alert("<?=$id?>번 댓글 삭제 완료");
location.replace("../article/detail.php?id=<?=$reply['relId']?>");
</script>