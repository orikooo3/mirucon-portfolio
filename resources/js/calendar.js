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
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "",
        },

        dateClick: function (info) {
            // Ajaxリクエストの設定
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            // Ajaxリクエストの送信
            $.ajax({
                type: "POST",
                url: "/meal_records/events",
                dataType: "json",
                data: { date: info.dateStr },
                success: function (res) {
                    console.log(res);
                },
                error: function (xhr, status, error) {
                    console.log(error.statusText);
                },
            })
                .done(function () {
                    alert("成功");
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    alert("ファイルの取得に失敗しました。");
                    console.log("ajax通信に失敗しました");
                    console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
                    console.log("textStatus     : " + textStatus); // タイムアウト、パースエラー
                    console.log("errorThrown    : " + errorThrown.message); // 例外情報
                });
        },
    });
    calendar.render();
});
