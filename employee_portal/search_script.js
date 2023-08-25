$(document).ready(function () {
    $("#search-button").click(function () {
        const searchBy = $("#search-by").val();
        const keyword = $("#keyword").val();

        $.ajax({
            type: "GET",
            url: "search.php",
            data: { searchBy: searchBy, keyword: keyword },
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    $("#search-results").html(data.results);
                } else {
                    $("#search-results").html("Error: " + data.message);
                }
            },
            error: function () {
                $("#search-results").html("An error occurred while fetching data.");
            }
        });
    });
});
