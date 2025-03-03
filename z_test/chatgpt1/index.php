<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Autocomplete</title>
    <!-- jQuery and jQuery UI (for autocomplete) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

    <h2>Search Country</h2>

    <form method="post" action="submit.php">
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo">
        <input type="submit" value="Submit">
    </form>

    <script type="text/javascript">
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
    </script>

</body>
</html>

