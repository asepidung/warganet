@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Customer Details</h3>
            </div>
            <div class="card-body">
               <p><strong>Name:</strong> {{ $customer->name }}</p>
               <p><strong>SSID:</strong> {{ $customer->ssid }}</p>
               <p><strong>WiFi Password:</strong> {{ $customer->wifi_password }}</p>
               <p><strong>Remote IP:</strong> {{ $customer->remote_ip }}</p>
               <p><strong>Router IP:</strong> {{ $customer->router_ip }}</p>
               <p><strong>Router User:</strong> {{ $customer->router_user }}</p>
               <p><strong>Router Password:</strong> {{ $customer->router_password }}</p>
               <p><strong>PPPoE User:</strong> {{ $customer->pppoe_user }}</p>
               <p><strong>PPPoE Password:</strong> {{ $customer->pppoe_password }}</p>
               <p><strong>Monthly Fee:</strong> {{ number_format($customer->monthly_fee, 2) }}</p>
            </div>
            <div class="card-footer">
               <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customer List</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection