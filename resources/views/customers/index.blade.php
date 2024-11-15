<!-- resources/views/customers/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12 mt-3">
         <!-- Mulai Card -->
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Customer List</h3>
               <div class="card-tools">
                  <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">Add New Customer</a>
               </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
               <!-- Flash message -->
               @if (session('success'))
               <div class="alert alert-success mt-2">{{ session('success') }}</div>
               @endif

               <table class="table table-sm table-striped table-bordered mt-2">
                  <thead>
                     <tr class="text-center">
                        <th>Name</th>
                        <th>SSID</th>
                        <th>WiFi Password</th>
                        <th>Monthly Fee</th>
                        <th>Bill Total</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     @foreach ($customers as $customer)
                     <tr>
                        <td class="text-left">{{ $customer->name }}</td>
                        <td>{{ $customer->ssid }}</td>
                        <td>{{ $customer->wifi_password }}</td>
                        <td class="text-right">{{ number_format($customer->monthly_fee, 2) }}</td>
                        <td class="text-right"></td> <!-- Placeholder untuk Bill Total -->
                        <td>
                           <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-sm btn-info">View</a>
                           <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                           <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                           </form>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
               <!-- Footer Card (Opsional) -->
               Total Customers: {{ $customers->count() }}
            </div>
         </div>
         <!-- /.card -->
      </div>
   </div>
</div>
@endsection