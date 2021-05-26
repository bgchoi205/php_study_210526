<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 삭제</title>
</head>
<body>
  <h1>게시물 삭제</h1>
  <hr>
  <a href="list.php">리스트로 돌아가기</a>
  <hr>

  <form action="doDelete.php">
    <div>
      <span>삭제할 게시물 번호</span>
      <input required placeholder="번호입력" type="text" name="id">
    </div>
    <br>
    <div>
    <input type="submit" value="삭제">
    </div>


  </form>
</body>
</html>