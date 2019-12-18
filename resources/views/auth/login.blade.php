<!DOCTYPE>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{asset('backend/img/favicon.png')}}" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}"/>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>


	<!-- ==== Intro Section Start ==== -->
	<section class="intro-section fix" id="home">
		<div class="intro-bg bg-cms"></div>
		<div class="intro-inner">
			<div class="intro-content">
				<div id="round"></div>
                <div id="login-box2">
                    <div class="profile-img">
                        <img src="{{asset('backend/img/avatar.jpg')}}" alt="">
                    </div>
                    <h2><span class="element"></span></h2>
                    <form id="loginform" class="form-vertical" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <button type="submit"><span class="entypo-lock submit"></span></button>
                        <span class="entypo-user inputUserIcon"></span>

                        <input id="email" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                           


                            <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                           
                           
                            @if ($errors->has('email'))
                                <br><span style="color: #ffffff;" class="element2" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif


                            @if ($errors->has('password'))
                                <span style="color: #ffffff;" class="element2" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif


                       



                    </form>
                </div><!-- login-box -->
			</div>
		</div>
	</section>
	<!-- ==== Intro Section End ==== -->



	<!--====== Javascripts & Jquery ======-->	
    
    <script src="{{asset('backend/js/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/login.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/js/main.js')}}" type="text/javascript"></script>
</body>
</html>
