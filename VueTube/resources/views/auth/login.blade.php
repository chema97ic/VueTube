@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center h-100 w-100 vertical-center">
    <div class="user_card">
        <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
                <img src="https://static.zerotackle.com/images/team-flags/st-george-illawarra-dragons-round.png" class="brand_logo" alt="Logo">
            </div>
        </div>
        <div class="d-flex justify-content-center form_container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" id="email" name="email" class="form-control input_user" placeholder="Email" required value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control input_pass" placeholder="Contraseña" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label" for="customControlInline">Recordar contraseña</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" class="btn login_btn">Entrar</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <div class="d-flex justify-content-center links">
                ¿Aún no estás registrado? <a href="{{ route('register') }}" class="ml-2">Registraté!</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .input-group-text {
            width: 100%
        }
        form {
            width:80%
        }
    	body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			
		}
		.user_card {
			height: 400px;
			width: 500px;
			margin-top: auto;
			margin-bottom: auto;
			background: #f39c12;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			border-radius: 5px;
		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #c0392b !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
</style>
@endsection

