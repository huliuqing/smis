<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Notification Test</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand123" href="{{ url('/') }}">
                        Notification Test
                    </a>
                </div>
            </div>
        </nav>

        <div class="content">
                <div class="m-b-md">
                    New notification will be alerted realtime!
                </div>
        </div>
    </div>

    <!-- receive notifications -->
    <script type="module"  src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.14.2/echo.js"></script>

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <script>
        Pusher.logToConsole = true;
        // window.Echo = new Echo({
        //     broadcaster: 'pusher',
        //     key: 'c91c1b7e8c6ece46053b',
        //     cluster: 'ap2',
        //     encrypted: true,
        //     logToConsole: true
        // });
        //
        // Echo.private('school-notification').listen('NotificationEvent', (e) => {
        //     alert(e.message.message);
        // });

        var pusher = new Pusher("180cf793c3dd274ecc22", {
            cluster: "ap3",
        })

        var channel = pusher.subscribe('school-notification');
        channel.bind('App\\Events\\NotificationEvent', function(data) {
            console.info(data);
        });
    </script>
    <!-- receive notifications -->
</body>
</html>