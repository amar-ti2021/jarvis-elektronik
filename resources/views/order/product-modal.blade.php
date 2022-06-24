<div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-body">
                            <form action="/orders/cart" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Choose Item By Name</label>
                                    <select class="form-control select2" style="width: 100%;" name="product_id">
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary"> <i class="far fa-plus"></i> Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row">
                    <div class="col-12">
                        <h3><b>Choose Item</b></h3>
                    </div>
                    @foreach ($products as $product)
                    <div class="card col-3 m-4">
                        <form action="/orders/cart" method="post">
                            @csrf
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                                <p class="card-text">Rp. {{ number_format($product->selling_price) }}</p>
                                <button type="submit" name="product_id" value="{{ $product->id }}" class="btn btn-block btn-primary stretched-link"> <i class="far fa-plus"></i> Add</button>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
