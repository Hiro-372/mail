<?php

namespace App\Http\Controllers;

use App\Models\Maildata;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $keyword = $request->input('keyword');
        
        //検索欄にキーワードが入っているか判断し処理を切替
        $maildatas = empty($keyword) == true ? $category->getByCategory() : $category->getSearchByCategory($keyword);
        
        return view('categories/index')
        ->with([
            'keyword' => $keyword,
            'maildatas' => $maildatas,
            'maildata' => $maildatas,
            'category' => $category,
        ]);
    }
    
    public function create(Category $category, User $user)
    {
        return view('categories/create')
        ->with([
            'categories' => $category->get(),
            'users' => $user->get(),
        ]);
    }
    
    public function store(CategoryRequest $request, Category $category)
    {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/categories/list');
    }
    
    public function lists(Category $category)
    {
        return view('categories/list')
        ->with([
            'categories' => $category->get(),
        ]);
    }
    
    public function edit(Category $category, User $user)
    {
        return view('categories/edit')
        ->with([
            'categories' => $category,
            'users' => $user->get(),
        ]);
    }
    
    public function update(CategoryRequest $request, Category $category)
    {
        $input_category = $request['category'];
        $category->fill($input_category)->save();
        return redirect('/categories/list');
    }    

    public function delete(Maildata $maildata, Category $category)
    {
        //カテゴリーIDを持たないメールデータの生成防止
        $maildata->where('categories_id',$category->id)->delete();
        $category->delete();
        return redirect('/categories/list');
    }
}

?>