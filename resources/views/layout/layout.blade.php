<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dvForum</title>
    <link rel="stylesheet" type="text/css" href='{{ asset("css/app.css") }}' >
</head>
<script src="{{asset('jquery/jquery.min.js')}}">
</script>

<body>
@include('layout.inc.navbar')
    <div class="container">
        @yield('content')
    </div>
@include('layout.inc.footer')
</body>

<script type="text/javascript">
    $(document).ready(function(){
        function getCurrentTime(){
            var a = new Date();
            var d = a.getDay();
            var date = a.getDate();
            var month = a.getMonth(); + 1;
            var year = a.getFullYear();
            var hour = a.getHours() + 1;
            var minute = a.getMinutes();
            var second = a.getSeconds();
            var day;
            if(d == 0){
                day = "Sunday"
            }
            else if(d == 1){
                day = "Monday";
            }
            else if(d == 2){
                day == "Tuesday"
            }
            else if(d == 3){
                day == "Wednesday"
            }
            else if(d == 4){
                day == "Thursday"
            }
            else if(d == 5){
                day = "Friday"
            }
            else {
                day = "Saturday";
            }
            $('#dateTime').html(day + ", " + date +  "-" + month + "-" + year + ", " + hour + ":" + minute + ":" + second);
        }
        setInterval(getCurrentTime,1000);

    })
</script>
</html>

