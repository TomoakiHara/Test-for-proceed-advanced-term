<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .confirm_page{
      width:100vw;
      padding:0 30px;
    }
    .confirm_title {
      text-align:center;
    }

    .confirm_form {
      margin:20px auto;
    }
    .confirm_table_title {
      width:150px;
      text-align:left;
    }
    .confirm_table_contents {
      padding:20px 40px;
      
    }

    .send_botton {
      display: block;
      margin:0px auto;
      background-color: black;
      color:white;
      border:2px solid black;
      border-radius:5px;
      font-size: 10px;
      padding: 5px 30px;
    }

    .modify_link {
      display: block;
      margin:0 auto;
      background-color:white;
      border:1px solid white;
      color:black;
      text-decoration:underline;
      font-size:10px
    }
  </style>
</head>

<body>
  <div class="confirm_page">
    <h1 class="confirm_title">内容確認</h1>
    <form action="/send" class="send" method="get">
    @csrf
      <table class="confirm_form">
        <tr class="confirm_table_item">
          <th class="confirm_table_title">お名前</th>
          <td class="confirm_table_contents">
            {{$inputs ['family_name']}} {{$inputs ['first_name']}}
            <input name="family_name" value="{{$inputs ['family_name']}}" type="hidden">
            <input name="first_name" value="{{$inputs ['first_name']}}" type="hidden">
            <input name="fullname" value="{{$inputs ['family_name'].=$inputs ['first_name']}}" type="hidden">
            
          </td>
        </tr>
        <tr class="confirm_table_item">
          <th class="confirm_table_title">性別</th>
          <td class="confirm_table_contents">
            {{$inputs ['gender']}}
            <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm_table_item">
          <th class="confirm_table_title">メールアドレス</th>
          <td class="confirm_table_contents">
            {{$inputs ['email']}}
            <input name="email" value="{{ $inputs['email'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm_table_item">
          <th class="confirm_table_title">郵便番号</th>
          <td class="confirm_table_contents">
            {{$inputs ['postcode']}}
            <input name="postcode" value="{{ $inputs['postcode'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm_table_item">
          <th class="confirm_table_title">住所</th>
          <td class="confirm_table_contents">
            {{$inputs ['address']}}
            <input name="address" value="{{ $inputs['address'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm_table_item">
          <th class="confirm_table_title">建物名</th>
          <td class="confirm_table_contents">
            {{$inputs ['building_name']}}
            <input name="building_name" value="{{ $inputs['building_name'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm_table_item">
          <th class="confirm_table_title">ご意見</th>
          <td class="confirm_table_contents">
            {{$inputs ['opinion']}}
            <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden">
          </td>
        </tr>
      </table>
      <div class="confirm_link">
        <input class="send_botton" type="submit" value="送信">
        <input class="modify_link" name="modify" type="submit" value="修正する">
      </div>
    </form>
    
</body>

</html>