<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        // dd($request);
        // dd($inputs);
        $param = [
        'inputs' => $inputs,
        ];
        // dd($param);
        return view('confirm', $param);
    }
    // public function modify()
    // {
    //     return redirect('contact')->withInput();
    // }
    public function send(Request $request)
    {
        if ($request->get('modify')) {
        return redirect('/')->withInput();
        }

        $inputs = $request->all();
        unset($inputs['_token']);
        // dd($request);
        // dd($inputs);
        Contact::create($inputs);
        return view('thanks');
    }
}
