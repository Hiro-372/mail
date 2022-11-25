<?php

namespace App\Http\Controllers;

use App\Models\Maildata;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MaildataRequest;

class MaildataController extends Controller
{
    public function index(Maildata $maildata, Request $request)
    {
        $keyword = $request->input('keyword');
        
        $query = Maildata::query();
        
        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }
        
        $maildatas = $query->paginate(5);
        
        return view('maildatas/index', compact('maildatas', 'keyword'))
        ->with(['maildata' => $maildata,
        ]);
    }
    
    public function top(Maildata $maildata, Category $category)
    {
        return view('maildatas/top') -> with([
            'maildatas' => $maildata -> get(),
            'categories' => $category -> get(),
        ]);
    }
    
    public function show(Maildata $maildata)
    {
        return view('maildatas/show') -> with([
            'maildatas' => $maildata,
        ]);
    }
    
    public function create(Category $category, User $user)
    {
        return view('maildatas/create') -> with([
            'categories' => $category -> get(),
            'users' => $user -> get(),
        ]);
    }
    
    public function store(MaildataRequest $request, Maildata $maildata)
    {
        $input = $request['maildata'];
        $maildata -> fill($input) -> save();
        return redirect('/maildatas/' . $maildata -> id);
    }
    
    public function edit(Maildata $maildata, Category $category, User $user)
    {
        return view('maildatas/edit')->with([
            'maildata' => $maildata,
            'categories' => $category -> get(),
            'users' => $user -> get(),
        ]);
    }
    
    public function update(MaildataRequest $request, Maildata $maildata)
    {
        $input_maildata = $request['maildata'];
        $maildata -> fill($input_maildata) -> save();
        return redirect('/maildatas/' . $maildata -> id);
    }
    
    public function delete(Maildata $maildata, Request $request)
    {
        dd($request);
        if (empty($maildata) == true) {
            echo "データがありません。\nメール一覧に戻ります。";
            return redirect('/');
        } elseif (!empty($request["title"]) == true) {
            foreach ($request["title"] as $value) {
                $maildata::where('id',$value) -> delete(); }
        } else {
            $maildata -> delete();
        }
        return redirect('/');
    }
    
}

?>