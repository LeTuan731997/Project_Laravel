@extends('admin.home')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Create Product</h3>
	</div>
	@if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
	<form action="{{ route('store') }}" enctype="multipart/form-data" method="POST" role="form">
			{{ csrf_field() }}
		<div class="box-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Name product</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name product">
			</div>
			<div class="form-group">
				<label for="exampleInputFile">Image</label>
				<input type="file" name="image" id="exampleInputFile">
			</div>
		</div>
		<div class="box-footer">
		<button type="submit" class="btn btn-success">Create</button>
		</div>
	</form>
</div>
@stop