@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12 mt-3">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Add New Customer</h3>
            </div>
            <div class="card-body">
               <form action="{{ route('customers.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="ssid">SSID</label>
                     <input type="text" name="ssid" id="ssid" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="wifi_password">WiFi Password</label>
                     <input type="text" name="wifi_password" id="wifi_password" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="remote_ip">Remote IP</label>
                     <input type="text" name="remote_ip" id="remote_ip" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="router_ip">Router IP</label>
                     <input type="text" name="router_ip" id="router_ip" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="router_user">Router User</label>
                     <input type="text" name="router_user" id="router_user" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="router_password">Router Password</label>
                     <input type="text" name="router_password" id="router_password" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="pppoe_user">PPPoE User</label>
                     <input type="text" name="pppoe_user" id="pppoe_user" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="pppoe_password">PPPoE Password</label>
                     <input type="text" name="pppoe_password" id="pppoe_password" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="monthly_fee">Monthly Fee</label>
                     <input type="number" name="monthly_fee" id="monthly_fee" class="form-control" step="0.01" required>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Save Customer</button>
                  <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Cancel</a>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection