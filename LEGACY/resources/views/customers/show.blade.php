@extends('layouts.main')

@section('title', 'Customer Details')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-md-6 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Customer Details</h3>
            </div>
            <div class="card-body">
               <p><strong>Name:</strong> {{ $customer->name }}</p>
               <p><strong>SSID:</strong> {{ $customer->ssid }}</p>
               <p><strong>Pass Wifi:</strong> {{ $customer->pass_wifi }}</p>
               <p><strong>IP Router:</strong> {{ $customer->ip_router }}</p>
               <p><strong>User Router:</strong> {{ $customer->user_router }}</p>
               <p><strong>Pass Router:</strong> {{ $customer->pass_router }}</p>
               <p><strong>User PPPoE:</strong> {{ $customer->user_pppoe }}</p>
               <p><strong>Pass PPPoE:</strong> {{ $customer->pass_pppoe }}</p>
               <p><strong>Remote Address:</strong> {{ $customer->remote_address }}</p>
               <p><strong>Monthly Fee:</strong> {{ number_format($customer->monthly_fee,2) }}</p>
            </div>
            <div class="card-footer">
               <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection