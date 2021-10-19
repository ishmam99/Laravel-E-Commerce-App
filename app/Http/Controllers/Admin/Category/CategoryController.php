<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function category()
    {
       $categories=Category::all();
       return view('admin.category.category',compact('categories'));
    }
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'category_name'=>'required|unique:categories|max:255',
        ]);
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->save();
        $notification=array(
            'messege'=>$category->category_name.' Successfully Added as new Category',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function delete($id){

       $category= Category::find($id);
       $category->delete();
        $notification=array(
            'messege'=>'Category Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
     public function edit($id){

       $category=Category::find($id);
     return view('admin.category.edit',compact('category'));
     }


    public function update(Request $request)
        {
            $validateData= $request->validate([
                'category_name'=>'required|max:255',
            ]);
            $category=Category::find($request->id);
            if($request->category_name==$category->category_name)
            {
                 $notification=array(
            'messege'=>'Same Category Name, Nothing to update',
            'alert-type'=>'error'
        );
                return redirect()->back()->with($notification);
            }
            else{

            $category->category_name=$request->category_name;
            $category->save();
            $notification=array(
            'messege'=>'Category Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('category')->with($notification);}
    }
}
