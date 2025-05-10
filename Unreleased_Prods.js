$(document).ready(function () {
    $(".zoomable-image").each(function () {
        $(this).elevateZoom({
            zoomType: "lens",
            lensShape: "round",
            lensSize: 150,
            responsive: true,
            scrollZoom: true
        });
    });
});
