@extends('admin.master')
@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Categories</h4>
        <p class="card-description">
          We Have
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
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                 Slno
                </th>
                <th>
                  Category Name
                </th>
                <th>
                  Action
                </th>
               
              </tr>
            </thead>
            <tbody>
                @if(isset($getCat))
                @php $i = 1; @endphp
                @foreach ($getCat as $item)
                    
                
              <tr>
                <td>
                    {{ $i++ }}
                </td>
                <td>
                  {{$item->name}}
                </td>
                <td>
                 <a href="/update_form{{$item->id}}"><button class="button" style="color: white;background-color:blue">Update</button></a>&nbsp; 
                 <a href="/delete_cat{{$item->id}}"><button class="button" style="color: white;background-color:red">Delete</button></a> 
                </td>
                
              </tr>
              @endforeach
           @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection