@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <form action="{{ route('d.info.update') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" required value="{{ $info->phone }}" name="phone"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
                        <label>Google play link</label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->google_link }}" name="google_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Apple market link</label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->apple_link }}" name="apple_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                            </div>
                            <input type="file" class="form-control" value="{{ $info->banner }}" name="banner">
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

