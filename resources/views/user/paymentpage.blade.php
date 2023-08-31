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
    img{
        height: 50px;
        width: 50px;
        margin-left:570px;
    }
    .h2{
        margin-left:500px;
        margin-top:50px;
        font-size:25px;
        font-weight:bold;
    }
    
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('user.header')
    <!-- end header section -->
    <!-- slider section -->
    <br>
    @if(isset($_GET['totalprice']))
        <?php $totalprice = $_GET['totalprice']; ?>
    @endif
    @if(session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                     x
                </button>
                {{session()->get('message')}}
       
                </div>
            @endif
    <div>
        <h2 class="h2">Payment Options</h2>

    </div>
    <div>
        <a href="{{url('stripe',$totalprice)}}"><img src="images/atm-card.png" alt=""></a>
        <br>
        <a href="{{url('cash_order')}}"><img src="images/cash-on-delivery.png" alt=""></a>
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