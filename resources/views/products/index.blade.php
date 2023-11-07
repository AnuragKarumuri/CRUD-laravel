<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Laravel CRUD</title>
    <style>
    body {
        background-color:yellow;
    }
        .navbar {
            background-color: black;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }
       .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        table {
            background-color: #fff;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table td {
            border-bottom: 1px solid #ccc;
        }

        .rounded-circle {
            border-radius: 50%;
        }
        h1{
          text-align:center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark">

<!-- Links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link text-light" href="/">ITEMS</a>
  </li>
</ul>

</nav>
    <div class="container">
      <div class="text-right">
        <a href="product/create" class="btn btn-dark mt-2">New Items</a>
      </div>  


  <table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
    <tr>
        <td>{{ $loop->index+1 }}</td>
        <td><a href="product/{{$product->id}}/show" class="text-dark">{{ $product->name }}</a></td>
        <td>
        <img src="products/{{ $product->image }}" class="rounded-circle" width="70" height="50"/>   
      </td>
        <td>
        <a href="product/{{ $product->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
        <!-- <a href="product/{{ $product->id }}/delete" class="btn btn-danger btn-sm">Delete</a> -->
        <form method="POST" class="d-inline" action="product/{{$product->id}}/delete">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
</body>
</html>