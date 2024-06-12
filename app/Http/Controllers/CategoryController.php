<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $catergories = category::get();
        return view ('category.index',compact( 'catergories'));

    }
    public function create(){
        return view ('category.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255|string',
            'description'=>'required|max:255|string',
            'is_active'=>'sometimes',
     ]   );
        category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_active'=>$request->is_active == true ? 1 : 0,

        ]);
        return redirect('catergories/create')->with('status','Category added successfully');

    }
    public function edit(int $id)
    {
        $category = category::findOrFail($id);
        //return $category;
        return view ('category.edit', compact('category'));
    }
    public function update(Request $request, int $id)
    {

        $request->validate([
            'name'=>'required|max:255|string',
            'description'=>'required|max:255|string',
            'is_active'=>'sometimes',
        ]   );
        Category::findOrFail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_active'=>$request->is_active == true ? 1 : 0,

        ]);
        return redirect()->back()->with('status','Category Updated');

    }
    public function destroy(int $id)
    {
     $category = Category::findOrFail($id);
     $category->delete();
     return redirect()->back()->with('status','Category Deleted');
    }
}
