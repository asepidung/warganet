@extends('layouts.main')

@section('title', 'Expense Reports')

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
               <h3 class="card-title">Expense Reports</h3>
               <!-- Menonaktifkan tombol jika user bukan id 1 -->
               @auth
               @if(Auth::id() == 1)
               <a href="{{ route('expenses.create') }}" class="btn btn-primary float-right">
                  <i class="fas fa-coins"></i> New Expense
               </a>
               @else
               <button class="btn btn-primary float-right" disabled>
                  <i class="fas fa-coins"></i> New Expense
               </button>
               @endif
               @endauth
            </div>
            <div class="card-body">
               <table id="example1" class="table table-sm table-bordered table-striped">
                  <thead>
                     <tr class="text-center">
                        <th>#</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($expenses as $expense)
                     <tr class="text-center">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $expense->description }}</td>
                        <td class="text-right">{{ number_format($expense->amount, 2) }}</td>
                        <td>{{ $expense->created_at->format('d-M-y') }}</td>
                        <td>{{ $expense->user->name }}</td> <!-- Menampilkan nama user -->
                        <td>
                           @auth
                           @if(Auth::id() == 1)
                           <!-- Tombol edit dan delete hanya aktif untuk admin -->
                           <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                           <!-- Form untuk delete -->
                           <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this expense?')" title="Delete"><i class="fas fa-trash-alt"></i></button>
                           </form>
                           @else
                           <!-- Tombol edit dan delete dalam keadaan disabled -->
                           <button class="btn btn-warning btn-sm" disabled><i class="fas fa-pencil-alt"></i> Edit</button>
                           <button class="btn btn-danger btn-sm" disabled><i class="fas fa-trash-alt"></i> Delete</button>
                           @endif
                           @endauth
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