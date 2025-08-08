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
        <h2 class="text-center mb-4">Edit Employee</h2>
        <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('employees.form')

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
