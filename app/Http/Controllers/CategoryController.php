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

}
?>