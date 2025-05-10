$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $(".side-nav .collapse").on("hide.bs.collapse", function () {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });

    $(".side-nav .collapse").on("show.bs.collapse", function () {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
    });

    function updateStats() {
        $.ajax({
            url: base_url + "Admin_Control/get_stats_data",
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#released_count").text(response.released_count);
                $("#unreleased_count").text(response.unreleased_count);
                $("#admin_count").text(response.admin_count);
                $("#user_count").text(response.user_count);
            },
            error: function () {
                console.log("Failed to fetch stats");
            }
        });
    }

    updateStats();
    setInterval(updateStats, 10000);
});
