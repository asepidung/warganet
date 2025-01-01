@extends('layouts.main')

@section('title', 'Billing Details')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-6 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Bill Details for {{ $bill->customer->name }}</h3>
            </div>
            <div class="card-body">
               <p><strong>Bill Total:</strong> {{ number_format($bill->bill_total, 2) }}</p>
               <p><strong>Status:</strong> {{ $bill->status }}</p>
               @if($bill->status === 'no_payment')
               <p class="text-warning">This bill has not been paid yet.</p>
               @elseif($bill->status === 'partial_payment')
               <p class="text-info">Partial payment made. Remaining balance: {{ number_format($bill->bill_total, 2) }}</p>
               @elseif($bill->status === 'fully_paid')
               <p class="text-success">This bill has been fully paid.</p>
               @endif

               <form action="{{ route('billing.storePayment', $bill->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                     <label for="payment">Payment Amount:</label>
                     <input type="number" name="payment" class="form-control" placeholder="Enter payment" required>
                  </div>
                  <div class="form-group">
                     <label for="discount">Discount (optional):</label>
                     <input type="number" name="discount" class="form-control" placeholder="Enter discount">
                  </div>
                  <div class="row">
                     <div class="col-4">
                        <a href="{{ route('billing.index') }}" class="btn btn-warning btn-block"><i class="fas fa-arrow-circle-left"></i> Back</a>
                     </div>
                     <div class="col">
                        <button type="submit" class="btn btn-success btn-block">Submit Payment</button>
                     </div>
                  </div>

               </form>
            </div>
         </div>

         @if ($bill->payments && $bill->payments->isNotEmpty())
         <div class="card mt-3">
            <div class="card-header">
               <h3 class="card-title">Payment History</h3>
            </div>
            <div class="card-body">
               <ul>
                  @foreach ($bill->payments as $payment)
                  <li>
                     <strong>Amount:</strong> {{ number_format($payment->payment, 2) }}
                     <strong>Status:</strong> {{ $payment->status }}
                     @if ($payment->status === 'waiting')
                     <form action="{{ route('billing.confirmPayment', $payment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                     </form>
                     @endif
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
         @endif

      </div>
   </div>
</div>
@endsection