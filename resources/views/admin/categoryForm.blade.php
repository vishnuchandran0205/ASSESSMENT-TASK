@extends('admin.master')
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category</h4>
        <p class="card-description">
          Add Category
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
        <form class="forms-sample" action="{{ url('/store_category_data')}}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Category Name</label>
            <input type="text" class="form-control" id="catName" name="catName" placeholder="Enter category name" required>
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>


@endsection