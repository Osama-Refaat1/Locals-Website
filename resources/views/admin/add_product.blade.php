<!DOCTYPE html>
<html>
  <head> 
@include('admin.css')

    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1 {
            color:white;
        }

        label {
            display: inline-block;
            width: 200px;
            font-size:20px!important ;
            color: white!important;
        }

        input[type='text'] {

            width: 350px;
            height: 50px;
        }

        textarea {
            width: 450px;
            height: 80px;
        }

        .input_des {
            padding: 15px;
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

        <h1>Add Product</h1>
          <div class="div_deg">

            <form action="{{url('upload_product')}}" 
            method="post" enctype="multipart/form-data">

            @csrf
                <div class="input_des">
                    <label for="">Product Title</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="input_des">
                    <label for="">Description</label>
                     <textarea name="description" id="description" required></textarea>
                </div class="input_des">
                
                <div class="input_des">
                    <button type="button" class="btn btn-primary" id="generate-description">Generate Description</button>
                </div>

                <div class="input_des">
                    <label for="">Product Price</label>
                    <input type="text" name="price" required>
                </div>

                <div class="input_des" >
                    <label for="">Quantity</label>
                    <input type="number" name="qty" required>
                </div>

                <div class="input_des">
                    <label for="">Category</label>
                    <select name="category" required>
                        <option value="">Select an option </option>
                        
                        @foreach ( $categories as $category )
                        <option id="category" value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="input_des">
                    <label for="">Product Title</label>
                    <input type="file" name="image">
                </div>


                <div class="input_des">
                    <input class="btn btn-success" type="submit" value="Add Product">
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

<script>
 document.getElementById('generate-description').addEventListener('click',  () => {
    var title = document.getElementById('title').value;
    var category = document.getElementById('category').value; // Ensure you are getting the category as well

    if (title && category) {  // Make sure both title and category are provided
       
        fetch('/generate_description', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                title: title,
                category: category  // Include category in the request
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.description) {
                // Update the description field with the generated text
                document.getElementById('description').textContent = data.description;
            } else {
                console.error('No description received');
                alert('Error: No description received from the server.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error generating the description. Please try again.');
        });
    } else {
        alert('Please enter both title and category.');
    }
});



</script>
  </body>
</html>