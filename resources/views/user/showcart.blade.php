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
    .center{
        margin:auto;
        width:50%;
        padding: 10px;
        text-align:center;
        margin-top:50px;
        color:grey;
    }
    img{
        height:50px;
        width:50px;
        margin-left:50px;
    }
    h2{
        color:red;
        font-size:20px;
    }
    span{
        color:grey;
    }
    .total{
        margin-left:724px;
        margin-top:50px;
    }
    .text{
        font-size:20px;
    }
    #check_out{
        
        margin-left:800px;
    }
    .check_div{
        margin-top: 30px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('user.header')
    <!-- end header section -->
    <!-- slider section -->
      
        <table class="center">
            <tr>
                <th>Product title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Product image</th>
                <th>Action</th>
            </tr>
            <?php $totalprice=0; ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>${{$cart->price}}</td>
                <td><img src="product/{{$cart->image}}" altc=""></td>
                <td><a href="{{url('removeitem',$cart->id)}}"class="btn btn-danger" onclick="return confirm('Do you want remove this item?')">Remove</a></td>
            </tr>
            <?php $totalprice=$totalprice+$cart->price?>
            @endforeach
        </table>
        <div class="total">
            <h2 class="text">Total price :<span> $ {{$totalprice}}</span></h2>
            
        </div>
        <div class="check_div">
        <a id="check_out" href="{{url('paymentpage')}}?totalprice={{$totalprice}}" class="btn btn-warning">Check Out</a>
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