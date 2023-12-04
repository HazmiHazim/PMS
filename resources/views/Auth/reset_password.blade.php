@extends('main')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-4">

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

		<div class="card">
		<div class="card-header">Reset Password</div>
		<div class="card-body">
			<form method="POST" action="{{ route('user.passwordUpdate') }}">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ $data->email }}" />
                    <input type="hidden" name="email" value="{{ $data->email }}"/>
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
                <div class="form-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="New Password" />
					@if($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>
                <div class="form-group mb-3">
					<input type="password" name="confirm_password" class="form-control" placeholder="Re-type New Password" />
					@if($errors->has('confirm_password'))
						<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
					@endif
				</div>
				<div class="mb-3">
                <input type="hidden" class="form-control" name="token" value="{{$token}}" >
            	</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')