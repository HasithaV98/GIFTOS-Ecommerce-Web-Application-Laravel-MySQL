<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .table-style{
            align:center;
            padding-left:200px;
            padding-top:50px;
            
        }
        .table-d{
            width: 800px;
        }
        table,td,tr{
            border:1px solid grey;
        }
        th{
            text-align:center;
            border:1px solid grey;
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
        <div class="table-style">
            <table class="table-d">
                <tr>
                    <th>Name</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Send reply</th>
                </tr>
                @foreach($feedback as $feedback)
                <tr>
                    <td>{{$feedback->name}}</td>
                    <td>{{$feedback->user_id}}</td>
                    <td>{{$feedback->email}}</td>
                    <td>{{$feedback->message}}</td>
                    <td align="center"><a href="{{url('sendresponse',$feedback->id)}}"><img src="images/email.png" alt=""width="50px" height=""></a></td>
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