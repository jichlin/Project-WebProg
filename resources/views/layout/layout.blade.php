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
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            const weekDay = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

            let a = new Date();
            let date = a.getDate();
            let month = monthNames[a.getMonth()];
            let year = a.getFullYear();
            let hour = a.getHours();
            let minute = a.getMinutes();
            let second = a.getSeconds();
            let day = weekDay[a.getDay()];

            if(hour < 10){
                hour = "0" + hour;
            }
            if(minute < 10){
                minute = "0" + minute;
            }
            if(second < 10){
                second = "0" + second;
            }
            let time = day + ", " + date +  "-" + month + "-" + year + ", " + hour + ":" + minute + ":" + second;

            $('#dateTime').html(time);
        }
        setInterval(getCurrentTime,1000);

        $('button[type="submit"],input[type="submit"]').on('click',function(){
            if($.data(this, 'clicked')){
                return false;
            }
            else{
                $.data(this, 'clicked', true);
                return true;
            }
        });

        $('input[type="file"]').attr('accept',"image/*")
    })
</script>
</html>

