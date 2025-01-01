@extends('layouts.main')

@section('title', 'Customers')

@section('content')
<div class="container-fluid">
   <div class="col-lg">
      <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm mt-2 mb-2">Add Customer</a>
      <div class="card">
         <div class="card-body">
            <table id="example1" class="table table-bordered table-sm table-striped">
               <thead>
                  <tr class="text-center">
                     <th>#</th>
                     <th>Name</th>
                     <th>SSID</th>
                     <th>Pass Wifi</th>
                     <th>Remote Address</th>
                     <th>Monthly Fee</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody class="text-right">
                  @foreach ($customers as $customer)
                  <tr>
                     <td class="text-center">{{ $loop->iteration }}</td>
                     <td class="text-left">{{ $customer->name }}</td>
                     <td class="text-left">{{ $customer->ssid }}</td>
                     <td class="text-left">{{ $customer->pass_wifi }}</td>
                     <td class="text-left">{{ $customer->remote_address }}</td>
                     <td>{{ number_format($customer->monthly_fee,2) }}</td>
                     <td class="text-center">
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm" title="View"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection