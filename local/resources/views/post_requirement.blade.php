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
            <div class="col-md-12" align="center"><h1>Post Your Requirement</h1>

            </div>
        </div>
    </div>

    <div class="height30"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Requirement</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('save_post') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="username"  required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"  required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="phoneno" class="col-md-4 control-label">Phone No</label>

                                <div class="col-md-6">
                                    <input id="phoneno" type="text" class="form-control" name="phoneno" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="phoneno" class="col-md-4 control-label">Type Requirement</label>

                                <div class="col-md-6">
                                       <textarea rows="4" name="requiremnt" cols="50"></textarea>

                                </div>
                            </div>








                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
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

    @include('footer')
@endsection
