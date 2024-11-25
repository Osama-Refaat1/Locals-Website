<!DOCTYPE html>
<html>
  <head> 
@include('admin.css')



<style>
    .div_des{
        display:flex;
        justify-content: center;
        align-items: center;
        margin:30px;
    }
    input[type="text"]{
        width: 300px;
        height: 40px;
        padding: 10px;
        margin:10px;
    }
</style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
   
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <h1 style="color:white;">Update Category</h1>
            <div class="div_des">
                
                <form action="{{url('update_category', $category->id)}}" method="post">
                    @csrf
                    <input type="text" name="category" value="{{$category->category_name}}" id="">
                
                <input class="btn btn-primary" type="submit" value="Update Category">
                
                
                </form>
            </div>


          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>