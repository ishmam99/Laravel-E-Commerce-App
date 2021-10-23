<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CouponController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupon()
    {
        $coupon =DB::table('coupon')->get();
        return view('admin.coupon.coupon',compact('coupon'));
   }

   public function store(Request $request)
   {
       $request->validate([
           'coupon'=>'required|unique:coupon',
           'discount'=>'required'
       ]);
       $data=array();
       $data['coupon']=$request->coupon;
       $data['discount']=$request->discount;
       DB::table('coupon')->insert($data);
       $notification=array(
           'messege'=>'Coupon Inserted Successfully',
           'alert-type'=>'success'
       );
       return redirect()->back()->with($notification);
   }

   public function edit($id)
   {
       $coupon=DB::table('coupon')->where('id',$id)->first();
       return view('admin.coupon.edit',compact('coupon'));
   }
   public function update(Request $request,$id)
   {
       $request->validate([
           'coupon'=>'required',
           'discount'=>'required'
       ]);
       $data=array();
       $data['coupon']=$request->coupon;
       $data['discount']=$request->discount;
       DB::table('coupon')->where('id',$id)->update($data);
       $notification=array(
           'messege'=>'Coupon Updated Successfully',
           'alert-type'=>'success'
       );
       return redirect()->route('admin.coupon')->with($notification);
   }

   public function delete($id)
   {
        $coupon=DB::table('coupon')->where('id',$id)->delete();
        $notification=array(
           'messege'=>'Coupon Deleted Successfully',
           'alert-type'=>'success'
       );
       return redirect()->back()->with($notification);
   }

   public function newslater()
   {
       $newslater=DB::table('newsletters')->get();
       return view('admin.coupon.newslater',compact('newslater'));
   }
   public function delete_sub($id)
   {
        $coupon=DB::table('newsletters')->where('id',$id)->delete();
        $notification=array(
           'messege'=>'Subscriber Deleted Successfully',
           'alert-type'=>'success'
       );
       return redirect()->back()->with($notification);
   }
}
