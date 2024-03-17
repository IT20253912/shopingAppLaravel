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

       <!-- catagory.blade.php -->
<table class="center">
    <tr>
        <td>Category name</td>
        <td>Action</td>
    </tr>
    @foreach($mainCategories as $mainCategory)
        <tr>
            <td>{{ $mainCategory->catagory_name }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('edit_category', $mainCategory->id) }}">Edit</a>
                <a class="btn btn-danger" href="{{ url('delete_catagory', $mainCategory->id) }}">Delete</a>
            </td>
        </tr>
        @foreach($mainCategory->children as $subCategory)
            <tr>
                <td>-- {{ $subCategory->catagory_name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('edit_category', $subCategory->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('delete_catagory', $subCategory->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    @endforeach
</table>








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