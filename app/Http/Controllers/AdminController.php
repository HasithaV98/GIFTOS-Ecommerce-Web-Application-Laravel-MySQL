<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\EmailNotification;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function addcategory(){
        $data=category::all();
        return view('admin.addcategory',compact('data'));
    }
    public function addedcategory(Request  $request){
        $data=new category;
        $data->Category=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category add successfully');
    }
    public function deletecategory($id){
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category deleted');
    }
    public function addproducts(){
        $category=category::all();
        return view('admin.addproducts', compact('category'));
    }
    public function showproducts(){
        $product=product::all();
        return view('admin.showproducts',compact('product'));
    }
    public function productadd(Request $request){
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $product->discount_price=$request->discount_price;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message','Product added sucessfully');
    }
    public function deleteproduct($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted!');
    }
    public function updateproduct($id){
        $product=product::find($id);
        $category=category::all();

        return view('admin.updateproduct',compact('product','category'));
    }
    public function updatedproduct(Request $request,$id){
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $product->discount_price=$request->discount_price;

        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        }
        $product->save();
        return redirect()->back()->with('message','Product update successfully');

    }
    public function orders(){
        $orders=order::all();
        return view('admin.orders',compact('orders'));
    }
    public function delivered($id){
        $order=order::find($id);
        $order->delivery_status='delivered';
        $order->payment_status='Paid';
        $order->save();
        return redirect()->back();
    }
    public function pdf_download($id){
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');

    }
    public function sendmail($id){
        $data=order::find($id);
        return view('admin.email_view',compact('data'));
    }
    public function send_user_email(Request $request,$id){
        $order=order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'mailbody'=>$request->mailbody,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart
        ];
        Notification::send($order, new EmailNotification($details));
        return redirect()->back()->with('messege','Email sending to user.');
    }
    public function searchdata(Request $request){
        $searchtext=$request->search;
        $orders=order::where('name','LIKE',"%$searchtext%")->orWhere('email','LIKE',"%$searchtext%")
        ->orWhere('address','LIKE',"%$searchtext%")->orWhere('phone','LIKE',"%$searchtext%")
        ->orWhere('product_title','LIKE',"%$searchtext%")->orWhere('product_id','LIKE',"%$searchtext%")
        ->orWhere('price','LIKE',"%$searchtext%")->orWhere('quantity','LIKE',"%$searchtext%")
        ->orWhere('payment_status','LIKE',"%$searchtext%")->orWhere('delivery_status','LIKE',"%$searchtext%")->get();
        return view('admin.orders',compact('orders'));
    }
    public function show_feedback(){
        
        $feedback=feedback::all();
        return view('admin.show_feedback',compact('feedback'));
    }
    public function sendresponse($id){
        $response=feedback::find($id);
        return view('admin.response_view',compact('response'));
    }
    public function send_response_email(Request $request,$id){
        $response=feedback::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'mailbody'=>$request->mailbody,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart
        ];
        Notification::send($response, new EmailNotification($details));
        return redirect()->back()->with('messege','Response send successfully.');
    }

}
