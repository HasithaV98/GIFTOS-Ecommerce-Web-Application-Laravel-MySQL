<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Feedback;
use Session;
use Stripe;


class HomeController extends Controller
{
    public function index(){
        $product=product::paginate(8);
        return view('user.home',compact('product'));
    }
    public function redirect(){

        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $total_customers=user::all()->count();
            $total_products=product::all()->count();
            $total_orders=order::all()->count();
            $order=order::all();
            $total_revenue=0;
            foreach($order as $order){
                $total_revenue=$total_revenue+$order->price;
            }
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=order::where('delivery_status','=','processing')->get()->count();
            $total_card_payment=order::where('payment_status','=','paid')->get()->count();
            $total_cash_on_delivery=order::where('payment_status','=','cash on delivery')->get()->count();
            $total_canceled_order=order::where('delivery_status','=','Canceled')->get()->count();
            $total_feedbacks=feedback::all()->count();
            return view('admin.home',compact('total_customers','total_products','total_orders','total_revenue','total_delivered','total_processing','total_card_payment','total_cash_on_delivery','total_canceled_order','total_feedbacks'));

        }
        else{
            $product=product::paginate(8);
            return view('user.home',compact('product'));
        } 
    }
    public function productdetails($id){
        $product=product::find($id);
        return view('user.productdetails',compact('product'));
    }
    public function addcart(Request $request,$id){

        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $product=product::find($id);
            $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
            if($product_exist_id){
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity+$request->quantity;
                if($product->discount_price!=null){
                    $cart->price=$product->discount_price * $cart->quantity;
                }else{
                    $cart->price=$product->price * $cart->quantity;
                }
                $cart->save();
                return redirect()->back()->with('messege','Product added to cart!');

            }else{
                $cart=new cart;
                $cart->name=$user->name;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->email=$user->email;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;
                if($product->discount_price!=null){
                    $cart->price=$product->discount_price * $request->quantity;
                }else{
                    $cart->price=$product->price * $request->quantity;
                }
                $cart->product_id=$product->id;
                $cart->quantity=$request->quantity;
                $cart->image=$product->image;
                $cart->save();
                return redirect()->back()->with('messege','Product added to cart!');
            }
            
            

        }
        else{
            return redirect('login');
        }
    }
    public function showcart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('user.showcart',compact('cart'));
        }else{
            return redirect('login');
        }

    }
    public function removeitem($id){
        $item=cart::find($id);
        $item->delete();
        return redirect()->back();
    }
    public function paymentpage(Request $request){
        $totalprice = $request->input('totalprice');
        return view('user.paymentpage',compact('totalprice'));
    }
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order=new order;
            $order->name=$data->name;
            $order->phone=$data->phone;
            $order->email=$data->email;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','Your order recevied and we will contact you');
    }
    public function stripe(Request $request){
        $totalprice=$request->totalprice;
        return view('user.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order=new order;
            $order->name=$data->name;
            $order->phone=$data->phone;
            $order->email=$data->email;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='Paid using card';
            $order->delivery_status='processing';
            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
    public function show_order(){
        
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();

            return view('user.show_order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
    public function cancel_order($id){
        $cancel=order::find($id);
        $cancel->delivery_status='Canceled';
        $cancel->save();
        return redirect()->back();
    }
    public function send_feedback(Request $request){
        if(Auth::id()){
            $feedback=new feedback;
            $feedback->name=$request->name;
            $feedback->phone=$request->phone;
            $feedback->email=Auth::user()->email;
            $feedback->user_id=Auth::user()->id;
            $feedback->message=$request->message;
            $feedback->save();
            return redirect()->back();

        }
        else{
            return redirect('login');
        }
    }
    public function searchproduct(Request $request){
        $searchtext=$request->searchproduct;
        $product=product::where('title','LIKE',"%$searchtext%")->orWhere('price','LIKE',"%$searchtext%")
        ->orWhere('category','LIKE',"%$searchtext%")->paginate(100);
        return view('user.home',compact('product'));
    }
    public function all_products(){
        $product=product::paginate(8);
        return view('user.all_products',compact('product'));
    }
    public function whyus(){
        return view('user.whyus');
    }
    public function testimonial(){
        return view('user.testimonial');
    }
    public function contactus(){
        return view('user.contactus');
    }
    public function product_search(Request $request){
        $searchtext=$request->searchproduct;
        $product=product::where('title','LIKE',"%$searchtext%")->orWhere('price','LIKE',"%$searchtext%")
        ->orWhere('category','LIKE',"%$searchtext%")->paginate(100);
        return view('user.all_products',compact('product'));
    }
   
}
