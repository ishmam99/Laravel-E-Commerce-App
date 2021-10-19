<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function brand(){
        $brands=Brand::all();
        return view('admin.category.brand',compact('brands'));
    }


     public function store(Request $request)
    {
        $validateData=$request->validate([
            'brand_name'=>'required|unique:brands|max:255',
        ]);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $image=$request->file('brand_logo');
        if($image){
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;

            $success = $image->move($upload_path,$image_full_name);
        }
        $brand->brand_logo=$image_url;
        $brand->save();
        $notification=array(
            'messege'=>$brand->brand_name.' Successfully Added as new Brand',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function delete($id){

       $brand= Brand::find($id);
      $image= $brand->brand_logo;
      unlink($image);
       $brand->delete();
        $notification=array(
            'messege'=>'Brand Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
     public function edit($id){

       $brand=Brand::find($id);
         return view('admin.category.edit_brand',compact('brand'));
     }
     public function update(Request $request,$id)

        {
            $old_photo=$request->old_logo;
            $validateData= $request->validate([
                'brand_name'=>'required|max:255',
            ]);
            $brand=brand::find($request->id);
            $brand->brand_name=$request->brand_name;
            $image=$request->file('brand_logo');
            if($image){
                unlink($old_photo);
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;

            $success = $image->move($upload_path,$image_full_name);
            $brand->brand_logo=$image_url;
            $brand->save();
            $notification=array(
            'messege'=>'Brand Updated Successfully with new logo',
            'alert-type'=>'success'
        );
        }
        else{
            $brand->save();
            $notification=array(
            'messege'=>'Brand Name Updated Successfully',
            'alert-type'=>'success'
        );}
        return Redirect()->route('brands')->with($notification);
        }
}
