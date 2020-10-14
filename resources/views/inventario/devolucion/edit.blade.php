@extends('layouts.app')

@section('page-title', 'Devolución')

@section('navbar-logo', 'Havla - Devolución')

@section('breadcrumbs')
    <a href="{{ route('devoluciones.index') }}" class="breadcrumb">Registrar Devolución</a>
    <a class="breadcrumb">Edit</a>
@endsection
