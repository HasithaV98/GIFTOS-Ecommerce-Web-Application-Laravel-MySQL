<!DOCTYPE html>
<html>

<head>
    <base href="/public">
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
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('user.header')
    <!-- end header section -->
    <!-- slider section -->

    

  </div>
  <!-- end hero area -->
  <div class="col-sm-6 col-md-4 col-lg-3" style="margin:auto; width:50%; padding-top:50px">
  
  <div class="box">
    
    
      <div class="img-box">
        <img src="product/{{$product->image}}" alt="">
        
      </div>
      <br>
      <div class="detail-box">
        <h5 style="font-weight:bold;">{{$product->title}}</h5>
        @if($product->discount_price!=null)
        <h6>
          Discount :
          
          <span style="color:red">
            ${{$product->discount_price}}
          </span>
        </h6>
        <h6>
          Price :
          
          <span style="text-decoration:line-through;">
            ${{$product->price}}
          </span>
        </h6>
        @else
        <h6>
          Price :
          
          <span>
            ${{$product->price}}
          </span>
        </h6>
        @endif
        <h6>
            Category :
            <span>{{$product->category}}</span>
        </h6>
        <h6>
            Quantity :
            <span>{{$product->quantity}}</span>
        </h6>
        <h6>
            Description :
            <span>{{$product->description}}</span>
        </h6>
        <br>
        <form action="{{url('addcart',$product->id)}}" method="POST" >
          @csrf
          <div>
            <input type="submit" class="btn btn-warning" value="Add Cart" style="background-color:#ffdf00;">
            <input name="quantity" type="number" class="buy-now" style="margin-left:20px; background-color:white;color:black; width:60px;" value="1" min="1">

          </div>
          <div>
          </div>

        </form>
      </div>
    
  </div>
</div>
  <!-- shop section -->


  



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