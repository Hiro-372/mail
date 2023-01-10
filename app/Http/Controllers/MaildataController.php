<?php

namespace App\Http\Controllers;

use App\Models\Maildata;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MaildataRequest;
use Illuminate\Support\Facades\Storage;

class MaildataController extends Controller
{
    public function index(Maildata $maildata, Request $request, Category $category)
    {
        $keyword = $request->input('keyword');
        
        $maildatas = empty($keyword) == true ? $maildata->getByMaildata() : $maildata->getSearchByMaildata($keyword);
        
        return view('maildatas/index')->with([
            'maildatas' => $maildatas,
            'keyword' => $keyword,
            'category' => $category,
        ]);
    }
    
    public function top(Maildata $maildata, Category $category)
    {
        return view('maildatas/top')->with([
            'maildatas' => $maildata->get(),
            'categories' => $category->get(),
        ]);
    }
    
    public function show(Maildata $maildata)
    {
        return view('maildatas/show')->with([
            'maildatas' => $maildata,
        ]);
    }
    
    public function create(Category $category, User $user)
    {
        return view('maildatas/create')->with([
            'categories' => $category->get(),
            'users' => $user->get(),
        ]);
    }
    
    public function store(MaildataRequest $request, Maildata $maildata)
    {
        $input = $request['maildata'];
        $maildata->fill($input)->save();
        return redirect('/');
    }
    
    public function edit(Maildata $maildata, Category $category, User $user)
    {
        return view('maildatas/edit')->with([
            'maildata' => $maildata,
            'categories' => $category->get(),
            'users' => $user->get(),
        ]);
    }
    
    public function update(MaildataRequest $request, Maildata $maildata)
    {
        $input_maildata = $request['maildata'];
        $maildata->fill($input_maildata)->save();
        return redirect('/maildatas/' . $maildata->id);
    }
    
    public function delete(Maildata $maildata, Request $request)
    {
        if (!empty($request["title"])) {
            //複数の削除対象がある場合全て削除
            $maildata->whereIn('id',$request['title'])->delete();
        }
        return redirect('/');
    }
    
}

?>