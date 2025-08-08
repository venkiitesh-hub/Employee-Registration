@extends('layouts.app')
@section('content')

<style>
    .details-box {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        background-color: #fff;
        border-radius: 10px;
    }

    .details-label {
        font-weight: bold;
        width: 200px;
    }

    .details-row {
        border-bottom: 1px solid #e0e0e0;
        padding: 10px 0;
    }

    .details-photo {
        width: 100px;
        height: 120px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
</style>

<div class="container">
    <div class="details-box">
        <h2 class="text-center mb-4">Employee Details</h2>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Name:</div>
            <div class="col-md-8">{{ $employee->firstname }} {{ $employee->lastname }}</div>
        </div>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Date of Birth:</div>
            <div class="col-md-8">{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('d/m/Y') }}</div>
            </div>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Education:</div>
            <div class="col-md-8">{{ $employee->education_qualification }}</div>
        </div>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Email:</div>
            <div class="col-md-8">{{ $employee->email }}</div>
        </div>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Phone:</div>
            <div class="col-md-8">{{ $employee->phone }}</div>
        </div>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Address:</div>
            <div class="col-md-8">{{ $employee->address }}</div>
        </div>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Photo:</div>
            <div class="col-md-8">
                @if($employee->photo)
                    <img src="{{ asset('storage/' . $employee->photo) }}" class="details-photo" alt="Photo">
                @else
                    <span class="text-muted">No photo uploaded.</span>
                @endif
            </div>
        </div>

        <div class="row mb-3 details-row">
            <div class="col-md-4 details-label">Resume:</div>
            <div class="col-md-8">
                @if($employee->resume)
                    <a href="{{ asset('storage/' . $employee->resume) }}" target="_blank">View Resume</a>
                @else
                    <span class="text-muted">No resume uploaded.</span>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
