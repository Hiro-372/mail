<?php
namespace App\Http\Controllers;

use App\Models\GoogleMail;
use App\Models\Category;
use App\Models\User;

class GoogleMailController extends Controller
{
    public function index(GoogleMail $gmail, Category $category, User $user)
    {
        return view('gmaildatas/index') -> with([
            'messages' => $gmail->index()[0],
            'counter' => $gmail->index()[1],
            'body' => $gmail->index()[2],
            'categories' => $category->get(),
            'users' => $user->get(),
            ]);
    }
}



?>