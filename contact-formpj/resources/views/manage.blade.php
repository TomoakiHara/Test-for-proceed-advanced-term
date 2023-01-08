<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  .manage_title {
    text-align:center;
  }
  .manage_search {
    border:1px solid black;
    padding:20px 0;
    margin:20px 30px;
  }
  .search {
    padding:0 30px;
  }
  .search_table_item {
    padding:20px 0;
  }
  .search_table_title {
    text-align:left;
    padding-right:20px;
    padding-top:10px;
    padding-bottom:10px;
  }
  .search_table_inputform {
    padding:10px 20px;
  }
  .search_table_inputform {
    border:1px solid gray;
    border-radius:5px;
    padding:5px 10px;
  }
  .search_table_title_gender {
    padding:0 20px;
  }
  .search_botton {
    display: block;
    margin:0px auto;
    background-color: black;
    color:white;
    border:2px solid black;
    border-radius:5px;
    font-size: 10px;
    padding: 5px 30px;
  }
  .recet_link {
    display: block;
    margin:0 auto;
    background-color:white;
    border:1px solid white;
    color:black;
    text-decoration:underline;
    font-size:10px
  }

  .search_result_table {
    margin:0 auto;
    border-collapse: collapse;
  }
  .search_result_title{
    padding: 10px 10px;
    
  }
  .search_result_items{
    padding: 10px 10px;
    border-top: 1px solid black;
  }
  .delete_botton {
    display: block;
    margin:10px auto;
    background-color: black;
    color:white;
    border:2px solid black;
    border-radius:5px;
    font-size: 10px;
    padding: 2px 15px;
  }

  </style>
</head>

<body>
  <div class="manage_page">
    <h1 class="manage_title">管理システム</h1>
    <div class="manage_search">
      <form action="/search" class="search" method="get">
      @csrf
        <table class="manage_search_form">
          <tr class="search_table_item">
            <th class="search_table_title">お名前</th>
            <td class="search_table_input">
              <input type="text" name= "fullname" class="search_table_inputform">
            </td>
            <th class="search_table_title_gender">性別</th>
            <td class="search_gender">
              <input type="radio" name="gender" class="search_gender_checkbox" value="性" checked>全て
              <input type="radio" name="gender" class="search_gender_checkbox" value="男性">男性
              <input type="radio" name="gender" class="search_gender_checkbox" value="女性">女性
            </td>
          </tr>
          <tr class="search_table_item">
            <th class="search_table_title">登録日</th>
            <td class="search_table_input">
              <!-- <input type="date" name= "created_at" class="search_table_inputform"> -->
              <input type="date" name= "from" class="search_table_inputform">
                <span class="date_span">~</span>
              <input type="date" name="until" class="search_table_inputform">
            </td>
          </tr>
          <tr class="search_table_item">
            <th class="search_table_title">メールアドレス</th>
            <td class="search_table_input">
              <input type="text" name= "email" class="search_table_inputform">
            </td>
          </tr>
        </table>
        <input class="search_botton" type="submit" value="検索">
      </form>
      <form action="/recet" class="recet" method="get">
      @csrf
        <input class="recet_link" type="submit" value="リセット">
      </form>
    </div>

    <div class="paginate">
    @if(count($searchs)>0)
    {{ $searchs->appends(request()->query())->links()}} 
    @endif
    </div>
    <table class="search_result_table">
      <tr class="search_result_item">
        <th class="search_result_title"> ID</th>
        <th class="search_result_title">お名前</th>
        <th class="search_result_title">性別</th>
        <th class="search_result_title">メールアドレス</th>
        <th class="search_result_title">ご意見</th>
        <th class="search_result_title"></th>
      </tr>
      @foreach($searchs as $search)
      <tr class="search_result_item">
        <td class="search_result_items">{{$search -> id}}</td>
        <td class="search_result_items">{{$search -> fullname}}</td>
        <td class="search_result_items">{{$search -> gender}}</td>
        <td class="search_result_items">{{$search -> email}}</td>
        <td class="search_result_items">{{ Str::limit($search -> opinion, 25) }}</td>
        <td class="search_result_items">
          <form class="delete" action="/delete/?id={{$search->id}}"  method="post">
          @csrf
            <input class="delete_botton" type="submit" value="削除">
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</body>

</html>