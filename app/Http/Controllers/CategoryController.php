<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $catergories = category::get();
        return view ('category.index',compact( 'catergories'));


    }
    public function create(){
        $timeSlots = [];
        $startTime = strtotime("00:00");
        $endTime = strtotime("23:00");

        for ($current = $startTime; $current <= $endTime; $current += 3600) {
            $timeSlots[] = date("H:i", $current);
        }

        return view('category.create', compact('timeSlots'));
    }


    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255|string',
            'description'=>'required|max:255|string',
            'is_active'=>'sometimes',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'time_slot' => 'required|string',
     ]   );
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_active'=>$request->is_active == true ? 1 : 0,
            'image' => $imagePath,
            'time_slot' => $request->time_slot,

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'

        ]   );
        $category = category::findOrFail($id);
        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::delete('public/' . $imagePath); // Delete the old image
            }
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1 : 0,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('status', 'Category Updated');
    }

    public function destroy(int $id)
    {
     $category = Category::findOrFail($id);
        if ($category->image) {
            Storage::delete('public/' . $category->image); // Delete associated image
        }
     $category->delete();
     return redirect()->back()->with('status','Category Deleted');
    }
}
