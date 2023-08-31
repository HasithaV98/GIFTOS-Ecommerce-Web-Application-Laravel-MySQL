<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .table_style{
            
            border:2px solid white;
            width: 800px;
            
        }
        .div_style{
            padding-top:50px;
            margin-left:100px;
            text-align:center;

            
            
        }
        th{
            text-align:center;
            font-weight:bold;
            font-size:18px;
            border:2px solid white;
        }
        tr{
            border:2px solid white;

        }
        td{
            border:2px solid white;

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

            <div class="div_style">
            @if(session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                     x
                </button>
                {{session()->get('message')}}
       
                </div>
            @endif
            <table class="table_style">
                <tr>
                    <th>Product title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Discount Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach($product as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td><img src="product/{{$product->image}}" alt="" height="100px" width="100px"></td>
                    <td>
                      <a href="{{url('updateproduct',$product->id)}}" class="btn btn-warning">Update</a>
                      
                    </td>
                    <td>
                    <a href="{{url('deleteproduct',$product->id)}}" class="btn btn-danger" onclick="return confirm('Do you want delete this?')">Delete</a>

                    </td>
                </tr>
                @endforeach
            </table>

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