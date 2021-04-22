@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <form action="{{ route('dashboard.info.update') }}" method="post">
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
                        <label> Address in english </label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->location_en }}" name="location_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Address in arabic</label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->location_ar }}" name="location_ar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Location link </label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->location_link }}" name="location_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Whatsapp </label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->whatsapp_number }}" name="whatsapp_number">
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
                        <label>Twitter </label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->twitter_link }}" name="twitter_link">
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
                        <input type="submit" class="btn btn-primary" value="تحديث">
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection

