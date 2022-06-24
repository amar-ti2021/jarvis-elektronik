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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                        <div id="accordion">
                            @foreach ($vendors as $key => $vendor)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $key }}" aria-expanded="false">
                                            {{ $vendor->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $key }}" class="collapse" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @foreach ($vendor->product as $product)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ $product->name }}
                                                <span class="badge bg-primary rounded-pill">{{ $product->stock }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
</section>
<!-- /.content -->
@endsection
