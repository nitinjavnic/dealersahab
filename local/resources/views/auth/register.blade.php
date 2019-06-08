@extends('layouts.app')

@section('content')
@include('style')
@include('header')
<style>
    #hidden_div {
        display: none;
    }
</style>

	 
<div class="height30"></div>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 ">
            <div class="panel panel-default border-shadow">
                <h3 class=" heading-0">Register</h3>
                
				<div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                <label for="name">Username</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                                <label for="usertype">User Type</label>
							<select name="usertype" onchange="showDiv('hidden_div', this)" class="form-control" required>
							  
							  <option value=""></option>
							   <option value="0">Buyer</option>
							   <option value="2">Seller</option>
							</select>
                               
                            </div>
                        </div>

                        <div class="form-group " id="hidden_div">


                            <div class="col-md-12">
                                <label for="usertype">Seller Type</label>
                                <select name="sellertype"  class="form-control">
                                    <option value=""></option>
                                    <option value="Manufacturer">Manufacturer</option>
                                    <option value="Dealer">Dealer</option>
                                    <option value="Wholesaler">Wholesaler</option>
                                    <option value="Distributer">Distributer</option>
                                </select>

                            </div>
                        </div>
						
						

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
				
				
				
				
				
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<script>

    function showDiv(divId, element)
    {   console.log(element);

        document.getElementById(divId).style.display = element.value == 2 ? 'block' : 'none';
    }

</script>

@include('footer')
@endsection
