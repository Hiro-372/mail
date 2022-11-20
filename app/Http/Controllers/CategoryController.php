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
            'category' => $category,
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
    
    public function edit(Category $category, User $user)
    {
        return view('categories/edit') -> with([
            'categories' => $category,
            'users' => $user -> get(),
        ]);
    }
    
    public function update(CategoryRequest $request, Category $category)
    {
        $input_category = $request['category'];
        $category -> fill($input_category) -> save();
        return redirect('/categories/list');
    }    

    public function delete(Category $category)
    {
        $category -> delete();
        return redirect('/categories/list');
    }    
}

?>