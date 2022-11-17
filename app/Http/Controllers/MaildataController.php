<?php

namespace App\Http\Controllers;

use App\Models\Maildata;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MaildataRequest;

class MaildataController extends Controller
{
    public function index(Maildata $maildata)
    {
        return view('maildatas/index') -> with([
            'maildatas' => $maildata -> getPaginateByLimit(),
        ]);
    }
    
    public function show(Maildata $maildata)
    {
        return view('maildatas/show') -> with([
            'maildatas' => $maildata,
        ]);
    }
    
    public function entry(Category $category, User $user)
    {
        return view('maildatas/entry') -> with([
            'categories' => $category -> get(),
            'users' => $user -> get()
        ]);
    }
    
    public function store(MaildataRequest $request, Maildata $maildata)
    {
        $input = $request['maildata'];
        $maildata -> fill($input) -> save();
        return redirect('/maildatas/' . $maildata -> id);
    }
}

?>