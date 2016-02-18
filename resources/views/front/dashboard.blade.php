@extends('layouts.master')
@section('sidebar')
    <h1>Dashboard</h1>

@stop
@section('content')
    <a href="{{url('product')}}">Product list</a>
@stop