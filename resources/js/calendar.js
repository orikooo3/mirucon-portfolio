import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";

document.addEventListener("DOMContentLoaded", function () {
    // 初期設定
    var calendarEl = document.getElementById("calendar");

    let calendar = new Calendar(calendarEl, {
        plugins: [interactionPlugin, dayGridPlugin],
        // ここに各種オプションを書いていくと設定が適用されていく
        initialView: "dayGridMonth",
        locale: "ja",
        buttonText: {
            today: "今日",
        },

        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "",
        },

        dateClick: function (info) {
            let dateStr = info.dateStr;
            window.location.href = "/meal_records/record?date=" + dateStr;
        },

    });
    calendar.render();
});
