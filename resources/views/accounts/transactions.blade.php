@extends('mainLayout.layout')
@section('title','Trip Designer || New Air transaction')
@section('accounts','active')
@section('transactions','active')
@section('accountMenu','menu-open')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Transaction Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Transaction Management</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Transaction Management</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example11" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th>Date</th>
                                        <th>Source</th>
                                        <th>Purpose</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        <th>Profit</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$transaction->date}}</td>
                                            <td>{{$transaction->source}}</td>
                                            <td>{{$transaction->purpose}}</td>
                                            @if($transaction->transaction_type	 == 'Debit')
                                                <td>{{$transaction->buying_price}}</td>
                                                @else
                                                <td>0</td>
                                            @endif
                                            @if($transaction->transaction_type	 == 'Credit')
                                                <td>{{$transaction->buying_price}}</td>
                                                @else
                                                <td>0</td>
                                            @endif
                                            <td>{{$transaction->buying_price}}</td>
                                            <td>{{$transaction->selling_price}}</td>
                                            <td>{{$transaction->selling_price - $transaction->buying_price}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success">{{$transaction->status}}</button>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('js')
    <script>
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })
    </script>
@endsection
