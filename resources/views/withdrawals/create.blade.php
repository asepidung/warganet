@extends('layouts.main')

@section('title', 'Tambah Withdrawal')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-md-6 mt-3">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('withdrawals.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                     <label for="user_id">User</label>
                     <select name="user_id" id="user_id" class="form-control" required>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="amount">Jumlah Pengambilan</label>
                     <input type="number" name="amount" id="amount" class="form-control" required>
                  </div>

                  <div class="form-group">
                     <label for="withdrawal_date">Tanggal Pengambilan</label>
                     <input type="date" name="withdrawal_date" id="withdrawal_date" class="form-control" required>
                  </div>

                  <div class="form-group">
                     <label for="note">Catatan (Opsional)</label>
                     <textarea name="note" id="note" class="form-control"></textarea>
                  </div>

                  <button type="submit" class="btn btn-success">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection