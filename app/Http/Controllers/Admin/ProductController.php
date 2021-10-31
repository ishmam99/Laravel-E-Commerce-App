<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class ProductController extends Controller
{
    // 
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $product=DB::table('products')
                            ->join('categories','products.category_id','categories.id')
                            ->join('brands','products.brand_id','brands.id')
                            ->select('products.*','categories.category_name','brands.brand_name')
                            ->get();

     
        return view('admin.product.index',compact('product'));
    }
    public function create()
    {
        $category=DB::table('categories')->get();
        $brands=DB::table('brands')->get();
        return view('admin.product.create',compact('category','brands'));
    }

    public function store(Request $request)
    {
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_colour']=$request->product_colour;
        $data['product_details']=$request->product_details;
        $data['selling_price']=$request->selling_price;
        $data['video_link']=$request->video_link;
        $data['main_slider']=$request->main_slider;
        $data['hot_deal']=$request->hot_deal;
        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        $data['mid_slider']=$request->mid_slider;
        $data['hot_new']=$request->hot_new;
        $data['status']=1;

        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
       
        if($image_one && $image_two && $image_three)
        {
            $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            $data['image_one']='public/media/product/'.$image_one_name;

             $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
            $data['image_two']='public/media/product/'.$image_two_name;

             $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
            $data['image_three']='public/media/product/'.$image_three_name;

            $product=DB::table('products')->insert($data);

            $notification=array(
                'messege' =>'Product Successfully Added',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function inactive($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'Product status is now Inactive',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    }
     public function active($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Product status is now Active',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
     public function delete($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $img_1=$product->image_one;
        $img_2=$product->image_two;
        $img_3=$product->image_three;
        unlink($img_1);
         unlink($img_2);
          unlink($img_3);
          DB::table('products')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Product Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function show($id){
        $product=DB::table('products')
                            ->join('categories','products.category_id','categories.id')
                             ->join('subcategories','products.subcategory_id','subcategories.id')
                            ->join('brands','products.brand_id','brands.id')
                            ->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name')
                            ->where('products.id',$id)
                            ->first();
        return view('admin.product.show',compact('product'));
    }

     public function edit($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        
       return view('admin.product.edit',compact('product'));
    }

    public function update(Request $request,$id)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_colour']=$request->product_colour;
        $data['product_details']=$request->product_details;
        $data['selling_price']=$request->selling_price;
        $data['discount_price']=$request->discount_price;
        $data['video_link']=$request->video_link;
        $data['main_slider']=$request->main_slider;
        $data['hot_deal']=$request->hot_deal;
        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        $data['mid_slider']=$request->mid_slider;
        $data['hot_new']=$request->hot_new;
        $data['status']=1;
        $update= DB::table('products')->where('id',$id)->update($data);
        if($update){
             $notification=array(
            'messege'=>'Product Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

        }
        else
        $notification=array(
            'messege'=>'Please Change Values To Update!!',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);


    }
    public function updatephoto(Request $request,$id)
    {
         $old_img_one=$request->old_img_one;
         $old_img_two=$request->old_img_two;
         $old_img_three=$request->old_img_three;
            
           
            $image_one=$request->file('image_one');
            $image_two=$request->file('image_two');
            $image_three=$request->file('image_three');

             $data=array();
            if($image_one){
                unlink($old_img_one);

                 $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            $data['image_one']='public/media/product/'.$image_one_name;

           
        }
           if($image_two){
                unlink($old_img_two);

            $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
            $data['image_two']='public/media/product/'.$image_two_name;

        }
           if($image_three){
              unlink($old_img_three);

            $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
            $data['image_three']='public/media/product/'.$image_three_name;

            
           }
           $product=DB::table('products')->where('id',$id)->update($data);
           $notification=array(
            'messege'=>'Product Updated Successfully with new Photo',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
