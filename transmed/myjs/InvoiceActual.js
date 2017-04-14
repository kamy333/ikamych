/**
 * Created by Kamran on 10/18/2015.
 */



function isEmpty(str) {
    return (!str || 0 === str.length);
}

$('#category_id').change(function () {
    //alert('The option with value ' + $(this).val() + ' and text ' + $(this).text() + ' was selected.');

    var URL = "";
    var j = 0;
    var beg = "";
    var values = {};
    $.each($('#form_invoice_actual').serializeArray(), function (i, field) {


        values[field.name] = field.value;

        if (!isEmpty(values[field.name])) {
            if (field.name !== "csrf_token") {
                j++;
                if (j == 1) {
                    beg = "";
                } else {
                    beg = "&";
                }
                URL += beg + field.name + "=" + values[field.name];
            }

        }
    });

    window.location = "new_invoice_actual.php?" + encodeURI(URL);


});
