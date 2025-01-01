@extends('layouts.main')

@section('title', 'Edit Customer')

@section('content')
<div class="container-fluid">
   <div class="row">
      <!-- Kolom kiri -->
      <div class="col-md-6 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Customer Information</h3>
            </div>
            <div class="card-body">
               <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
                  </div>
                  <div class="form-group">
                     <label for="ssid">SSID</label>
                     <input type="text" name="ssid" id="ssid" class="form-control" value="{{ $customer->ssid }}" required>
                  </div>
                  <div class="form-group">
                     <label for="pass_wifi">Pass Wifi</label>
                     <input type="text" name="pass_wifi" id="pass_wifi" class="form-control" value="{{ $customer->pass_wifi }}" required>
                  </div>
                  <div class="form-group">
                     <label for="ip_router">IP Router</label>
                     <input type="text" name="ip_router" id="ip_router" class="form-control" value="{{ $customer->ip_router }}" required>
                  </div>
                  <div class="form-group">
                     <label for="monthly_fee">Monthly Fee</label>
                     <input type="number" name="monthly_fee" id="monthly_fee" class="form-control" value="{{ $customer->monthly_fee }}" required>
                  </div>
            </div>
         </div>
      </div>

      <!-- Kolom kanan -->
      <div class="col-md-6 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Router & PPPoE</h3>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label for="user_router">User Router</label>
                  <input type="text" name="user_router" id="user_router" class="form-control" value="{{ $customer->user_router }}" required>
               </div>
               <div class="form-group">
                  <label for="pass_router">Pass Router</label>
                  <input type="text" name="pass_router" id="pass_router" class="form-control" value="{{ $customer->pass_router }}" required>
               </div>
               <div class="form-group">
                  <label for="user_pppoe">User PPPoE</label>
                  <input type="text" name="user_pppoe" id="user_pppoe" class="form-control" value="{{ $customer->user_pppoe }}" required>
               </div>
               <div class="form-group">
                  <label for="pass_pppoe">Pass PPPoE</label>
                  <input type="text" name="pass_pppoe" id="pass_pppoe" class="form-control" value="{{ $customer->pass_pppoe }}" required>
               </div>
               <div class="form-group">
                  <label for="remote_address">Remote Address</label>
                  <input type="text" name="remote_address" id="remote_address" class="form-control" value="{{ $customer->remote_address }}">
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Tombol Update di bawah -->
   <div class="col-md-12 mt-3">
      <button type="submit" class="btn btn-block btn-primary">Update</button>
   </div>
   </form>
</div>
@endsection