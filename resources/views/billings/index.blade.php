@extends('layouts.main')

@section('title', 'Billing List')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-8 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Billing List</h3>
            </div>
            <div class="card-body">
               @if (!$billsGenerated)
               <!-- Tombol Generate Bill hanya muncul jika tagihan bulan ini belum digenerate -->
               <form action="{{ route('billing.generate') }}" method="POST" onsubmit="return confirm('Generate bills for this month?');">
                  @csrf
                  <button type="submit" class="btn btn-primary mb-3">
                     <i class="fas fa-file-invoice"></i> Generate Bills
                  </button>
               </form>
               @else
               <div class="alert alert-info">
                  <strong>Info:</strong> Bills for this month have already been generated.
               </div>
               @endif

               <table class="table table-bordered table-striped table-sm">
                  <thead class="thead-dark">
                     <tr class="text-center">
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Bill Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($customers as $customer)
                     @php
                     $last = $customer->last_bill;
                     $total = $last->bill_total ?? 0;
                     $status = $last->status ?? 'no_payment';
                     @endphp
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $customer->name }}</td>
                        <td class="text-right">{{ number_format($total, 2) }}</td>
                        <td>{{ \App\Http\Controllers\BillingController::formatStatus($status) }}</td>
                        <td class="text-center">
                           @if ($last)
                           @if ($status === 'fully_paid')
                           <button class="btn btn-secondary btn-sm" disabled>
                              <i class="fas fa-money-bill-wave"></i> Pay
                           </button>
                           @else
                           <a href="{{ route('billing.show', $last->id) }}" class="btn btn-info btn-sm">
                              <i class="fas fa-money-bill-wave"></i> Pay
                           </a>
                           @endif
                           @else
                           <span class="text-muted"><i class="fas fa-money-bill-wave"></i></span>
                           @endif
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