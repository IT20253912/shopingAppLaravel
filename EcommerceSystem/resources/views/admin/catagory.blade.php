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

        @if(session()->has('message'))

        <div class="alert alert-success">
          <button type="buttton" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{session()->get('message')}}
        </div>

        @endif

        <div class="div_center">
          <h2>Add Catagory</h2>



          <form action="{{ url('/add_catagory') }}" method="POST">
            @csrf
            <input type="text" name="catagory" placeholder="write category name">
            <select name="parent_id">
              <option value="">Main Category</option>
              @foreach($mainCategories as $category)
              <option value="{{ $category->id }}">{{ $category->catagory_name }}</option>
              @endforeach
            </select>
            <input type="submit" value="Add" class="btn btn-primary" name="submit">
          </form>



        </div>







      </div>

    </div>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  @include('admin.script');
</body>

</html>