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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-xl">
                                <i class="far fa-plus"></i> <b> Add Items</b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (!$cartItems->isEmpty())

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-center">Qty</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1;?>
                                @foreach($cartItems->sortBy('id', SORT_NATURAL) as $item)

                                <tr>
                                    <th scope="row">{{ $num }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td class="d-flex justify-content-between">Rp. <span>{{ number_format($item->price) }}</span></td>
                                    <td class="text-center">
                                        <form action="/orders/update-cart" method="post">
                                            @csrf
                                            <button name="subtract" value=" {{ $item->id }}" class="btn btn-sm btn-primary mx-1"> - </button>
                                            {{ $item->quantity }}
                                            <button name="add" value=" {{ $item->id }}" class="btn btn-sm btn-primary mx-1"> + </i></button>
                                        </form>
                                    </td>
                                    <td class="d-flex justify-content-between">Rp. <span>{{ number_format($item->price * $item->quantity)}}</span></td>
                                </tr>
                                <?php $num++; ?>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right"> Total: </td>
                                    <td class="d-flex justify-content-between">Rp. <span>{{ number_format($total) }}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <form action="/orders/clear" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Clear All</button>
                                        </form>
                                        <form action="/orders/save" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Submit</button>
                                        </form>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
</section>
<!-- /.content -->
@include('order.product-modal');
@endsection
