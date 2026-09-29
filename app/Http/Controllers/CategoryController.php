<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class CategoryController extends Controller
{
    public function store(Request $request){
    $request->validate([
    'name'=>'required|string|min:3|max:100',
    'description'=>'nullable|string',
    ]);
    $category=Category::create([
        'name'=>$request->name,
        'description'=>$request->description,
    ]);
    return response()->json($category);
    }
    public function index(){
        return Category::all();
    }
   public function show($id)
{
    $category = Category::find($id);

    return $category;
}

}
