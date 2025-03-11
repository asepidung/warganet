@extends('layouts.main')

@section('title', 'Side Incomes')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md mt-3">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Side Incomes</h3>
                    <a href="{{ route('sideincomes.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Add Income
                    </a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sideincomes as $sideincome)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sideincome->date }}</td>
                                <td class="text-right">{{ number_format($sideincome->amount, 2) }}</td>
                                <td class="text-left">{{ $sideincome->description }}</td>
                                <td>
                                    <a href="{{ route('sideincomes.edit', $sideincome->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('sideincomes.destroy', $sideincome->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this income?')" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection