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
            <div class="col-md-4 "></div>
            <div class="col-md-4">
                <div class="panel panel-default border-shadow">
                    <div class="panel-heading">Requirement</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('save_post') }}">
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

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                <div class="col-md-12">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email"  required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group">


                                <div class="col-md-12">
                                    <label for="phoneno">Phone No</label>
                                    <input id="phoneno" type="text" class="form-control" name="phoneno" required>
                                </div>
                            </div>


                            <div class="form-group">


                                <div class="col-md-12">
                                    <label for="phoneno">Type Requirement</label><br>
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
