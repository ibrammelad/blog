<!DOCTYPE html>
<html lang="en" dir="ltr">

<header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/style.css')}}">
</header>

<body>

    <div class="page-content">
        <div class="content">
            @include('layouts.alerts.success')
            @include('layouts.alerts.errors')
            <div class="page-title">
                <h4>Post</h4>
            </div>
            <!-- Add and delete form  -->
            <div class="page=form">

                <fieldset class="fieldset">
                        <h5>Add New Post</h5>
                    <form method="post" action="{{route('savePost')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="fieldset-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">title</span>
                                        <span class="text-danger validate">Required</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <label>
                                        <input name="title" class="form-control" placeholder="Enter title ">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Image</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <label>
                                        <input type="file" name="image" class="form-control" placeholder="Enter countery name">
                                    </label>
                                </div>
                            </div>

                        </div> @error('title')
                        <div class="text-red-500 text-sm mt-2"> {{ $message }}</div>
                    @enderror
                        @error('image')
                        <div class="text-red-500 text-sm mt-2"> {{ $message }}</div>
                    @enderror<!-- Row End -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Content</span>
                                        <span class="text-danger validate">Required</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <label>
                                        <input name="content" class="form-control" placeholder="What in your mind?">
                                    </label>
                                </div>
                            </div>
                            @error('content')
                            <div class="text-red-500 text-sm mt-2"> {{ $message }}</div>
                            @enderror
                        </div> <!-- Row End -->

                        <div class="action-row">
                            <input type="submit" class="btn btn-primary"  >
                        </div>
                    </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>

<script src="{{asset('/asset/js/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('/asset/js/propper.min.js')}}"></script>
    <script src="{{asset('/asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/asset/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/asset/js/select2.min.js')}}"></script>
    <script src="{{asset('/asset/js/script.js')}}"></script>
</body>
</html>
