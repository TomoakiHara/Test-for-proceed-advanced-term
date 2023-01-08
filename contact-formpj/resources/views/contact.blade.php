<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <title>Document</title>
  <style>
  .contact_page{
    width:100vw;
  }
  .contact_title {
    text-align:center;
  }
  .error {
    color:red;
    text-align:center;
  }
  .contact_form {
    margin:0 auto;
  }
  .contact_form_title{
    text-align:left;
    padding-top:5px;
    padding-bottom:45px;
  }
  .must_input{
    color:red;
  }
  .contact_form_fullname_input{
    border:1px solid gray;
    border-radius:5px;
    padding:5px 10px;
  }
  .contact_form_fullname {
    display:flex;
    justify-content: flex-start;
  }
  .contact_form_family_name {
    padding:0 10px;
  }
  .contact_form_last_name {
    padding:0 10px;
  }
  .contact_form_ex {
    color:gray;
    font-size:12px;
  }
  .contact_form_gender {
    padding:10px 10px;
  }
  .contact_form_gender_title{
    text-align:left;
  }
  .contact_form_email {
    padding:0 10px;
  }
  .contact_form_input {
    width:94%;
    border:1px solid gray;
    border-radius:5px;
    padding:5px 10px;
  }
  .contact_form_postcode {
    padding-left:10px;
  }
  .contact_form_postcode_input{
    width:86.5%;
    border:1px solid gray;
    border-radius:5px;
    padding:5px 10px;
  }
  .contact_form_address {
    padding:0 10px;
  }
  .contact_form_building_name {
    padding:0 10px;
  }
  .contact_form_opinion {
    padding:0 10px;
  }
  .contact_form_opinion_input {
    width:94%;
    border:1px solid gray;
    border-radius:5px;
    padding:5px 10px;
  }

  .confirm_botton {
    display: block;
    margin:20px auto;
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
    <div class="contact_page">
    <h1 class="contact_title">お問い合わせ</h1>
    @if (count($errors) > 0)
    <p class="error">入力に問題があります</p>
    @endif
    <form action="/confirm" class="confirm" method="get">
      <table class="contact_form">
        <tr class="contact_form_item">
          <th class="contact_form_title">お名前<span class="must_input">※</span></th>
          <td class="contact_form_fullname">
            <div class="contact_form_family_name">
              <input type="text" name= "family_name" class="contact_form_fullname_input" value="{{ old('family_name') }}">
              <p class="contact_form_ex">例)山田</p>
            </div>
            <div class="contact_form_first_name">
              <input type="text" name= "first_name" class="contact_form_fullname_input" value="{{ old('first_name') }}">
              <p class="contact_form_ex">例)太郎</p>
            </div>
          </td>
        </tr>
        @if ($errors->has('family_name'))
        <tr>
          <th class="error">ERROR</th>
          <td class="error">{{$errors->first('family_name')}}</td>
        </tr>
        @endif
        @if ($errors->has('first_name'))
        <tr>
          <th class="error">ERROR</th>
          <td class="error">{{$errors->first('first_name')}}</td>
        </tr>
        @endif
        </tr>
        <tr class="form_table_item">
          <th class="contact_form_gender_title">性別<span class="must_input">※</span></th>
          <td class="contact_form_gender">
            <input type="radio" name="gender" class="contact_form_gender_checkbox" value="男性" {{old('gender') == '男性' ? 'checked' : '' }} checked>
            男性
            <input type="radio" name="gender" class="contact_form_gender_checkbox" value="女性" {{old('gender') == '女性' ? 'checked' : '' }}>女性
          </td>
        </tr>
        @if ($errors->has('gender'))
        <tr>
          <th class="error">ERROR</th>
          <td class="error">{{$errors->first('gender')}}</td>
        </tr>
        @endif
        <tr class="form_table_item">
          <th class="contact_form_title">メールアドレス<span class="must_input">※</span></th>
          <td class="contact_form_email">
            <input type="text" name="email" class="contact_form_input" value="{{ old('email') }}">
            <p class="contact_form_ex">例)test@example.com</p>
          </td>
        </tr>
        @if ($errors->has('email'))
        <tr>
          <th class="error">ERROR</th>
          <td class="error">{{$errors->first('email')}}</td>
        </tr>
        @endif
        <tr class="form_table_item">
          <th class="contact_form_title">郵便番号<span class="must_input">※</span></th>
          <td class="contact_form_postcode">
            〒&nbsp;<input type="text" name="postcode" onKeyUp="AjaxZip3.zip2addr('postcode','', 'address', 'address');" class="contact_form_postcode_input" value="{{ old('postcode') }}">
            <p class="contact_form_ex">例)123-4567</p>
          </td>
        </tr>
        @if ($errors->has('postcode'))
        <tr>
          <th class="error">ERROR</th>
          <td class="error">{{$errors->first('postcode')}}</td>
        </tr>
        @endif
        <tr class="form_table_item">
          <th class="contact_form_title">住所<span class="must_input">※</span></th>
          <td class="contact_form_address">
            <input type="text" name="address" class="contact_form_input" value="{{ old('address') }}">
            <p class="contact_form_ex">例)東京都渋谷区千駄ヶ谷1-2-3</p>
          </td>
        </tr>
        @if ($errors->has('address'))
        <tr>
          <th class="error">ERROR</th>
          <td class="error">{{$errors->first('address')}}</td>
        </tr>
        @endif
        <tr class="form_table_item">
          <th class="contact_form_title">建物名</th>
          <td class="contact_form_building_name">
            <input type="text" name="building_name" class="contact_form_input" value="{{ old('building_name') }}">
            <p class="contact_form_ex">例)千駄ヶ谷マンション101</p>
          </td>
        </tr>
        <tr class="form_table_item">
          <th class="contact_form_title">ご意見<span class="must_input">※</span></th>
          <td class="contact_form_opinion">
            <textarea class="contact_form_opinion_input" name="opinion" cols="50" rows="5">{{ old('opinion') }}</textarea>
          </td>
        </tr>
        @if ($errors->has('opinion'))
        <tr>
          <th class="error">ERROR</th>
          <td class="error">{{$errors->first('opinion')}}</td>
        </tr>
        @endif
      </table>
      <input class="confirm_botton" type="submit" value="確認">
      @csrf
    </form>
  </div>
</body>

</html>