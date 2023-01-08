<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .thanks_page{
      width: 100vw;
      height: 100vh;
      display: flex;
      align-items:center;
    }
    .thanks_items {
      margin:0px auto;
    }
    .thanks_comment{
      text-align:center;
    }
    .toppage_botton {
      display: block;
      margin:0px auto;
      background-color: black;
      color:white;
      border:2px solid black;
      border-radius:5px;
      font-size: 10px;
      padding: 5px 30px;
    }
  </style>
</head>

<body>
  <div class="thanks_page">
    <div class="thanks_items">
      <p class="thanks_comment">ご意見いただきありがとうございました</p>
      <form action="/" class="toppage" method="get">
        <input class="toppage_botton" type="submit" value="トップページへ">
        @csrf
      </form>
    </div>
  </div>
</body>

</html>