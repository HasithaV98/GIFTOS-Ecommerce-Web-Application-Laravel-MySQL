<style>
  .img-box {
  position: relative;
}

.buy-now {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #00ff00;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: none;
  border-radius:10px;
  width: 150px;
}

.img-box:hover .buy-now {
  display: block;
}
input{
  border:none;
}
#search-input{
            border-radius:30px;
            color:black;
            width: 300px;
            border:1px solid grey;
            
        }
        .search-container{
            
            padding-top:20px;
            padding-bottom:50px;
        }

</style>
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="search-container">
      
                <form action="{{url('product_search')}}" method="GET">
                    @csrf
                <input type="text" placeholder="Search..." id="search-input" name="searchproduct">
                <input type="submit" value="search" class="btn btn-secondary" style="color:grey;">
                </form>
    
            </div>
            @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          {{session()->get('message')}}
       
        </div>
        @endif
            
      <div class="row">
      @forelse($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
  <div class="box">
    
      <div class="img-box">
        <img src="product/{{$products->image}}" alt="">
        <form action="{{url('addcart',$products->id)}}" method="POST" >
          @csrf
          <div>
            <input type="submit" class="buy-now" value="Add Cart">
          </div>
          <div>
            <input name="quantity" type="number" class="buy-now" style="margin-left:103px; background-color:white;color:black; width:40px" value="1" min="1">
          </div>

        </form>
        
        <br>
        <a href="{{url('productdetails',$products->id)}}" class="buy-now" style="margin-top:50px; background-color:#00bfff">Details</a>
      </div>
      <div class="detail-box">
        <h6>{{$products->title}}</h6>
        @if($products->discount_price!=null)
        <h6>
          Discount
          <br>
          <span style="color:red">
            ${{$products->discount_price}}
          </span>
        </h6>
        <h6>
          Price
          <br>
          <span style="text-decoration:line-through;">
            ${{$products->price}}
          </span>
        </h6>
        @else
        <h6>
          Price
          <br>
          <span>
            ${{$products->price}}
          </span>
        </h6>
        @endif
      </div>
    
  </div>
</div>
    @empty
      <tr >
        <td colspan="16">
          <p style="color:red;padding-left:100px">Not found!</p>
        </td>
      </tr>

    @endforelse 
    <span style="padding-top:20px">
      {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}

    </span>
      
    </div>
  </section>
