@extends('layout.main')

@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $title }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="invoice p-4 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="img-circle" style="opacity: .8; width:40px"> <b>Amdre</b>Elektronik
                                <small class="float-right">Date: {{ $order->date->format('d/m/Y') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From <strong>{{ $order->employee->name }}, </strong>
                            <address>
                                <strong>Amdre Elektronik.</strong><br>
                                Jalan Margonda Raya, nomor 600<br>
                                Depok, Jawa Barat 16431<br>
                                Phone: (+62) 123-5432<br>
                                Email: admin@amdreelektronik.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe@example.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #{{ $order->id }}</b><br>
                            <br>
                            <b>Order ID:</b> {{ $order->id }}<br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th class="text-center">Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->order_item as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td class="d-flex justify-content-between">Rp. <span>{{ number_format($item->price) }}</span></td>
                                        <td class="text-center">
                                            {{ $item->qty }}
                                        </td>
                                        <td class="d-flex justify-content-between">Rp. <span>{{ number_format($item->total)}}</span></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-right"> Total: </td>
                                        <td class="d-flex justify-content-between">Rp. <span>{{ number_format($order->total) }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="/orders" type="button" class="btn btn-success float-right">
                                <i class="far fa-credit-card"></i>
                                Back to Orders
                            </a>
                            <button type="button" class="btn btn-primary float-right" id="generate-pdf" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>


        </script>
</section>
<!-- /.content -->
@endsection
