@extends('admin.home')
@section('content')
<section class="content">
    <div class="row">
    <div class="col-xs-12">
        @if(count($products)===0)
            <!-- <div class="content-wrapper"> -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>    
                No results were found
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dropbox"></i>Product</a></li>
                <li><a href="#">Search</a></li>
                <li class="active">Not result</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="error-page">
                <!-- <h2 class="headline text-yellow">SORRY</h2> -->

                <div class="error-content">
                  <h3><i class="fa fa-warning text-yellow"></i> Not search result</h3>

                  <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="{{route('show')}}">return to product</a> or try using the search form.
                  </p>

                  <form class="search-form" method="get" role="search" action="{{ route('product.search') }}">
                    <div class="input-group">
                      <input type="text" name="key" class="form-control" placeholder="Search">

                      <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.input-group -->
                  </form>
                </div>
                <!-- /.error-content -->
              </div>
              <!-- /.error-page -->
            </section>
            <!-- /.content -->
            <!-- </div> -->
            @else
      <div class="box">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Controll Product</h3>
        </div>
        <div class="row">
            <a href="{{ route('create') }}" type="button" class="btn btn-success" style="margin-left: 20px;" ><span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Create</a>
            <form class="navbar-form navbar-right" method="get" role="search" action="{{ route('product.search') }}" style="margin-right: 20px;">
                <div class="form-group">
                    <input type="text" name="key" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-info">Search</button>
                </div>
            </form>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
            <h3>Total products: <b>{{ count($products) }}</b></h3>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro)
                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->image }}</td>
                        <td>
                            <button  type="button" class="btn btn-warning"><span class="fa fa-pencil-square-o" style="margin-right: 5px;"></span>Update</button>
                            <!-- <form action="{{ route('product.delete',$pro ->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash" style="margin-right: 5px;"></span>Delete
                                </button>
                            </form> -->
                            <a href="{{ route('product.delete',$pro->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" style="margin-right: 5px;"></span>Delete</a>
                            <a href="{{ route('product.details',$pro->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-folder-open" style="margin-right: 5px;"></span>View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          @endif
            <div style="text-align: center;">
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
  <!-- /.row -->
</section>
@stop