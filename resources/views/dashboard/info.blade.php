@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <form action="{{ route('d.info.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
                <div class="card-header" style="background-color:#ef2d24;opacity:0.8">
                    <h3 class="card-title">Information </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label> Phone number</label>
                        <div class="input-group col-md-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="number" class="form-control" required value="{{ $info->phone }}" name="phone"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group col-md-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" value="{{ $info->email }}" name="email">
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
                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->web_link }}" name="web_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Google play link</label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-google-play"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->google_link }}" name="google_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Apple market link</label>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-apple"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $info->apple_link }}" name="apple_link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <div class="input-group col-md-12 ">
                            <div class="input-group-prepend col-md-1">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                            </div>
                            {{-- <input type="file" class="form-control" value="{{ $info->banner }}" name="banner"> --}}
                            <div class="btn btn-light btn-file col-md-11">
                                <i class="fas fa-paperclip"></i> Banner
                                <input id="editImg" type="file" value="{{ $info->banner }}" name="banner" onchange="loadFile(event)">
                                <p><img src="" id="output"  width="200" /></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group w-100 ">
                        <input type="submit" class="btn btn-primary d-block m-auto " value="Update">
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection
@section('scripts')
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        var image2 = document.getElementById('output2');
        image.src = URL.createObjectURL(event.target.files[0]);
        image2.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

@endsection

