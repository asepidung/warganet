@extends('layouts.main')

@section('title', 'Payments List')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-6 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Payments List</h3>
            </div>
            <div class="card-body">
               <table id="example1" class="table table-bordered table-sm table-striped">
                  <thead>
                     <tr class="text-center">
                        <th>#</th>
                        <th>Customer Name</th> <!-- Menampilkan Nama Customer -->
                        <th>Paid At</th>
                        <th>Amount</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th>Cashier</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($payments as $payment)
                     <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $payment->customer ? $payment->customer->name : 'N/A' }}</td> <!-- Nama Customer -->
                        <td>{{ $payment->paid_at ? \Carbon\Carbon::parse($payment->paid_at)->format('d-M-y') : '-' }}</td>
                        <td class="text-right">{{ number_format($payment->payment, 2) }}</td>
                        <td class="text-right">{{ $payment->discount ? number_format($payment->discount, 2) : '-' }}</td>
                        <td>
                           @if ($payment->status == 'waiting')
                           @auth
                           @if(Auth::id() == 1)
                           <!-- Form untuk mengonfirmasi pembayaran jika statusnya "waiting" -->
                           <form action="{{ route('billing.confirmPayment', $payment->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-link text-warning" style="text-decoration: none;">
                                 Waiting
                              </button>
                           </form>
                           @else
                           <span class="text-warning">Waiting</span>
                           @endif
                           @endauth
                           @else
                           <span class="text-success">Confirmed</span>
                           @endif
                        </td>
                        <td>{{ $payment->user ? $payment->user->name : 'N/A' }}</td> <!-- Nama User -->
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