@extends('admin.home')
@section('content')
<div class="box box-primary">
	<h1>Product name: <b>{{$product->name}}</b></h1>
	<img src="{{$product->image}}" alt="" style="width: 50%;">
</div>
@stop