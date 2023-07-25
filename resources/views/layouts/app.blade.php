<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        @yield('head')
        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="{{ URL::asset('/img/favicon.ico') }}" />
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        <script src="https://accounts.google.com/gsi/client" async defer></script>
    </head>
	<body>

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
    @guest
    <div id="g_id_onload"
         data-client_id="475480300002-l2candjrbfg1d8bm412nlj7v7s8dhskm.apps.googleusercontent.com"
         data-callback="onSignIn"
         data-login_uri="/login-google"
         data-cancel_on_tap_outside="true"
    ></div>
    @endguest
		<!-- jQuery Plugins -->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/main.js"></script>
    <script>
        // Define the callback function when the user signs in
        function onSignIn(googleUser) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            // You can handle the signed-in user data here or send it to your server for further processing
            console.log(googleUser);
            $.post('/auth/google/login', {
                id_token: googleUser.credential,
                // Add any other relevant data from the profile if needed
            }, function(response) {
                // Process the response from the server
                console.log(response); // Log the response for demonstration purposes
                window.location.reload();
            }).fail(function(error) {
                // Handle any errors that occur during the request
                console.error('Error:', error);
            });
        }
    </script>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyCJlHDKMDebC_QnDUd0HaHsuZ_6fWTLhPU",
            authDomain: "aiblog-390007.firebaseapp.com",
            projectId: "aiblog-390007",
            storageBucket: "aiblog-390007.appspot.com",
            messagingSenderId: "475480300002",
            appId: "1:475480300002:web:bf60814b7cbeb83c4501bb",
            measurementId: "G-97N35Q094L"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>

    @yield('footer')
	</body>
</html>
