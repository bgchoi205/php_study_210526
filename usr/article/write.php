<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 작성</title>
</head>
<body>
  <h1>게시물 작성</h1>
  <hr>
  <a href="list.php">리스트로 돌아가기</a>
  <hr>

  <form action="doWrite.php">
    <div>
      <span>제목</span>
      <br>
      <input required placeholder="제목입력" type="text" name="title">
    </div>
    <br>

    <div>
      <span>내용</span>
      <br>
      <textarea required placeholder="내용입력" name="body"></textarea>
    </div>
    <br>

    <div>
    <input type="submit" value="작성">
    </div>


  </form>
</body>
</html>