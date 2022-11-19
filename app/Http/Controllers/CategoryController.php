<?php

namespace App\Http\Controllers;
use App\Models\Maildata;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('categories.index') -> with([
            'maildatas' => $category -> getByCategory(),
        ]);
    }
    
    public function entry(Category $category, User $user, Maildata $maildata)
    {
        return view('categories/entry') -> with([
            'categories' => $category -> get(),
            'users' => $user -> get(),
        ]);
    }
    
    public function create(Category $category, User $user)
    {
        return view('categories/create') -> with([
            'categories' => $category -> get(),
            'users' => $user -> get(),
        ]);
    }
    
    public function store(CategoryRequest $request, Category $category)
    {
        $input = $request['category'];
        $category -> fill($input) -> save();
        return redirect('/categories/list');
    }
    
    public function lists(Category $category)
    {
        return view('categories/list') -> with([
            'categories' => $category -> get(),
        ]);
    }

}
?>