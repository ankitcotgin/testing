<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.view');
    }
    //create
    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.category.create');
        }

        if ($request->isMethod('POST')) {
            return view('admin.category.create');
        }
    }
}
