@extends('layouts.app')

@section('content')
    @include('style')
    @include('header')
    <style>
        #hidden_div {
            display: none;
        }
    </style>
    <div class="headerbg">
        <div class="row">
            <div class="col-md-12" align="center"><h1>Post Your Query</h1>

            </div>
        </div>
    </div>
    @if(Session::has('success'))

        <div class="alert alert-success">

            {{ Session::get('success') }}

        </div>

    @endif




    @if(Session::has('error'))

        <div class="alert alert-danger">

            {{ Session::get('error') }}

        </div>

    @endif

    <div class="height30"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 "></div>
            <div class="col-md-4">
                <div class="panel panel-default border-shadow">
                    <div class="panel-heading">Query</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('save_query') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">



                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input id="name" type="text" class="form-control" name="username"  required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <input type="hidden" value="<?php echo $shop_id ?>" name="shop_id">
                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">


                            <div class="form-group">


                                <div class="col-md-12">
                                    <label for="phoneno">Phone No</label>
                                    <input id="phoneno" type="text" class="form-control" name="phoneno" required>
                                </div>
                            </div>


                            <div class="form-group">


                                <div class="col-md-12">
                                    <label for="phoneno">Type query</label><br>
                                    <textarea rows="4" name="requiremnt" cols="42"></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary">
                                        Submit Requirement
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>





                </div>
            </div>
        </div>
    </div>
    </div>

    @include('footer')
@endsection
