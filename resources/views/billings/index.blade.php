@extends('layouts.main')

@section('title', 'Billing List')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-6 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Billing List</h3>
            </div>
            <div class="card-body">
               @if (!$billsGenerated)
               <!-- Tombol Generate Bill hanya muncul jika tagihan bulan ini belum digenerate -->
               <form action="{{ route('billing.generate') }}" method="POST">
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

               <table id="example1" class="table table-bordered table-striped table-sm">
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
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $customer->name }}</td>
                        <td class="text-right">{{ number_format($customer->bills->last()->bill_total ?? 0, 2) }}</td>

                        <!-- Menampilkan status tagihan dengan format yang lebih user-friendly -->
                        <td>{{ app(App\Http\Controllers\BillingController::class)->formatStatus($customer->bills->last()->status ?? 'no_payment') }}</td>

                        <td class="text-center">
                           @if ($customer->bills->last())
                           @if ($customer->bills->last()->status === 'fully_paid')
                           <!-- Jika status tagihan adalah fully_paid, tampilkan tombol Pay yang dinonaktifkan -->
                           <button class="btn btn-secondary btn-sm" disabled>
                              <i class="fas fa-money-bill-wave"></i> Pay
                           </button>
                           @else
                           <!-- Jika status tagihan adalah no_payment atau partial_payment, tampilkan tombol Pay yang aktif -->
                           <a href="{{ route('billing.show', $customer->bills->last()->id) }}" class="btn btn-info btn-sm">
                              <i class="fas fa-money-bill-wave"></i> Pay
                           </a>
                           @endif
                           @else
                           <span class="text-muted"> <i class="fas fa-money-bill-wave"></i></span>
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