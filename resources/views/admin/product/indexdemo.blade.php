@extends('layouts.admin');
@section('content')

@section('content')
    <x-admincontainer>
        <x-title route="admin.product.create" title="Product Management" />

        <div class="product-div"><x-productrow :products="$products" /></div>
        <link rel="stylesheet" href="{{asset('css/productindex.css')}}" />

    </x-admincontainer>
@endsection
