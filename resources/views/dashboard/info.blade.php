@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <form action="{{ route('d.info.update') }}" method="post">
            @csrf
            @method('put')

            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="float:right">Information </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label> Phone number</label>
                        <div class="input-group col-md-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->phone }}" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group col-md-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->email }}" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Facebook </label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->facebook_link }}" name="facebook_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Instagram </label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->instagram_link }}" name="instagram_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Web</label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->web_link }}" name="web_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection

