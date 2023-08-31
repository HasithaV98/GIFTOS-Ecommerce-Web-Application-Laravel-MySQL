<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .order_table{
            
            font-size:15px;
            width:85%;
            margin-left:170px;
           
        }
        tr,td,table{
            border:1px;
        }
        h2{
            text-align:center;
        }
    </style>
</head>
<body>
    <h2>Order details</h2>
    <table class="order_table">
        <tr>
            <td>Name : </td>
            <td>{{$order->name}}</td>
        </tr>
        <tr>
            <td>Email :</td>
            <td>{{$order->email}}</td>
        </tr>
        <tr>
            <td>Address :</td>
            <td>{{$order->address}}</td>
        </tr>
        <tr>
            <td>Phone No : </td>
            <td>{{$order->phone}}</td>
        </tr>
        <tr>
            <td>User ID :</td>
            <td>{{$order->user_id}}</td>
        </tr>
        <tr>
            <td>Product ID :</td>
            <td>{{$order->product_id}}</td>
        </tr>
        <tr>
            <td>Product title :</td>
            <td>{{$order->product_title}}</td>
        </tr>
        <tr>
            <td>Price :</td>
            <td>${{$order->price}}</td>
        </tr>
        <tr>
            <td>Quantity :</td>
            <td>{{$order->quantity}}</td>
        </tr>
        <tr>
            <td>Payment status :</td>
            <td>{{$order->payment_status}}</td>
        </tr>
        <tr>
            <td>Delivery status :</td>
            <td>{{$order->delivery_status}}</td>
        </tr>
        
    </table>
</body>
</html>