<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dvForum</title>
    <link rel="stylesheet" type="text/css" href='{{ asset("css/app.css") }}' >
    <link rel="stylesheet" type="text/css" href='{{ asset("css/Stylesheet.css") }}' >
</head>

<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<body>
@include('layout.inc.navbar')
    <div class="container mt-3">
        @yield('content')
    </div>
@include('layout.inc.footer')
</body>

<script type="text/javascript">
    $(document).ready(function(){
        function getCurrentTime(){
            let a = new Date();
            let date = a.getDate();
            let month = a.getMonth() + 1;
            let year = a.getFullYear();
            let hour = a.getHours();
            let minute = a.getMinutes();
            let second = a.getSeconds();
            var day = "";
            let d = a.getDay();
            if(d == 0){
                day = "Sunday"
            }
            else if(d == 1){
                day = "Monday";
            }
            else if(d == 2){
                day = "Tuesday"
            }
            else if(d == 3){
                day = "Wednesday"
            }
            else if(d == 4){
            day = "Thursday"
            }
            else if(d == 5){
                day = "Friday"
            }
            else if(d == 6) {
                day = "Saturday";
            }
            if(hour < 10){
                hour = "0" + hour;
            }
            if(minute < 10){
                minute = "0" + minute;
            }
            if(second < 10){
                second = "0" + second;
            }
            var time = day + ", " + date +  "-" + month + "-" + year + ", " + hour + ":" + minute + ":" + second;

            $('#dateTime').html(time);
        }
        setInterval(getCurrentTime,1000);

        $('button[type="submit"] input[type="submit"] ').click(function(){
           $(this).prop('disabled',true);
        });

    })
</script>
</html>

