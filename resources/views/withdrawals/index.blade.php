@extends('layouts.main')

@section('title', 'Withdrawal')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-md-8 mt-3">
         @if(session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
         @endif
         <div class="card">
            <div class="card-header">
               @auth
               @if(Auth::id() == 1)
               <a href="{{ route('withdrawals.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Withdraw</a>
               @else
               <button class="btn btn-primary" disabled><i class="fas fa-plus-circle"></i> Withdraw</button>
               @endif
               @endauth
            </div>
            <div class="card-body">
               <table id="example1" class="table table-sm table-bordered table-striped">
                  <thead>
                     <tr class="text-center">
                        <th>#</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Withdrawal Date</th>
                        <th>Note</th>
                        <th>Action</th> <!-- Kolom baru -->
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($withdrawals as $withdrawal)
                     <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $withdrawal->user->name }}</td>
                        <td class="text-right">{{ number_format($withdrawal->amount, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($withdrawal->withdrawal_date)->format('d-M-y') }}</td>
                        <td class="text-left">{{ $withdrawal->note }}</td>
                        <td>
                           @auth
                           @if(Auth::id() == 1)
                           <form action="{{ route('withdrawals.destroy', $withdrawal->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                 <i class="fas fa-trash"></i> Hapus
                              </button>
                           </form>
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