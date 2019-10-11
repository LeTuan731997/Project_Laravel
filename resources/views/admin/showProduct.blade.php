@extends('admin.home')
@section('content')
<section class="content">
    <div class="row">
    <div class="col-xs-12">
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
            <h3>Total products: <b>{{ count($getAllProducts) }}</b></h3>
          <table id="example12" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th class="col-sm-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pro)
                <tr>
                    <td>{{ $pro->id }}</td>
                    <td>{{ $pro->name }}</td>
                    <td>{{ $pro->image }}</td>
                    <td>
                        <a href="{{ route('product.update',$pro->id) }}" type="button" class="btn btn-warning"><span class="fa fa-pencil-square-o" style="margin-right: 5px;"></span>Update</a>
                        <a href="{{ route('product.delete',$pro->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" style="margin-right: 5px;"></span>Delete</a>
                        <a href="{{ route('product.details',$pro->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-folder-open" style="margin-right: 5px;"></span>View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
            <div style="text-align: center;">
                {!! $products ->render() !!}
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