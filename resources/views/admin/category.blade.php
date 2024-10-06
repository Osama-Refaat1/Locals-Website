<!DOCTYPE html>
<html>
  <head> 
@include('admin.css')
<style type="text/css">
input[type="text"]{
  width: 300px;
  padding: 10px;
  margin: 10px;
}
.div_des{
  display:flex;
  justify-content: center;
  align-items: center;
  margin:30px;
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


          <h1 style="color:white">Add Category</h1>


          <div class="div_des">
         <form action="{{url('add_category')}}" method="post">
            @csrf
            <div>
                <input type="text" name="category_name">
                <input class="btn btn-primary" type="submit" value="Add category">
            </div>
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