@extends('layouts.app')

@section('page-title', 'Compra')

@section('navbar-logo', 'Havla - Compra')

@section('breadcrumbs')
    <a href="{{ route('compras.index') }}" class="breadcrumb">Registrar Compra</a>
    <a class="breadcrumb">Edit</a>
@endsection
