<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function manage()
    {
        $param = [
        'searchs' => [],
        ];
        return view('manage', $param);
    }
    public function search(Request $request)
    {
        $keyword = $request -> input('keyword','');
        // dd($request);

        // $searchs = Contact::where('fullname', 'LIKE BINARY',"%{$request->fullname}%")->where('gender', 'LIKE BINARY',"%{$request->gender}%")->where('email', 'LIKE BINARY',"%{$request->email}%")->wherebetween('created_at',[$request->from, $request->until])->get();  

        // $searchs = Contact::where('fullname', 'LIKE BINARY',"%{$request->fullname}%")->where('gender', 'LIKE BINARY',"%{$request->gender}%")->where('email', 'LIKE BINARY',"%{$request->email}%")->wherebetween('created_at', [$request->from, $request->until])->paginate(10);

        if($request->from && $request->until){
            $searchs = Contact::where('fullname', 'LIKE BINARY',"%{$request->fullname}%")->where('gender', 'LIKE BINARY',"%{$request->gender}%")->where('email', 'LIKE BINARY',"%{$request->email}%")->wherebetween('created_at', [$request->from, $request->until])->paginate(10);
        }else{
            $searchs = Contact::where('fullname', 'LIKE BINARY',"%{$request->fullname}%")->where('gender', 'LIKE BINARY',"%{$request->gender}%")->where('email', 'LIKE BINARY',"%{$request->email}%")->paginate(10);}

        // dd($searchs);

        $param = [
        'searchs' => $searchs,
        'keyword' => $keyword,
        ];
        // dd($param);
        
        return view('manage', $param);
    }

    public function recet()
    {
        return redirect('/manage');
    }

    public function delete(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        // dd($request->all());
        // dd($input);
        Contact::where('id', $request->id)->delete($input);
        return redirect('/manage');
    }

}
