@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<style>

    * {
  box-sizing: border-box;
}

body {
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#0c1019+0,0b0b0e+100 */
  background: #0c1019;
  /* Old browsers */
  /* FF3.6-15 */
  /* Chrome10-25,Safari5.1-6 */
  background: radial-gradient(ellipse at center, #0c1019 0%, #0b0b0e 100%);
  /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#0c1019", endColorstr="#0b0b0e",GradientType=1 );
  /* IE6-9 fallback on horizontal gradient */
  font-family: montserrat;
  text-align: center;
  margin: 0;
  padding: 0;
  overflow: hidden;
  height: 100vh;
}
body .container_inner {
  width: 300px;
  margin: 0 auto;
}
body .container_inner__login {
  height: 100vh;
  perspective: 800px;
}
body .container_inner__login .tip {
  color: #81AECE;
  opacity: 0;
  transition: all 0.4s;
  font-size: 10px;
  position: relative;
  font-weight: 100;
  height: 0px;
  overflow: hidden;
  top: -27px;
  line-height: 14px;
}
body .container_inner__login .tick {
  transform: scale(0) translateY(-50%);
  transition: all 0.35s cubic-bezier(0.65, 1.88, 0.51, 0.69);
  position: absolute;
  left: 0;
  top: 50%;
  right: 0;
  margin: auto;
}
body .container_inner__login .tick img {
  width: 50px;
}
body .container_inner__login .hide {
  opacity: 0 !important;
}
body .container_inner__login .bulge {
  transform: scale(1) !important;
  top: 50px !important;
  transition: all 0.4s;
  -webkit-animation: bulge 1s 0.25s forwards !important;
          animation: bulge 1s 0.25s forwards !important;
}
body .container_inner__login .login_check {
  font-size: 11px;
  text-align: center;
  line-height: 20px;
  color: white;
  color: #BFBFCE;
  position: absolute;
  display: none;
  left: -26px;
  top: 160px;
  height: 280px;
  width: 278px;
  margin: auto;
  right: 0;
}
body .container_inner__login .login_check img {
  opacity: 0.9;
  width: 140px;
  margin-bottom: 30px;
}
body .container_inner__login .login_check span {
  color: #FF133D;
  line-height: 20px;
}
body .container_inner__login .login {
  position: absolute;
  left: 0;
  top: 50%;
  transition: all 0.2s;
  width: 220px;
  transform-origin: 110px -30px;
  margin: auto;
  transform: scale(1) translateY(-50%) rotatex(360deg) rotatey(360deg);
  right: 0;
}
body .container_inner__login .login .center {
  top: 100px !important;
}
body .container_inner__login .login_profile {
  border-radius: 100px;
  height: 80px;
  width: 60px;
  background: white;
  margin-bottom: 40px;
  margin: 0 auto;
  position: relative;
  top: 0px;
  transform: scale(0);
  -webkit-animation: logo_in 1s 0.9s forwards;
          animation: logo_in 1s 0.9s forwards;
}
body .container_inner__login .login_profile img {
  position: relative;
  top: 18px;
}
body .container_inner__login .login_profile .logo {
  z-index: 2;
  /* own */
  width: 45px;
  margin-left: -2px;
}
body .container_inner__login .login_profile .pulse {
  width: 160px;
  position: relative;
  top: -85px;
  display: none;
  left: -42px;
  z-index: 1;
}
body .container_inner__login .login_desc {
  color: #BFBFCE;
  font-size: 10px;
  margin-top: 20px;
  -webkit-animation: pop 0.5s 1.3s forwards;
          animation: pop 0.5s 1.3s forwards;
  position: relative;
  opacity: 0;
}
body .container_inner__login .login_desc h3 {
  font-weight: 500;
}
body .container_inner__login .login_desc span {
  color: #FF133D;
  font-weight: 600;
}
body .container_inner__login .login_inputs {
  margin-top: 50px;
}
body .container_inner__login .login_inputs form {
  margin: 0;
  padding: 0;
}
body .container_inner__login .login_inputs form input {
  width: 100%;
  padding: 10px;
  color: #141416;
  border: none;
  border-radius: 3px;
  text-align: center;
  -webkit-animation: pop 0.5s 1.6s forwards;
          animation: pop 0.5s 1.6s forwards;
  position: relative;
  opacity: 0;
  font-size: 13px;
  outline: none;
}
body .container_inner__login .login_inputs form input[type=submit] {
  margin-top: 12px;
  cursor: pointer;
  border: 1px solid #FF133D;
  text-transform: uppercase;
  letter-spacing: 1px;
  padding: 10px 10px;
  -webkit-animation: pop 0.5s 1.9s forwards;
          animation: pop 0.5s 1.9s forwards;
  position: relative;
  opacity: 0;
  position: relative;
  font-weight: 100;
  color: white;
  font-family: montserrat;
  background: #D61134;
  box-shadow: 0px 2px #69091A, 0px 0px 3px rgba(2, 2, 2, 0.17), 0px 0px rgba(255, 255, 255, 0.13) inset;
  font-size: 11px;
  transition: all 0.24s;
}
body .container_inner__login .login_inputs form input[type=submit]:hover,
body .container_inner__login .login_inputs form input[type=submit]:active {
  font-weight: 600;
  color: white;
}
body .container_inner__login .login_inputs a {
  color: #393940;
  text-decoration: none;
  font-weight: 100;
  -webkit-animation: pop 0.5s 2.2s forwards;
          animation: pop 0.5s 2.2s forwards;
  position: relative;
  opacity: 0;
  font-size: 11px;
  display: inline-block;
  margin-top: 20px;
  transition: all 0.24s;
}
body .container_inner__login .login_inputs a:hover {
  color: #FF133D;
}

@-webkit-keyframes brightflash {
  0% {
    background: #141416;
  }
  50% {
    background: white;
  }
  100% {
    background: #141416;
  }
}

@keyframes brightflash {
  0% {
    background: #141416;
  }
  50% {
    background: white;
  }
  100% {
    background: #141416;
  }
}
@-webkit-keyframes bulge {
  0% {
    width: 60px;
  }
  20% {
    width: 110px;
  }
  40% {
    width: 67px;
  }
  60% {
    width: 84px;
  }
  80% {
    width: 78px;
  }
  100% {
    width: 80px;
  }
}
@keyframes bulge {
  0% {
    width: 60px;
  }
  20% {
    width: 110px;
  }
  40% {
    width: 67px;
  }
  60% {
    width: 84px;
  }
  80% {
    width: 78px;
  }
  100% {
    width: 80px;
  }
}
@-webkit-keyframes logo_in {
  0% {
    transform: scale(0);
  }
  20% {
    transform: scale(1.1);
  }
  40% {
    transform: scale(0.98);
  }
  60% {
    transform: scale(1.012);
  }
  80% {
    transform: scale(0.995);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes logo_in {
  0% {
    transform: scale(0);
  }
  20% {
    transform: scale(1.1);
  }
  40% {
    transform: scale(0.98);
  }
  60% {
    transform: scale(1.012);
  }
  80% {
    transform: scale(0.995);
  }
  100% {
    transform: scale(1);
  }
}
@-webkit-keyframes pop {
  0% {
    opacity: 0;
    top: 4px;
  }
  100% {
    opacity: 1;
    top: 0px;
  }
}
@keyframes pop {
  0% {
    opacity: 0;
    top: 4px;
  }
  100% {
    opacity: 1;
    top: 0px;
  }
}
/*

*/
.column {
  color: white;
  opacity: 0.1;
  float: left;
  position: relative;
}
.column:nth-of-type(1) {
  top: -162px;
}
.column:nth-of-type(2) {
  top: -193px;
}
.column:nth-of-type(3) {
  top: -291px;
}
.column:nth-of-type(4) {
  top: -75px;
}
.column:nth-of-type(5) {
  top: -35px;
}
.column:nth-of-type(6) {
  top: -103px;
}
.column:nth-of-type(7) {
  top: -52px;
}
.column:nth-of-type(8) {
  top: -219px;
}
.column:nth-of-type(9) {
  top: -300px;
}
.column:nth-of-type(10) {
  top: -117px;
}
.column:nth-of-type(11) {
  top: -164px;
}
.column:nth-of-type(12) {
  top: -59px;
}
.column:nth-of-type(13) {
  top: -124px;
}
.column:nth-of-type(14) {
  top: -92px;
}
.column:nth-of-type(15) {
  top: -296px;
}
.column:nth-of-type(16) {
  top: -166px;
}
.column:nth-of-type(17) {
  top: -20px;
}
.column:nth-of-type(18) {
  top: -298px;
}
.column:nth-of-type(19) {
  top: -171px;
}
.column:nth-of-type(20) {
  top: -146px;
}
.column:nth-of-type(21) {
  top: -210px;
}
.column:nth-of-type(22) {
  top: -143px;
}
.column:nth-of-type(23) {
  top: -40px;
}
.column:nth-of-type(24) {
  top: -141px;
}
.column:nth-of-type(25) {
  top: -216px;
}
.column:nth-of-type(26) {
  top: -282px;
}
.column:nth-of-type(27) {
  top: -154px;
}
.column:nth-of-type(28) {
  top: -115px;
}
.column:nth-of-type(29) {
  top: -270px;
}
.column:nth-of-type(30) {
  top: -286px;
}
.column:nth-of-type(31) {
  top: -285px;
}
.column:nth-of-type(32) {
  top: -98px;
}
.column:nth-of-type(33) {
  top: -267px;
}
.column:nth-of-type(34) {
  top: -285px;
}
.column:nth-of-type(35) {
  top: -15px;
}
.column:nth-of-type(36) {
  top: -253px;
}
.column:nth-of-type(37) {
  top: -288px;
}
.column:nth-of-type(38) {
  top: -50px;
}
.column:nth-of-type(39) {
  top: -72px;
}
.column:nth-of-type(40) {
  top: -172px;
}
.column:nth-of-type(41) {
  top: -76px;
}
.column:nth-of-type(42) {
  top: -274px;
}
.column:nth-of-type(43) {
  top: -143px;
}
.column:nth-of-type(44) {
  top: -152px;
}
.column:nth-of-type(45) {
  top: -3px;
}
.column:nth-of-type(46) {
  top: -78px;
}
.column:nth-of-type(47) {
  top: -109px;
}
.column:nth-of-type(48) {
  top: -160px;
}
.column:nth-of-type(49) {
  top: -36px;
}
.column:nth-of-type(50) {
  top: -300px;
}
.column:nth-of-type(51) {
  top: -38px;
}
.column:nth-of-type(52) {
  top: -151px;
}
.column:nth-of-type(53) {
  top: -228px;
}
.column:nth-of-type(54) {
  top: -274px;
}
.column:nth-of-type(55) {
  top: -26px;
}
.column:nth-of-type(56) {
  top: -236px;
}
.column:nth-of-type(57) {
  top: -15px;
}
.column:nth-of-type(58) {
  top: -214px;
}
.column:nth-of-type(59) {
  top: -84px;
}
.column:nth-of-type(60) {
  top: -143px;
}
.column:nth-of-type(61) {
  top: -46px;
}
.column:nth-of-type(62) {
  top: -231px;
}
.column:nth-of-type(63) {
  top: -92px;
}
.column:nth-of-type(64) {
  top: -282px;
}
.column:nth-of-type(65) {
  top: -42px;
}
.column:nth-of-type(66) {
  top: -179px;
}
.column:nth-of-type(67) {
  top: -132px;
}
.column:nth-of-type(68) {
  top: -252px;
}
.column:nth-of-type(69) {
  top: -31px;
}
.column:nth-of-type(70) {
  top: -145px;
}
.column:nth-of-type(71) {
  top: -25px;
}
.column:nth-of-type(72) {
  top: -229px;
}
.column:nth-of-type(73) {
  top: -293px;
}
.column:nth-of-type(74) {
  top: -8px;
}
.column:nth-of-type(75) {
  top: -35px;
}
.column:nth-of-type(76) {
  top: -194px;
}
.column:nth-of-type(77) {
  top: -94px;
}
.column:nth-of-type(78) {
  top: -232px;
}
.column:nth-of-type(79) {
  top: -124px;
}
.column:nth-of-type(80) {
  top: -198px;
}
.column:nth-of-type(81) {
  top: -68px;
}
.column:nth-of-type(82) {
  top: -96px;
}
.column:nth-of-type(83) {
  top: -218px;
}
.column:nth-of-type(84) {
  top: -286px;
}
.column:nth-of-type(85) {
  top: -256px;
}
.column:nth-of-type(86) {
  top: -209px;
}
.column:nth-of-type(87) {
  top: -47px;
}
.column:nth-of-type(88) {
  top: -288px;
}
.column:nth-of-type(89) {
  top: -54px;
}
.column:nth-of-type(90) {
  top: -135px;
}
.column:nth-of-type(91) {
  top: -176px;
}
.column:nth-of-type(92) {
  top: -91px;
}
.column:nth-of-type(93) {
  top: -149px;
}
.column:nth-of-type(94) {
  top: -248px;
}
.column:nth-of-type(95) {
  top: -132px;
}
.column:nth-of-type(96) {
  top: -283px;
}
.column:nth-of-type(97) {
  top: -12px;
}
.column:nth-of-type(98) {
  top: -135px;
}
.column:nth-of-type(99) {
  top: -100px;
}
.column:nth-of-type(100) {
  top: -50px;
}
.column .row {
  height: 10px;
  margin-left: 130px;
  margin-top: 20px;
  font-size: 10px;
  position: relative;
  margin-bottom: -10px;
  opacity: 0;
}
.column .row:nth-of-type(1) {
  -webkit-animation: fade 4s 0.25s infinite;
  -moz-animation: fade 4s 0.25s infinite;
  -o-animation: fade 4s 0.25s infinite;
}
.column .row:nth-of-type(2) {
  -webkit-animation: fade 4s 0.5s infinite;
  -moz-animation: fade 4s 0.5s infinite;
  -o-animation: fade 4s 0.5s infinite;
}
.column .row:nth-of-type(3) {
  -webkit-animation: fade 4s 0.75s infinite;
  -moz-animation: fade 4s 0.75s infinite;
  -o-animation: fade 4s 0.75s infinite;
}
.column .row:nth-of-type(4) {
  -webkit-animation: fade 4s 1s infinite;
  -moz-animation: fade 4s 1s infinite;
  -o-animation: fade 4s 1s infinite;
}
.column .row:nth-of-type(5) {
  -webkit-animation: fade 4s 1.25s infinite;
  -moz-animation: fade 4s 1.25s infinite;
  -o-animation: fade 4s 1.25s infinite;
}
.column .row:nth-of-type(6) {
  -webkit-animation: fade 4s 1.5s infinite;
  -moz-animation: fade 4s 1.5s infinite;
  -o-animation: fade 4s 1.5s infinite;
}
.column .row:nth-of-type(7) {
  -webkit-animation: fade 4s 1.75s infinite;
  -moz-animation: fade 4s 1.75s infinite;
  -o-animation: fade 4s 1.75s infinite;
}
.column .row:nth-of-type(8) {
  -webkit-animation: fade 4s 2s infinite;
  -moz-animation: fade 4s 2s infinite;
  -o-animation: fade 4s 2s infinite;
}
.column .row:nth-of-type(9) {
  -webkit-animation: fade 4s 2.25s infinite;
  -moz-animation: fade 4s 2.25s infinite;
  -o-animation: fade 4s 2.25s infinite;
}
.column .row:nth-of-type(10) {
  -webkit-animation: fade 4s 2.5s infinite;
  -moz-animation: fade 4s 2.5s infinite;
  -o-animation: fade 4s 2.5s infinite;
}
.column .row:nth-of-type(11) {
  -webkit-animation: fade 4s 2.75s infinite;
  -moz-animation: fade 4s 2.75s infinite;
  -o-animation: fade 4s 2.75s infinite;
}
.column .row:nth-of-type(12) {
  -webkit-animation: fade 4s 3s infinite;
  -moz-animation: fade 4s 3s infinite;
  -o-animation: fade 4s 3s infinite;
}
.column .row:nth-of-type(13) {
  -webkit-animation: fade 4s 3.25s infinite;
  -moz-animation: fade 4s 3.25s infinite;
  -o-animation: fade 4s 3.25s infinite;
}
.column .row:nth-of-type(14) {
  -webkit-animation: fade 4s 3.5s infinite;
  -moz-animation: fade 4s 3.5s infinite;
  -o-animation: fade 4s 3.5s infinite;
}
.column .row:nth-of-type(15) {
  -webkit-animation: fade 4s 3.75s infinite;
  -moz-animation: fade 4s 3.75s infinite;
  -o-animation: fade 4s 3.75s infinite;
}
.column .row:nth-of-type(16) {
  -webkit-animation: fade 4s 4s infinite;
  -moz-animation: fade 4s 4s infinite;
  -o-animation: fade 4s 4s infinite;
}
.column .row:nth-of-type(17) {
  -webkit-animation: fade 4s 4.25s infinite;
  -moz-animation: fade 4s 4.25s infinite;
  -o-animation: fade 4s 4.25s infinite;
}
.column .row:nth-of-type(18) {
  -webkit-animation: fade 4s 4.5s infinite;
  -moz-animation: fade 4s 4.5s infinite;
  -o-animation: fade 4s 4.5s infinite;
}
.column .row:nth-of-type(19) {
  -webkit-animation: fade 4s 4.75s infinite;
  -moz-animation: fade 4s 4.75s infinite;
  -o-animation: fade 4s 4.75s infinite;
}
.column .row:nth-of-type(20) {
  -webkit-animation: fade 4s 5s infinite;
  -moz-animation: fade 4s 5s infinite;
  -o-animation: fade 4s 5s infinite;
}
.column .row:nth-of-type(21) {
  -webkit-animation: fade 4s 5.25s infinite;
  -moz-animation: fade 4s 5.25s infinite;
  -o-animation: fade 4s 5.25s infinite;
}
.column .row:nth-of-type(22) {
  -webkit-animation: fade 4s 5.5s infinite;
  -moz-animation: fade 4s 5.5s infinite;
  -o-animation: fade 4s 5.5s infinite;
}
.column .row:nth-of-type(23) {
  -webkit-animation: fade 4s 5.75s infinite;
  -moz-animation: fade 4s 5.75s infinite;
  -o-animation: fade 4s 5.75s infinite;
}
.column .row:nth-of-type(24) {
  -webkit-animation: fade 4s 6s infinite;
  -moz-animation: fade 4s 6s infinite;
  -o-animation: fade 4s 6s infinite;
}
.column .row:nth-of-type(25) {
  -webkit-animation: fade 4s 6.25s infinite;
  -moz-animation: fade 4s 6.25s infinite;
  -o-animation: fade 4s 6.25s infinite;
}
.column .row:nth-of-type(26) {
  -webkit-animation: fade 4s 6.5s infinite;
  -moz-animation: fade 4s 6.5s infinite;
  -o-animation: fade 4s 6.5s infinite;
}
.column .row:nth-of-type(27) {
  -webkit-animation: fade 4s 6.75s infinite;
  -moz-animation: fade 4s 6.75s infinite;
  -o-animation: fade 4s 6.75s infinite;
}
.column .row:nth-of-type(28) {
  -webkit-animation: fade 4s 7s infinite;
  -moz-animation: fade 4s 7s infinite;
  -o-animation: fade 4s 7s infinite;
}
.column .row:nth-of-type(29) {
  -webkit-animation: fade 4s 7.25s infinite;
  -moz-animation: fade 4s 7.25s infinite;
  -o-animation: fade 4s 7.25s infinite;
}
.column .row:nth-of-type(30) {
  -webkit-animation: fade 4s 7.5s infinite;
  -moz-animation: fade 4s 7.5s infinite;
  -o-animation: fade 4s 7.5s infinite;
}
.column .row:nth-of-type(31) {
  -webkit-animation: fade 4s 7.75s infinite;
  -moz-animation: fade 4s 7.75s infinite;
  -o-animation: fade 4s 7.75s infinite;
}
.column .row:nth-of-type(32) {
  -webkit-animation: fade 4s 8s infinite;
  -moz-animation: fade 4s 8s infinite;
  -o-animation: fade 4s 8s infinite;
}
.column .row:nth-of-type(33) {
  -webkit-animation: fade 4s 8.25s infinite;
  -moz-animation: fade 4s 8.25s infinite;
  -o-animation: fade 4s 8.25s infinite;
}
.column .row:nth-of-type(34) {
  -webkit-animation: fade 4s 8.5s infinite;
  -moz-animation: fade 4s 8.5s infinite;
  -o-animation: fade 4s 8.5s infinite;
}
.column .row:nth-of-type(35) {
  -webkit-animation: fade 4s 8.75s infinite;
  -moz-animation: fade 4s 8.75s infinite;
  -o-animation: fade 4s 8.75s infinite;
}
.column .row:nth-of-type(36) {
  -webkit-animation: fade 4s 9s infinite;
  -moz-animation: fade 4s 9s infinite;
  -o-animation: fade 4s 9s infinite;
}
.column .row:nth-of-type(37) {
  -webkit-animation: fade 4s 9.25s infinite;
  -moz-animation: fade 4s 9.25s infinite;
  -o-animation: fade 4s 9.25s infinite;
}
.column .row:nth-of-type(38) {
  -webkit-animation: fade 4s 9.5s infinite;
  -moz-animation: fade 4s 9.5s infinite;
  -o-animation: fade 4s 9.5s infinite;
}
.column .row:nth-of-type(39) {
  -webkit-animation: fade 4s 9.75s infinite;
  -moz-animation: fade 4s 9.75s infinite;
  -o-animation: fade 4s 9.75s infinite;
}
.column .row:nth-of-type(40) {
  -webkit-animation: fade 4s 10s infinite;
  -moz-animation: fade 4s 10s infinite;
  -o-animation: fade 4s 10s infinite;
}
.column .row:nth-of-type(41) {
  -webkit-animation: fade 4s 10.25s infinite;
  -moz-animation: fade 4s 10.25s infinite;
  -o-animation: fade 4s 10.25s infinite;
}
.column .row:nth-of-type(42) {
  -webkit-animation: fade 4s 10.5s infinite;
  -moz-animation: fade 4s 10.5s infinite;
  -o-animation: fade 4s 10.5s infinite;
}
.column .row:nth-of-type(43) {
  -webkit-animation: fade 4s 10.75s infinite;
  -moz-animation: fade 4s 10.75s infinite;
  -o-animation: fade 4s 10.75s infinite;
}
.column .row:nth-of-type(44) {
  -webkit-animation: fade 4s 11s infinite;
  -moz-animation: fade 4s 11s infinite;
  -o-animation: fade 4s 11s infinite;
}
.column .row:nth-of-type(45) {
  -webkit-animation: fade 4s 11.25s infinite;
  -moz-animation: fade 4s 11.25s infinite;
  -o-animation: fade 4s 11.25s infinite;
}
.column .row:nth-of-type(46) {
  -webkit-animation: fade 4s 11.5s infinite;
  -moz-animation: fade 4s 11.5s infinite;
  -o-animation: fade 4s 11.5s infinite;
}
.column .row:nth-of-type(47) {
  -webkit-animation: fade 4s 11.75s infinite;
  -moz-animation: fade 4s 11.75s infinite;
  -o-animation: fade 4s 11.75s infinite;
}
.column .row:nth-of-type(48) {
  -webkit-animation: fade 4s 12s infinite;
  -moz-animation: fade 4s 12s infinite;
  -o-animation: fade 4s 12s infinite;
}
.column .row:nth-of-type(49) {
  -webkit-animation: fade 4s 12.25s infinite;
  -moz-animation: fade 4s 12.25s infinite;
  -o-animation: fade 4s 12.25s infinite;
}
.column .row:nth-of-type(50) {
  -webkit-animation: fade 4s 12.5s infinite;
  -moz-animation: fade 4s 12.5s infinite;
  -o-animation: fade 4s 12.5s infinite;
}
.column .row:nth-of-type(51) {
  -webkit-animation: fade 4s 12.75s infinite;
  -moz-animation: fade 4s 12.75s infinite;
  -o-animation: fade 4s 12.75s infinite;
}
.column .row:nth-of-type(52) {
  -webkit-animation: fade 4s 13s infinite;
  -moz-animation: fade 4s 13s infinite;
  -o-animation: fade 4s 13s infinite;
}
.column .row:nth-of-type(53) {
  -webkit-animation: fade 4s 13.25s infinite;
  -moz-animation: fade 4s 13.25s infinite;
  -o-animation: fade 4s 13.25s infinite;
}
.column .row:nth-of-type(54) {
  -webkit-animation: fade 4s 13.5s infinite;
  -moz-animation: fade 4s 13.5s infinite;
  -o-animation: fade 4s 13.5s infinite;
}
.column .row:nth-of-type(55) {
  -webkit-animation: fade 4s 13.75s infinite;
  -moz-animation: fade 4s 13.75s infinite;
  -o-animation: fade 4s 13.75s infinite;
}
.column .row:nth-of-type(56) {
  -webkit-animation: fade 4s 14s infinite;
  -moz-animation: fade 4s 14s infinite;
  -o-animation: fade 4s 14s infinite;
}
.column .row:nth-of-type(57) {
  -webkit-animation: fade 4s 14.25s infinite;
  -moz-animation: fade 4s 14.25s infinite;
  -o-animation: fade 4s 14.25s infinite;
}
.column .row:nth-of-type(58) {
  -webkit-animation: fade 4s 14.5s infinite;
  -moz-animation: fade 4s 14.5s infinite;
  -o-animation: fade 4s 14.5s infinite;
}
.column .row:nth-of-type(59) {
  -webkit-animation: fade 4s 14.75s infinite;
  -moz-animation: fade 4s 14.75s infinite;
  -o-animation: fade 4s 14.75s infinite;
}
.column .row:nth-of-type(60) {
  -webkit-animation: fade 4s 15s infinite;
  -moz-animation: fade 4s 15s infinite;
  -o-animation: fade 4s 15s infinite;
}
.column .row:nth-of-type(61) {
  -webkit-animation: fade 4s 15.25s infinite;
  -moz-animation: fade 4s 15.25s infinite;
  -o-animation: fade 4s 15.25s infinite;
}
.column .row:nth-of-type(62) {
  -webkit-animation: fade 4s 15.5s infinite;
  -moz-animation: fade 4s 15.5s infinite;
  -o-animation: fade 4s 15.5s infinite;
}
.column .row:nth-of-type(63) {
  -webkit-animation: fade 4s 15.75s infinite;
  -moz-animation: fade 4s 15.75s infinite;
  -o-animation: fade 4s 15.75s infinite;
}
.column .row:nth-of-type(64) {
  -webkit-animation: fade 4s 16s infinite;
  -moz-animation: fade 4s 16s infinite;
  -o-animation: fade 4s 16s infinite;
}
.column .row:nth-of-type(65) {
  -webkit-animation: fade 4s 16.25s infinite;
  -moz-animation: fade 4s 16.25s infinite;
  -o-animation: fade 4s 16.25s infinite;
}
.column .row:nth-of-type(66) {
  -webkit-animation: fade 4s 16.5s infinite;
  -moz-animation: fade 4s 16.5s infinite;
  -o-animation: fade 4s 16.5s infinite;
}
.column .row:nth-of-type(67) {
  -webkit-animation: fade 4s 16.75s infinite;
  -moz-animation: fade 4s 16.75s infinite;
  -o-animation: fade 4s 16.75s infinite;
}
.column .row:nth-of-type(68) {
  -webkit-animation: fade 4s 17s infinite;
  -moz-animation: fade 4s 17s infinite;
  -o-animation: fade 4s 17s infinite;
}
.column .row:nth-of-type(69) {
  -webkit-animation: fade 4s 17.25s infinite;
  -moz-animation: fade 4s 17.25s infinite;
  -o-animation: fade 4s 17.25s infinite;
}
.column .row:nth-of-type(70) {
  -webkit-animation: fade 4s 17.5s infinite;
  -moz-animation: fade 4s 17.5s infinite;
  -o-animation: fade 4s 17.5s infinite;
}
.column .row:nth-of-type(71) {
  -webkit-animation: fade 4s 17.75s infinite;
  -moz-animation: fade 4s 17.75s infinite;
  -o-animation: fade 4s 17.75s infinite;
}
.column .row:nth-of-type(72) {
  -webkit-animation: fade 4s 18s infinite;
  -moz-animation: fade 4s 18s infinite;
  -o-animation: fade 4s 18s infinite;
}
.column .row:nth-of-type(73) {
  -webkit-animation: fade 4s 18.25s infinite;
  -moz-animation: fade 4s 18.25s infinite;
  -o-animation: fade 4s 18.25s infinite;
}
.column .row:nth-of-type(74) {
  -webkit-animation: fade 4s 18.5s infinite;
  -moz-animation: fade 4s 18.5s infinite;
  -o-animation: fade 4s 18.5s infinite;
}
.column .row:nth-of-type(75) {
  -webkit-animation: fade 4s 18.75s infinite;
  -moz-animation: fade 4s 18.75s infinite;
  -o-animation: fade 4s 18.75s infinite;
}
.column .row:nth-of-type(76) {
  -webkit-animation: fade 4s 19s infinite;
  -moz-animation: fade 4s 19s infinite;
  -o-animation: fade 4s 19s infinite;
}
.column .row:nth-of-type(77) {
  -webkit-animation: fade 4s 19.25s infinite;
  -moz-animation: fade 4s 19.25s infinite;
  -o-animation: fade 4s 19.25s infinite;
}
.column .row:nth-of-type(78) {
  -webkit-animation: fade 4s 19.5s infinite;
  -moz-animation: fade 4s 19.5s infinite;
  -o-animation: fade 4s 19.5s infinite;
}
.column .row:nth-of-type(79) {
  -webkit-animation: fade 4s 19.75s infinite;
  -moz-animation: fade 4s 19.75s infinite;
  -o-animation: fade 4s 19.75s infinite;
}
.column .row:nth-of-type(80) {
  -webkit-animation: fade 4s 20s infinite;
  -moz-animation: fade 4s 20s infinite;
  -o-animation: fade 4s 20s infinite;
}
.column .row:nth-of-type(81) {
  -webkit-animation: fade 4s 20.25s infinite;
  -moz-animation: fade 4s 20.25s infinite;
  -o-animation: fade 4s 20.25s infinite;
}
.column .row:nth-of-type(82) {
  -webkit-animation: fade 4s 20.5s infinite;
  -moz-animation: fade 4s 20.5s infinite;
  -o-animation: fade 4s 20.5s infinite;
}
.column .row:nth-of-type(83) {
  -webkit-animation: fade 4s 20.75s infinite;
  -moz-animation: fade 4s 20.75s infinite;
  -o-animation: fade 4s 20.75s infinite;
}
.column .row:nth-of-type(84) {
  -webkit-animation: fade 4s 21s infinite;
  -moz-animation: fade 4s 21s infinite;
  -o-animation: fade 4s 21s infinite;
}
.column .row:nth-of-type(85) {
  -webkit-animation: fade 4s 21.25s infinite;
  -moz-animation: fade 4s 21.25s infinite;
  -o-animation: fade 4s 21.25s infinite;
}
.column .row:nth-of-type(86) {
  -webkit-animation: fade 4s 21.5s infinite;
  -moz-animation: fade 4s 21.5s infinite;
  -o-animation: fade 4s 21.5s infinite;
}
.column .row:nth-of-type(87) {
  -webkit-animation: fade 4s 21.75s infinite;
  -moz-animation: fade 4s 21.75s infinite;
  -o-animation: fade 4s 21.75s infinite;
}
.column .row:nth-of-type(88) {
  -webkit-animation: fade 4s 22s infinite;
  -moz-animation: fade 4s 22s infinite;
  -o-animation: fade 4s 22s infinite;
}
.column .row:nth-of-type(89) {
  -webkit-animation: fade 4s 22.25s infinite;
  -moz-animation: fade 4s 22.25s infinite;
  -o-animation: fade 4s 22.25s infinite;
}
.column .row:nth-of-type(90) {
  -webkit-animation: fade 4s 22.5s infinite;
  -moz-animation: fade 4s 22.5s infinite;
  -o-animation: fade 4s 22.5s infinite;
}
.column .row:nth-of-type(91) {
  -webkit-animation: fade 4s 22.75s infinite;
  -moz-animation: fade 4s 22.75s infinite;
  -o-animation: fade 4s 22.75s infinite;
}
.column .row:nth-of-type(92) {
  -webkit-animation: fade 4s 23s infinite;
  -moz-animation: fade 4s 23s infinite;
  -o-animation: fade 4s 23s infinite;
}
.column .row:nth-of-type(93) {
  -webkit-animation: fade 4s 23.25s infinite;
  -moz-animation: fade 4s 23.25s infinite;
  -o-animation: fade 4s 23.25s infinite;
}
.column .row:nth-of-type(94) {
  -webkit-animation: fade 4s 23.5s infinite;
  -moz-animation: fade 4s 23.5s infinite;
  -o-animation: fade 4s 23.5s infinite;
}
.column .row:nth-of-type(95) {
  -webkit-animation: fade 4s 23.75s infinite;
  -moz-animation: fade 4s 23.75s infinite;
  -o-animation: fade 4s 23.75s infinite;
}
.column .row:nth-of-type(96) {
  -webkit-animation: fade 4s 24s infinite;
  -moz-animation: fade 4s 24s infinite;
  -o-animation: fade 4s 24s infinite;
}
.column .row:nth-of-type(97) {
  -webkit-animation: fade 4s 24.25s infinite;
  -moz-animation: fade 4s 24.25s infinite;
  -o-animation: fade 4s 24.25s infinite;
}
.column .row:nth-of-type(98) {
  -webkit-animation: fade 4s 24.5s infinite;
  -moz-animation: fade 4s 24.5s infinite;
  -o-animation: fade 4s 24.5s infinite;
}
.column .row:nth-of-type(99) {
  -webkit-animation: fade 4s 24.75s infinite;
  -moz-animation: fade 4s 24.75s infinite;
  -o-animation: fade 4s 24.75s infinite;
}
.column .row:nth-of-type(100) {
  -webkit-animation: fade 4s 25s infinite;
  -moz-animation: fade 4s 25s infinite;
  -o-animation: fade 4s 25s infinite;
}

@-webkit-keyframes fade {
  0% {
    opacity: 0;
  }
  20% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}
</style>
<div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='column'>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
    <div class='row'>
      <p>&#8487;</p>
    </div>
    <div class='row'>
      <p>&#x02135;</p>
    </div>
    <div class='row'>
      <p>&#x02041;</p>
    </div>
    <div class='row'>
      <p>&#x0210F;</p>
    </div>
    <div class='row'>
      <p>&#x0210C;</p>
    </div>
    <div class='row'>
      <p>&#x02111;;</p>
    </div>
    <div class='row'>
      <p>&#x02130;</p>
    </div>
    <div class='row'>
      <p>&#x00427;</p>
    </div>
    <div class='row'>
      <p>&#8713;</p>
    </div>
    <div class='row'>
      <p>&#8721;</p>
    </div>
    <div class='row'>
      <p>&#8776;</p>
    </div>
    <div class='row'>
      <p>&#8836;</p>
    </div>
    <div class='row'>
      <p>&#950;</p>
    </div>
    <div class='row'>
      <p>&#958;</p>
    </div>
    <div class='row'>
      <p>&#977;</p>
    </div>
  </div>
  <div class='container'>
    <div class='container_inner'>
      <div class='container_inner__login'>
        <div class='login'>
          <div class='login_profile'>
            <img class='logo' src='{{ asset('img/global-re-logo.png') }}'>
            <img class='pulse' src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/rings.svg'>
          </div>
          <div class='login_desc'>
            <h3 style="text-transform: uppercase;">
                Global Re LLC.
              <span>Bienvenido</span>
            </h3>
          </div>
          <div class='login_inputs'>
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class='tip'>
                Si olvidaste la contraseña, deberás solicitarla al administrador.
              </div>
              <input placeholder='Email' required='required' type='email' style="margin-bottom: 15px" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
              <input placeholder='Contraseña' required='required' type='password' name="password" id="password" required autocomplete="current-password">
              <input type='submit' value='Iniciar sesión'>
            </form>
            <div class='forgotten'>
              <a href='#'>¿Olvidaste tu contraseña?</a>
            </div>
            <div class='login_check'>
              <br/>Iniciando sesión <br/>
              <span>por favor, espera...</span>
            </div>
          </div>
        </div>
        <div class='tick'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/vtick.svg'>
        </div>
      </div>
    </div>
  </div>

  <script>
//     $('input[type="password"]').focus(function(){
//   $('.tip').css('height','30px')
//   setTimeout(function(){
//     $('.tip').css('opacity','1')
//   },350)
// });

$('input[type="password"]').blur(function(){
  $('.tip').css('opacity','0')
  setTimeout(function(){
    $('.tip').css('height','0px')
  },350)
});



$('form').submit(function(){
  $('form,.login_desc h3,.forgotten').animate({'opacity':'0'})
  setTimeout(function(){
    $('.login_profile').addClass('bulge')
  },400);
  setTimeout(function(){
    $('.pulse').fadeIn()
    $('.login_check').fadeIn(300)
  },1350);
   setTimeout(function(){
    $('.login').css('transform','scale(0) translateY(-50%) rotatex(360deg) rotatey(360deg)')
    setTimeout(function(){
    $('.tick').css('transform','scale(1) translateY(-50%)')
  },200);
  },3650);
//   return false;
})
  </script>

@endsection
