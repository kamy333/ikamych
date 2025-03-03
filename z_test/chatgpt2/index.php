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



    <label for="datecourse">Date Course:</label>
    <input type="date" id="datecourse" name="datecourse">

    <label for="heurecourse">Heure Course:</label>
    <input type="time" id="heurecourse" name="heurecourse">

    <label for="pseudo">Pseudo:</label>
    <input type="text" id="pseudo" name="pseudo">

    <label for="depart">Depart:</label>
    <input type="text" id="depart" name="depart">

    <label for="arrivee">Arrivee:</label>
    <input type="text" id="arrivee" name="arrivee">

    <label for="country">Country:</label>
    <input type="text" id="country" name="country">

    <!-- Hidden input field to store the country ID -->
    <input type="hidden" id="country_id" name="country_id">

    <input type="submit" value="Submit">
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $("#country").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "data.php",  // Path to data.php file
                    type: "GET",
                    dataType: "json",
                    data: {
                        term: request.term  // Send the term that user types
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {
                                label: item.country_name,  // This is displayed in the autocomplete suggestions
                                value: item.country_name,   // This will be filled in the input box
                                id: item.id                 // Store the country ID
                            };
                        }));
                    }
                });
            },
            minLength: 2,  // Minimum characters before triggering autocomplete
            select: function (event, ui) {
                // Set the selected country ID into the hidden field
                $('#country_id').val(ui.item.id);
            }
        });
    });
</script>

</body>
</html>

