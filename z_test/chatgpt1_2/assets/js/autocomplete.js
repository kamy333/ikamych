$(document).ready(function() {
    $("#pseudo").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "data.php",  // Path to data.php file
                type: "GET",
                dataType: "json",
                data: {
                    term: request.term  // Send the term that user types
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.pseudo,  // This is displayed in the autocomplete suggestions
                            value: item.pseudo   // This will be filled in the input box
                        };
                    }));
                }
            });
        },
        minLength: 2  // Minimum characters before triggering autocomplete
    });
});