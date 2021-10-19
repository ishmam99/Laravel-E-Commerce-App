<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SubCategory;
use App\Models\Admin\Category;
use DB;
class SubCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function subcategory(){
        $category=Category::all();
        $subcategory=DB::table('subcategories')
                    ->join('categories','subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category_name')
                    ->get();
        return view('admin.category.subcategory',compact('category','subcategory'));
    }

    public function store(Request $request)
    {
        $validateData= $request->validate([
            'category_id' => 'required',
            'subcategory_name' =>'required'
        ]);
        $subcategory=new SubCategory();
        
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        
        $subcategory->save();
        
        $notification=array(
            'messege'=>'Sub Category Added Successfully',
            'alert-type'=>'success'
        ) ;
        return redirect()->back()->with($notification);
    }
     public function edit($id){
        $category=Category::all();
       $subcategory=SubCategory::find($id);
         return view('admin.category.editSubcategory',compact('subcategory','category'));
     }
    public function update(Request $request)
    {
        $validateData= $request->validate([
            'category_id' => 'required',
            'subcategory_name' =>'required'
        ]);
        $subcategory=new SubCategory();
        
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        
        $subcategory->save();
        
        $notification=array(
            'message'=>'Sub Category Updated Successfully',
            'alert-type'=>'success'
        ) ;
        return redirect()->back()->with($notification);
    }

    public function delete($id){

       $subcategory= SubCategory::find($id);
       $subcategory->delete();
        $notification=array(
            'messege'=>'Sub Category Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
