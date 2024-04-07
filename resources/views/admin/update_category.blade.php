@extends('admin.master')
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category</h4>
        <p class="card-description">
          Update Category
        </p>
       
        <form class="forms-sample" action="{{ url('/update_category_data')}}" method="POST">
            @csrf
            @foreach ($SingleCat as $item)
                <input type="hidden" name="id" value="{{$item->id}}">
           
          <div class="form-group">
            <label for="exampleInputName1">Category Name</label>
            <input type="text" class="form-control" id="catName" name="catName" value="{{$item->name}}" placeholder="Enter category name" required>
          </div>
          @endforeach
          
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>


@endsection