<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class PostController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }


    public function catList()
        {
            $blogCat=DB::table('post_category')->get();
            return view('admin.blog.category.index',compact('blogCat'));
        }

    public function BlogCatStore(Request $request)
       {
            $validateDate = $request->validate([
                'category_name_en'=>'required|max:255',
                'category_name_bn'=>'required|max:255'
            ]);
            $data=array();
            $data['category_name_en']=$request->category_name_en;
            $data['category_name_bn']=$request->category_name_bn;

            DB::table('post_category')->insert($data);
            $notification=array(
                'messege'=>'Blog Category Added Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
         }
    public function deleteCategory($id)
        {
            DB::table('post_category')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Blog Category Deleted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
     public function editCategory($id)
        {
            $blogCat=DB::table('post_category')->where('id',$id)->first();
            return view('admin.blog.category.edit',compact('blogCat'));
        }
    public function updateCategory(Request $request,$id)
        {
            $validateData= $request->validate([
                'category_name_en'=>'required|max:255',
                'category_name_bn'=>'required|max:255',
            ]);
            $data=array();
            $data['category_name_en']=$request->category_name_en;
            $data['category_name_bn']=$request->category_name_bn;
           
            DB::table('post_category')->where('id',$id)->update($data);
                 $notification=array(
            'messege'=>' Category Name Updated Successfully',
            'alert-type'=>'success'
            );
                return redirect()->back()->with($notification);
        }
    public function post()
        {
            $category=DB::table('post_category')->get();
            return view('admin.blog.create',compact('category'));
        }
    public function blogpost()
        {
            $post=DB::table('posts')
                            ->join('post_category','category_id','post_category.id')
                            ->select('posts.*','post_category.category_name_en','post_category.category_name_bn')
                            ->get();
            return view('admin.blog.index',compact('post'));
        }
    public function store(Request $request)
        {
            $data=array();
            $data['category_id']=$request->category_id;
            $data['post_title_en']=$request->post_title_en;
            $data['post_title_bn']=$request->post_title_bn;
            $data['details_en']=$request->post_details_en;
            $data['details_bn']=$request->post_details_bn;
            $image=$request->post_image;
            if($image)
            {
                $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('public/media/post/'.$image_name);
                $data['post_image']='public/media/post/'.$image_name;
            }
            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>' Post Saved Successfully',
                'alert-type'=>'success'
            );
                return redirect()->route('all.post')->with($notification);
        }

    public function delete($id)
        {
        $post= DB::table('posts')->where('id',$id)->first();
            $image= $post->post_image;
            if($image){
        unlink($image);}
        DB::table('posts')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Blog Deleted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }

    public function edit($id)
        {
            $post=DB::table('posts')->where('id',$id)->first();
            return view('admin.blog.edit',compact('post'));
        }

     public function update(Request $request,$id)
        {
            
            $data=array();
            $data['category_id']=$request->category_id;
            $data['post_title_en']=$request->post_title_en;
            $data['post_title_bn']=$request->post_title_bn;
            $data['details_en']=$request->post_details_en;
            $data['details_bn']=$request->post_details_bn;
            $image=$request->post_image;
            if($image!=$request->old_img){
            if($image)
            {
                $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('public/media/post/'.$image_name);
                $data['post_image']='public/media/post/'.$image_name;
                unlink($image);
            }
        }
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>' Post Updated Successfully',
                'alert-type'=>'success'
            );
                    return redirect()->route('all.post')->with($notification);
        }
}
