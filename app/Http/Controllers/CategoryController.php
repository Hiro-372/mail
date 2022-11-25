<?php

namespace App\Http\Controllers;

use App\Models\Maildata;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Maildata $maildata, Request $request, Category $category)
    {
        $keyword = $request->input('keyword');
        
        $query = Maildata::query();
        
        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }
        
        $maildatas = $query->paginate(5);
        
        return view('categories/index', compact('maildatas', 'keyword'))
        ->with([
            'maildata' => $maildata,
            'maildatas' => $category -> getByCategory(),
            'category' => $category,
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