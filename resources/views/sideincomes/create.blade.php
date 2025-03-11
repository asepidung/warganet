@extends('layouts.main')

@section('title', 'Add Side Income')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Side Income</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('sideincomes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
                            @error('date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" step="0.01" required>
                            @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <a href="{{ route('sideincomes.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Income</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection