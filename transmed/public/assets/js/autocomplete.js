$(document).ready(function () {
    // Autocomplete for pseudo field
    var $pseudo = $('#pseudo');

    $pseudo.autocomplete({
        source: function (request, response) {
            // console.log("Requesting  autocomplete for pseudo: ", request.term); // Debugging log
            $.ajax({
                url: 'data.php',
                type: 'GET',
                dataType: 'json',
                data: {query: request.term, field: 'pseudo'},
                success: function (data) {
                    // console.log("Response from server: ", data); // Debugging lo
                    response(data.map(function (item) {
                            return {label: item.pseudo, value: item.pseudo};
                        }
                    ));
                },
                error: function (xhr, status, error) {
                    console.log("Error in AJAX request: ", status, error); // Debugging log
                }
            });
        },
        minLength: 2
    });

    // Show 'Autres' field if 'Autres' is selected in pseudo
    $pseudo.on('change', function () {
        if ($(this).val().toLowerCase() === 'autres') {
            $('#autresGroup').show();
            $('#autres').prop('required', true);
        } else {
            $('#autresGroup').hide();
            $('#autres').prop('required', false).val('');
        }
    });

    // Autocomplete for depart and arrivee fields
    function setupAutocomplete(field) {
        $('#' + field).val('').autocomplete({
            source: function (request, response) {
                console.log("Requesting  autocomplete for depart: ", request.term); // Debugging log
                $.ajax({
                    url: 'data.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {query: request.term, field: 'depart_arrivee'},
                    success: function (data) {
                        console.log("Response from server: ", data); // Debugging lo
                        response(data.map(function (item) {
                                return {label: item.location, value: item.location};
                            }
                        ));
                    },
                    error: function (xhr, status, error) {
                        console.log("Error in AJAX request: ", status, error); // Debugging log
                    }
                });
            },
            minLength: 2
        });
    }
    setupAutocomplete('depart');
    setupAutocomplete('arrivee');



    $('#chauffeur').autocomplete({
        source: function (request, response) {
            console.log("Requesting  autocomplete for pseudo: ", request.term); // Debugging log
            $.ajax({
                url: 'data.php',
                type: 'GET',
                dataType: 'json',
                data: {query: request.term, field: 'chauffeur'},
                success: function (data) {
                    console.log("Response from server: ", data); // Debugging lo
                    response(data.map(function (item) {
                            return {label: item.chauffeur, value: item.chauffeur};
                        }
                    ));
                },
                error: function (xhr, status, error) {
                    console.log("Error in AJAX request: ", status, error); // Debugging log
                }
            });
        },
        minLength: 2
    });


    const timeInput = document.getElementById('heurecourse');

    timeInput.addEventListener('blur', () => {
        let timeValue = timeInput.value;

        if (timeValue) {
            let [hours, minutes] = timeValue.split(':').map(Number);

            // Round minutes to nearest 5
            minutes = Math.round(minutes / 5) * 5;

            // Adjust minutes if necessary
            if (minutes === 60) {
                minutes = 0;
                hours = (hours + 1) % 24; // Roll over to the next hour if needed
            }

            // Format hours and minutes with leading zeros if needed
            const formattedHours = hours.toString().padStart(2, '0');
            const formattedMinutes = minutes.toString().padStart(2, '0');

            // Set the value back to the input
            timeInput.value = `${formattedHours}:${formattedMinutes}`;
        }
    });
});