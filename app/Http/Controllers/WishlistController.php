<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Cart;
class WishlistController extends Controller
{
    public function add($id)
    {  
         $user=Auth::id();
         $check=DB::table('wishlists')->where('user_id',$user)->where('product_id',$id)->first();
       
      
        $data=array([
            'user_id'=>$user,
            'product_id'=>$id
        ]);
      if(Auth::Check())
       {
        if($check)
        {
            
            return \Response::json(['error'=>'Item Already Wishlisted']);
        }
        else{
          DB::table('wishlists')->insert($data);
           return \Response::json(['success'=>'Item Added to wishlisted']);
        }
       }
       else{
            
            return \Response::json(['error'=>'Please Login To make any product Wishlisted']);
       }
    }
    public function addCart($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $data=array();
        if($product->discount_price==NULL)
        {
             $data['id']=$product->id;
             $data['name']=$product->product_name;
             $data['qty']=1;
             $data['price']=$product->selling_price;
             $data['weight']=1;
             $data['options']['ímage']=$product->image_one;
             Cart::add($data);
             return \Response::json(['success'=>'Product Added To The Cart']);
        }
        else{
            $data['id']=$product->id;
             $data['name']=$product->product_name;
             $data['qty']=1;
             $data['price']=$product->discount_price;
             $data['weight']=1;
             $data['options']['ímage']=$product->image_one;
             Cart::add($data);
             return \Response::json(['success'=>'Product Added To The Cart']);
        }
        
    }
}
