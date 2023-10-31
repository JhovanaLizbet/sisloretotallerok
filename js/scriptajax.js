/*
$(document).ready(function() {
    $("#search-input").on("input", function() {
        var searchQuery = $(this).val();

        $.ajax({
            url: "<?php echo site_url('busqueda/buscar'); ?>",
            method: "POST",
            data: { search_query: searchQuery },
            success: function(data) {
                $("#results").html(data);
            }
        });
    });
});
*/

$(document).ready(function() {
    $("#search-input").on("input", function() {
        var searchQuery = $(this).val();

        $.ajax({
            url: "<?php echo site_url('busqueda/buscar'); ?>",
            method: "POST",
            data: { search_query: searchQuery },
            success: function(data) {
                $("#results").html(data);
            }
        });
    });
});
