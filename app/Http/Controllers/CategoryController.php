<?php

namespace App\Http\Controllers;
use App\Models\Maildata;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('categories.index') -> with([
            'maildatas' => $category -> getByCategory(),
        ]);
    }
    
    public function entry(Category $category, User $user)
    {
        return view('categories/entry') -> with([
            'categories' => $category -> get(),
            'users' => $user -> get()
        ]);
    }    

}
?>