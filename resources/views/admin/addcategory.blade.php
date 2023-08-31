<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style>
    .center{
      align:center;
      border:2px solid white;
      width: 700px;

      

    }
    th{
      font-size:20px;
      text-align:center;
      padding:10px;
    }
    .form_style{
      text-align:center;
      padding-top:50px;
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        
        <div   class="form_style">
            @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          {{session()->get('message')}}
       
        </div>
        @endif
              <h1 style="font-weight:bold; font-size:25px">Add Category</h1>
              <br>
              <form action="{{url('addedcategory')}}" method="POST">
                @csrf
                <div>
                <input type="text" name="category" placeholder="Enter category" style="color:black">
                <input type="submit" class="btn btn-success" value="Add Category" name="submit">
              </div>
              </form>
              <div>
                <br>
              <table class="center">
                <tr><th>Category</th>
              <th>Action</th></tr>
              @foreach($data as $datas)
              <tr>
                <td>{{$datas->Category}}</td>
                <td><a href="{{url('deletecategory',$datas->id)}}" class="btn btn-danger" onclick="return confirm('Do you want delete this?')">Remove</a></td>
              </tr>
              @endforeach

            </table>

              </div>

              
              
              
            </div>
            
  </div>
</div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scrip')
    <!-- End custom js for this page -->
  </body>
</html>