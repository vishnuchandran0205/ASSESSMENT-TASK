@extends('admin.master')
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Product</h4>
        <p class="card-description">
          Update Product
        </p>
       
        <form class="forms-sample" action="{{ url('/product_update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($ProductData as $data)
                
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="form-group">
                <label for="cat_id">Category Name</label>
                <select class="form-control dropdown" id="cat_id" name="cat_id" required>
                    <option selected disabled>Category Name</option>
                    @foreach ($getCategoryNames as $item)
                        <option value="{{$item->id}}" {{ $data->category_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
          <div class="form-group">
            <label for="exampleInputName1">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" value="{{$data->name}}" placeholder="Enter product name" required>
          </div>
          <div class="form-group">
            <label for="image">Product Image Old</label>
            @if ($data->image)
            <input type="hidden" name="imageold" value="{{ $data->image }}">
            <img src="{{ asset('productImage/' . $data->image) }}" alt="Product Image" style="max-width: 100px;">
            <br>
            
            @endif
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" id="Description" name="Description" rows="4">{{$data->description}}</textarea>
          </div>
          @endforeach
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>


@endsection