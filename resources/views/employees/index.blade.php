@extends('layouts.app')

@section('content')

<style>
    .listcss {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 40px;
        background-color: #fff;
        border-radius: 8px;
    }
    .thumb-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }
    .sort-link {
        color: white;
        text-decoration: underline;
    }
</style>

<div class="container py-5"> 
    <div class="listcss">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Employee List</h2>
            <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
        </div>

        <form method="GET" class="mb-4">
            <div class="row row-cols-1 row-cols-md-5 g-2">
                <div class="col">
                    <input type="text" name="firstname" class="form-control form-control-sm" placeholder="Firstname" value="{{ request('firstname') }}">
                </div>
                <div class="col">
                    <input type="text" name="lastname" class="form-control form-control-sm" placeholder="Lastname" value="{{ request('lastname') }}">
                </div>
                <div class="col">
                    <input type="text" name="email" class="form-control form-control-sm" placeholder="Email" value="{{ request('email') }}">
                </div>
                <div class="col">
                    <input type="text" name="phone" class="form-control form-control-sm" placeholder="Phone" value="{{ request('phone') }}">
                </div>
                <div class="col d-flex">
                    <button type="submit" class="btn btn-primary btn-sm me-2">Search</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                </div>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center table-sm">
            <thead class="table-dark">
                <tr>
                    <th>S.No</th>
                    <th>
                        <a href="{{ route('employees.index', ['sort_by' => 'firstname', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page'])) }}" class="sort-link">
                            Firstname @if(request('sort_by') === 'firstname') ({{ request('order') }}) @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('employees.index', ['sort_by' => 'lastname', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page'])) }}" class="sort-link">
                            Lastname @if(request('sort_by') === 'lastname') ({{ request('order') }}) @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('employees.index', ['sort_by' => 'email', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page'])) }}" class="sort-link">
                            Email @if(request('sort_by') === 'email') ({{ request('order') }}) @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('employees.index', ['sort_by' => 'phone', 'order' => request('order') === 'asc' ? 'desc' : 'asc'] + request()->except(['page'])) }}" class="sort-link">
                            Phone @if(request('sort_by') === 'phone') ({{ request('order') }}) @endif
                        </a>
                    </th>
                    <th>Photo</th>
                    <th>Resume</th>
                    <th>Actions</th>
                </tr>
            </thead>

            @php $i = ($employees->currentPage() - 1) * $employees->perPage() + 1; @endphp
            <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            @if($employee->photo)
                                <img src="{{ asset('storage/' . $employee->photo) }}" class="thumb-img" alt="Photo">
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($employee->resume)
                                <a href="{{ asset('storage/' . $employee->resume) }}" target="_blank" class="btn btn-sm btn-outline-info">View</a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('employees.show', $employee) }}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No employees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $employees->links() }}
        </div>
    </div>
</div>

@endsection
