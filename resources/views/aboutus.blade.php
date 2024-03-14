@extends('layouts.app')
@section('title', 'Dashboard')
@section('content_header')
<h1>About Us</h1>
@stop
@section('content')
{{-- masukkan kode komponen bootstrap di sini --}}
{{-- https://getbootstrap.com/docs/4.6/components/collapse/ --}}
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop
@section('content')
<div class="accordion" id="accordionExample">
    <div class="card">
    </div>
    <div class="card">
    </div>
    <div class="card">
    </div>
</div>
@stop 