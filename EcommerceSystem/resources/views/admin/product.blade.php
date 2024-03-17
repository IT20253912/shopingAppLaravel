<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('admin.css');

  <style type="text/css">
    .div_center {
      text-align: center;
      padding: 40px;
    }

    .center {
      margin: auto;
      width: 50%;
      text-align: center;
      border: 3px solid white;
    }
    label
    {
        display: inline-block;
        width: 200px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar');
    <!-- partial -->
    @include('admin.header');
    <!-- partial -->

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <div class="main-panel">
      <div class="content-wrapper">

      <div class="div_center">
        <h1>Add Product</h1>

        <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="div_design">
            <label>Product Title: </label>
            <input type="text" name="title" placeholder="Write a title">
        </div>
        <div  class="div_design">
            <label>Product Description: </label>
            <input type="text" name="description" placeholder="Write a Description">
        </div>
        <div class="div_design" >
            <label>Product price: </label>
            <input type="number" name="price" placeholder="Write a title">
        </div>
        <div class="div_design">
            <label>Discount: </label>
            <input type="number" name="dis_price" placeholder="Write a title">
        </div>
        <div class="div_design">
            <label>Product Quanitity: </label>
            <input type="number" name="quantity" min="0" placeholder="Write a title">
        </div>
     
        <div class="div_design">
                            <label>Categories: </label><br>
                            @foreach($catagory as $catagory)
                            <input type="checkbox" name="catagories[]" value="{{ $catagory->id }}"> {{ $catagory->catagory_name }}<br>
                            @endforeach
                        </div>
        <div class="div_design">
            <label>Product image: </label>
            <input type="file" name="image">
        </div>

        <div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
   

        </form>


      </div>

</div>
</div>
    
 
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  @include('admin.script');
</body>

</html>