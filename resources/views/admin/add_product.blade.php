@extends('admin.master')
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Product</h4>
        <p class="card-description">
          Add Product
        </p>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        @if ($errors->any())
               <div class="alert alert-danger">
                      <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
               @endif
        <form class="forms-sample" action="{{ url('/store_product_data')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="cat_id">Category Name</label>
                <select class="form-control dropdown" id="cat_id" name="cat_id" required>
                    <option selected disabled>Category Name</option>
                    @foreach ($getCategoryNames as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
          <div class="form-group">
            <label for="exampleInputName1">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
          </div>
          <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>
        
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" id="Description" name="Description" rows="4"></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>


@endsection