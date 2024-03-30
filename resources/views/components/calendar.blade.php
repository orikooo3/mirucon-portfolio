<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel × FullXCalendar</title>
</head>

<body>
    <div>
        <div id='calendar' class="h-96"></div>
    </div>

    <script src='{{ asset('https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js') }}'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 初期設定
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // ここに各種オプションを書いていくと設定が適用されていく
                initialView: "dayGridMonth",
                locale: 'ja',
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "",
                    events: '/events',
                },

                dateClick: function(info) {
                    window.location.href ='{{route('meal_records.events')}}';
                }


                // 日付をクリック、または範囲を選択しイベント
                // selectable: true,
                // select: function(info) {
                //     alert("selected" + info.startStr + " to " + info.endStr);
                // },
            });
            calendar.render();
        });
    </script>
</body>

</html>
