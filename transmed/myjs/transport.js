/**
 * Created by kamy3 on 4/14/2017.
 */

$(document).ready(function () {


    var ajaxRunning = false;
    var icount = 0;
    var $class_name = getParameterByName('class_name');

    // hideSpinner();
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function getQuerystring(url) {
        var n = url.indexOf("?");
        var queryString = url.substr(n);
        return queryString.replace("?&", "?");
    }

    function addListenerPivotModel() {

        $("tr.table-dates").on("click", function () {
            event.preventDefault();
        });

        $("#show-dates").on("click", function () {
            event.preventDefault();
            $( "tr.tr-table-dates" ).toggleClass( 'hidden' );
            if ($(this).text() === "Show Date"){
                $(this).text("Hide Date");

            }
            else {
                $(this).text("Show Date");
            }

        });

        $("#show-client-form").on("click", function () {
            event.preventDefault();
            $("#form-find-by-client").toggleClass('hidden');
            // if ($(this).text() === "Show Date"){
            //     $(this).text("Hide Date");
            //
            // }
            // else {
            //     $(this).text("Show Date");
            // }

        });


        $(".addDate-course").on("click", function () {
            event.preventDefault();
            alert(this.parent.text());
            alert("x");
        });


    }

    addListenerPivotModel();


});