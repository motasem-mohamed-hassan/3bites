@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">add product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">category id</label>

                            <div class="col-md-6">
                                <input id="category_id" type="text" name="category_id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">name </label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" name="description" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="mb-0 form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                @foreach ($products as $product)
                    <h2>{{ $product->name }}</h2>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection