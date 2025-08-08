@extends('layouts.app')
@section('content')

<style>
    .form-box {
        max-width: 700px;
        margin: 0 auto;
        padding: 40px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        background-color: #fff;
        border-radius: 10px;
    }
</style>

<div class="container">
    <div class="form-box">
        <h2 class="text-center mb-4">Add Employee</h2>
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('employees.form')
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
