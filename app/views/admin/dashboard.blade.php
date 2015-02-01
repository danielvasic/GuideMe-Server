@extends('admin.layout')

@section('content')
Dobrodošli {{ Auth::user()->username }}!
@stop
