<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">

    @include('admin.css')
    <style type="text/css">
        .center{
            text-align:center;
            padding-top:50px;
           
            margin-left:350px;
        }
        .h1_text{
            font-size:30px;
            font-weight:bold;
        }
        .input_text{
            color:black;
        }
        .div_style{
            padding:10px;
        }
        

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        
            <div class="center">
                
            @if(session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                     x
                </button>
                {{session()->get('message')}}
       
                </div>
            @endif
                <h1 class="h1_text">
                    Update Product
                </h1>
                <form action="{{url('updatedproduct',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_style">
                        <input class="input_text" type="text" name="title" placeholder="Product title" required=""value="{{$product->title}}">
                    </div>
                    <div class="div_style">
                        <input class="input_text"  type="text" name="description" placeholder="Product Description"required="" value="{{$product->description}}">
                    </div>
                    <div class="div_style">
                        <input class="input_text"  type="number" name="price" placeholder="Product price" required=""value="{{$product->price}}">
                    </div>
                    <div class="div_style">
                        <input class="input_text"  type="number" name="quantity" placeholder="Product quantity" required=""value="{{$product->quantity}}">
                    </div>
                    
                    <div class="div_style">
                        <input class="input_text"  type="number" name="discount_price" placeholder="Discount price"value="{{$product->discount_price}}" >
                    </div>
                    <div class="div_style">
                        <select name="category" id="" required="" class="input_text" >
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                            @foreach($category as $category)
                            <option value="{{$category->Category}}">{{$category->Category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_style">
                        <img src="/product/{{$product->image}}" alt="" width="100px" height="100px" style="margin-left:180px">
                    </div>
                    <div class="div_style">
                        <label for="">Update image:</label>
                        <input type="file" name="image"   class="input_text" >
                    </div>
                    <div class="div_style">
                        <input type="submit" name="submit" class="btn btn-primary"value="Update Product">
                    </div>

                    
                </form>

            </div>
</div>

        <!-- main-panel ends -->
      
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scrip')
  </body>
</html>