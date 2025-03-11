@extends('layouts.main')

@section('content')
<div class="container-fluid">
   <div class="row">
      <!-- Small Box: KAS -->
      <div class="col-lg-3 col-6 mt-3">
         <div class="small-box bg-info">
            <div class="inner">
               <h4>{{ number_format($kas, 2) }}</h4> <!-- Saldo Kas -->
               <p>KAS</p>
            </div>
            <div class="icon">
               <i class="ion ion-bag"></i>
            </div>
            <span class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></span>
         </div>
      </div>

      <!-- Small Box: Total Payments -->
      <div class="col-lg-3 col-6 mt-3">
         <div class="small-box bg-success">
            <div class="inner">
               <h4>{{ number_format($totalPayments, 2) }}</h4> <!-- Total Payments -->
               <p>Total Payments</p>
            </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('payments.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Total Expenses -->
      <div class="col-lg-3 col-6 mt-3">
         <div class="small-box bg-warning">
            <div class="inner">
               <h4>{{ number_format($totalExpenses, 2) }}</h4> <!-- Total Expenses -->
               <p>Total Expenses</p>
            </div>
            <div class="icon">
               <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('expenses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Total Withdrawals -->
      <div class="col-lg-3 col-6 mt-3">
         <div class="small-box bg-danger">
            <div class="inner">
               <h4>{{ number_format($totalWithdrawalsUser1 + $totalWithdrawalsUser2, 2) }}</h4> <!-- Total Withdrawals -->
               <p>Total Withdrawals</p>
            </div>
            <div class="icon">
               <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('withdrawals.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
   </div>

   <!-- Row 2 - Bulan Ini -->
   <div class="row">
      <!-- Small Box: Total Payments This Month -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-info">
            <div class="inner">
               <h4>{{ number_format($totalPaymentsThisMonth, 2) }}</h4>
               <p>Total Payments This Month</p>
            </div>
            <div class="icon">
               <i class="fas fa-credit-card"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Total Expenses This Month -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-success">
            <div class="inner">
               <h4>{{ number_format($totalExpensesThisMonth, 2) }}</h4>
               <p>Total Expenses This Month</p>
            </div>
            <div class="icon">
               <i class="fas fa-wallet"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Total Discount This Month -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-warning">
            <div class="inner">
               <h4>{{ number_format($totalDiscountThisMonth, 2) }}</h4>
               <p>Total Discount This Month</p>
            </div>
            <div class="icon">
               <i class="fas fa-percent"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Total Payment Waiting -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-danger">
            <div class="inner">
               <h4>{{ number_format($totalPaymentsWaiting, 2) }}</h4>
               <p>Total Payment Waiting</p>
            </div>
            <div class="icon">
               <i class="fas fa-clock"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
   </div>

   <!-- Row 3 - Withdrawals User -->
   <div class="row">
      <!-- Small Box: Withdrawals User 1 -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-info">
            <div class="inner">
               <h4>{{ number_format($totalWithdrawalsUser1, 2) }}</h4>
               <p>Total Withdrawals {{ $users[0]->name }}</p>
            </div>
            <div class="icon">
               <i class="fas fa-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Withdrawals User 2 -->
      @if ($users[1] ?? false)
      <div class="col-lg-3 col-6">
         <div class="small-box bg-success">
            <div class="inner">
               <h4>{{ number_format($totalWithdrawalsUser2, 2) }}</h4>
               <p>Total Withdrawals {{ $users[1]->name }}</p>
            </div>
            <div class="icon">
               <i class="fas fa-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      @endif

      <!-- Small Box: Withdrawals User 1 This Month -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-warning">
            <div class="inner">
               <h4>{{ number_format($totalWithdrawalsUser1ThisMonth, 2) }}</h4>
               <p>Withdrawals {{ $users[0]->name }} This Month</p>
            </div>
            <div class="icon">
               <i class="fas fa-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Withdrawals User 2 This Month -->
      @if ($users[1] ?? false)
      <div class="col-lg-3 col-6">
         <div class="small-box bg-danger">
            <div class="inner">
               <h4>{{ number_format($totalWithdrawalsUser2ThisMonth, 2) }}</h4>
               <p>Withdrawals {{ $users[1]->name }} This Month</p>
            </div>
            <div class="icon">
               <i class="fas fa-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      @endif
   </div>

   <!-- Row 4 - Saldo User -->
   <div class="row">
      <!-- Small Box: Saldo User 1 -->
      <div class="col-lg-3 col-6">
         <div class="small-box bg-primary">
            <div class="inner">
               <h4>{{ number_format($totalSideIncomeThisMonth, 2) }}</h4> <!-- Total Side Income Bulan Ini -->
               <p>Total Side Incomes This Month</p>
            </div>
            <div class="icon">
               <i class="fas fa-coins"></i>
            </div>
            <a href="{{ route('sideincomes.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <div class="col-lg-3 col-6">
         <div class="small-box bg-secondary">
            <div class="inner">
               <h4>{{ number_format($saldoUser1, 2) }}</h4> <!-- Saldo User 1 -->
               <p>Saldo {{ $users[0]->name }}</p> <!-- Nama User 1 -->
            </div>
            <div class="icon">
               <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      <!-- Small Box: Saldo User 2 -->
      @if ($users[1] ?? false)
      <div class="col-lg-3 col-6">
         <div class="small-box bg-secondary">
            <div class="inner">
               <h4>{{ number_format($saldoUser2, 2) }}</h4> <!-- Saldo User 2 -->
               <p>Saldo {{ $users[1]->name }}</p> <!-- Nama User 2 -->
            </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      @endif
   </div>

</div>
@endsection