<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body class="profile-page">

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg "  color-on-scroll="100"  id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="{{ route('delete-account') }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-warning m-3">Delete account</button>
                    </form>
                </li>
                <li class="nav-item">
                    <button class="btn btn-success m-3">
                        <a class="white-no-decoration" href="{{ route('logout') }}">Log Out</a>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-header header-filter" data-parallax="true" style="background-image:url('{{ asset('assets/images/background-gray.png') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src="https://blinmen.ru/wp-content/uploads/2011/09/user-profile.png" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            <h3 class="title">{{ Auth::user()->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="addPost">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add post</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div id="post-form" class="modal-body">
                <div class="form-group post-title">
                    <label for="title" class="control-label">Title</label>
                    <input name="title" id="title" type="text" class="form-control">
                    <small class="has-error"></small>
                </div>
                <div class="form-group post-content">
                    <label for="content" class="control-label">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    <small class="has-error"></small>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success add-post-submit">Add</button>
            </div>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/js/profile.js') }}"></script>
</body>
</html>
