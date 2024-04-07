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
                    Product Name
                  </th>
                  <th>
                    Product Image
                  </th>
                  <th>
                    Description
                  </th>
                <th>
                  Action
                </th>
               
              </tr>
            </thead>
            <tbody>
                @if(isset($getProductData))
                @php $i = 1; @endphp
                @foreach ($getProductData as $item)
                    
                
              <tr>
                <td>
                    {{ $i++ }}
                </td>
                <td>
                  {{$item->catName}}
                </td>
                <td>
                    {{$item->name}}
                  </td>
                  <td>
                    <div class="rounded-circle" style="overflow: hidden; width: 50px; height: 50px;">
                        <img src="/productImage/{{ $item->image }}" alt="Product Image" style="width: 100%; height: auto;">
                    </div>
                  </td>
                  <td>
                    {{$item->description}}
                  </td>
                <td>
                 {{-- <?php echo $item->id; ?> --}}
                 <a href="/product_update{{$item->id}}"><button class="button" style="color: white;background-color:blue">Update</button></a>&nbsp; 
                 <a href="/delete_products{{$item->id}}"><button class="button" style="color: white;background-color:red">Delete</button></a> 
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