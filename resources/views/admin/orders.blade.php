<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .table_desing{
            text-align:center;
        
            margin-bottom:400px;
            padding:10px;
            width:100%;
            padding-top:50px;

        }
        th,td{
            border:1px solid grey;
        }
        p{
            color:red;
        }
        #search-input{
            border-radius:30px;
            color:black;
            width: 300px;
            
        }
        .search-container{
            padding-left:350px;
            padding-top:50px;
            padding-bottom:50px;
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
        

            
            <div style="height: 580px; overflow-x: auto;">
            <div class="search-container">
                <form action="{{url('search')}}" method="GET">
                    @csrf
                <input type="text" placeholder="Search..." id="search-input" name="search">
                <input type="submit" value="search" class="btn btn-secondary" style="color:white;">
                </form>
    
            </div>
            <table class="table_desing">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product title</th>
                    <th>Product id</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Payment status</th>
                    <th>Delivery status</th>
                    <th>Image</th>
                    <th>Delivered</th>
                    <th>PDF</th>
                    <th>Send email</th>
                </tr>
                @forelse($orders as $orders)
                <tr>
                    <td>{{$orders->name}}</td>
                    <td>{{$orders->email}}</td>
                    <td>{{$orders->address}}</td>
                    <td>{{$orders->phone}}</td>
                    <td>{{$orders->product_title}}</td>
                    <td>{{$orders->product_id}}</td>
                    <td>${{$orders->price}}</td>
                    <td>{{$orders->quantity}}</td>
                    <td>{{$orders->payment_status}}</td>
                    <td>{{$orders->delivery_status}}</td>
                    <td><img src="product/{{$orders->image}}" alt="" width="40px" height="40px"></td>
                    
                    <td>
                    @if($orders->delivery_status=='processing')
                        <a href="{{url('delivered',$orders->id)}}" class="btn btn-success" onclick="return confirm('Are you sure you delivered this order?')">Delivered</a>
                    @else
                    <p>Delivered</p>
                    @endif
                    </td>
                    <td align="center"><a href="{{url('pdf_download',$orders->id)}}"><img src="images/file.png" alt="" height="30px" width="30px"></a></td>
                    <td align="center"><a href="{{url('sendmail',$orders->id)}}"><img src="images/email.png" alt="" width="50px" height=""></a></td>
                </tr>
                @empty
                <tr >
                    <td colspan="16">
                        <p>Not found!</p>
                    </td>
                </tr>
                @endforelse
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