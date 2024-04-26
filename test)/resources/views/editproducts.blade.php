
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit products') }}
                </div>

                
                <div class="card-body">
                <form action="{{ route('products.update', $product['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $product['title'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="body_html">Description</label>
                            <textarea class="form-control" id="body_html" name="body_html" required>{{ $product['body_html'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inventory_quantity">Quantity</label>
                            <input type="number" class="form-control" id="inventory_quantity" name="inventory_quantity" value="{{ $product['variants'][0]['inventory_quantity'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection