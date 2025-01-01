@extends('layouts.main')

@section('title', 'Edit Expense')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-md-6 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Edit Expense</h3>
               <a href="{{ route('expenses.index') }}" class="btn btn-secondary float-right">Back to List</a>
            </div>
            <div class="card-body">
               <!-- Form untuk mengedit pengeluaran -->
               <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                  @csrf
                  @method('PUT') <!-- Menandakan bahwa ini adalah request PUT -->

                  <!-- Deskripsi Pengeluaran -->
                  <div class="form-group">
                     <label for="description">Description</label>
                     <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $expense->description) }}" required>
                     @error('description')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <!-- Jumlah Pengeluaran -->
                  <div class="form-group">
                     <label for="amount">Amount</label>
                     <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $expense->amount) }}" required>
                     @error('amount')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>

                  <!-- Tombol Update -->
                  <button type="submit" class="btn btn-primary">Update Expense</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection