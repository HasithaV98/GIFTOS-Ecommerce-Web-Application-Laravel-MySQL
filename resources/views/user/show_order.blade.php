<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
    Giftos
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    .table-style{
        align:center;
        margin-left:150px;
        text-align:center;
        margin-top:50px;
        width:75%;
        color:grey;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('user.header')
    <!-- end header section -->
    <!-- slider section -->

    <div>
        <table class="table-style">
            <tr>
                <th>Product title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment status</th>
                <th>Delivery status</th>
                <th>Product image</th>
                <th>Cancelation</th>
            </tr>
            @foreach($order as $order)
            <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td align="center"><img src="product/{{$order->image}}" alt="" heigth="50px" width="50px" ></td>
                <td align="center">
                    @if($order->delivery_status=='processing')
                    <a href="{{url('cancel_order',$order->id)}}" class="btn btn-warning" onclick="return confirm('Do you want cancel order?')">Cancel</a>
                    @elseif($order->delivery_status=='Canceled')
                        <p style="color:red">Canceled</p>
                    @else
                    <p style="color:blue">Dispatched</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- end slider section -->
  </div>
 
  

  <!-- client section -->
  @include('user.client')
  <!-- end client section -->

  <!-- info section -->

  @include('user.info')
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>