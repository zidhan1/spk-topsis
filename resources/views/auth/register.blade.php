@extends('layouts.app')

@section('content')
<section class="ftco-section">
	<div class="row justify-content-center">
		<div class="col-md-7 col-lg-5">
			<div class="login-wrap p-4 p-md-5">
				<div class="icon d-flex align-items-center justify-content-center">
					<span class="fa fa-user-o"></span>
				</div>
				<h3 class="text-center mb-4">Register</h3>
				<form action="{{ route('session.create') }}" class="login-form" method="POST">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control rounded-left" placeholder="Your name" name="name" id="name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control rounded-left" placeholder="username" name="username" id="username" required>
					</div>
					<div class="form-group">
						<input type="email" class="form-control rounded-left" placeholder="Email" name="email" id="email" required>
					</div>
					<div class="form-group d-flex">
						<input type="password" class="form-control rounded-left" placeholder="Password" name="password" id="password" required>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
@endsection