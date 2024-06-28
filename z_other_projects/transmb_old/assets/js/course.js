/**
 * Created by kamy3 on 5/29/2017.
 */




$(document).ready(function () {
// hideSpinner();

    var ajaxRunning = false;
    var icount = 0;
    var $class_name = getParameterByName('class_name');

    // alert($class_name);
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

    function showSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'block';
    }

    function hideSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'none';
    }

    function alertSuccess(data) {
        data = data || 'no data';
        var output = '<div style="background-color: darkgreen;color: white;margin-left: 2em">';
        // output +='<a href="#" class="close" data-dismiss="alert">&times;</a>';
        output += '<span></span>';
        output += '<span>Success:</span>';
        output += '<span>' + data + '</span>';
        output += '</div>';

        $('#message-ajax').html(output).show();

        // setTimeout(function() {
        //     $('#message-ajax').hide(500);
        // }, 5000);

    }

    function alertError(data) {
        data = data || 'no data';
        var output = '<div style="background-color: red;color: white;margin-left: 2em">';
        // output +='<a href="#" class="close" data-dismiss="alert">&times;</a>';
        output += '<span></span>';
        output += '<span>Error:</span>';
        output += '<span>' + data + '</span>';
        output += '</div>';

        $('#message-ajax').html(output).show();


    }


    function alertClear() {
        $('#message-ajax').html('').hide();

    }


    function deleteRecord(thisVar) {
        var resp = confirm('Would you like to clear');
        if (!resp) {
            return;
        }
        alertClear();
        var href = $(thisVar).attr('href');
        var id = parseInt(getParameterByName('id', href));
        var $class = getParameterByName('class_name', href);
        var courseDate = getParameterByName('course_date', href);
        // if (isNull(courseDate)){
        //     var dt=new Date();
        // }
        var newUrl = "admin/ajax/ajax_delete.php?class_name=" + $class_name + "&id=" + id;

        // alert(courseDate);

        $.getJSON(newUrl, function (data, status, xhr) {

                // alert('inside');
                var json = data;
                if (json.hasOwnProperty('errors') && json.errors.length > 0) {
                    // displayErrors(json.errors);

                    // location.reload(true);
                    alertError(json.errors);
                } else {
                    // return;                            alert(json.success);

                    alertSuccess(json.success);

                    window.location.href = "index.php?class_name=CourseMobile&course_date=" + courseDate + "#pageListCourse";


                    // getPagination();
                }


            }
        );

    }

    function updateDefiningTiming(thisVar) {
        // var resp = confirm('Would you like to clear');
        // if (!resp) {
        //     return;
        // }
        // alertClear();
        var href = $(thisVar).attr('href');
        var id = parseInt(getParameterByName('id', href));
        var $class = getParameterByName('class_name', href);
        var courseDate = getParameterByName('course_date', href);
        // if (isNull(courseDate)){
        //     var dt=new Date();
        // }
        var newUrl = "admin/ajax/ajax_delete.php?class_name=" + $class_name + "&id=" + id;

        // alert(courseDate);

        $.getJSON(newUrl, function (data, status, xhr) {

                // alert('inside');
                var json = data;
                if (json.hasOwnProperty('errors') && json.errors.length > 0) {
                    // displayErrors(json.errors);

                    // location.reload(true);
                    alertError(json.errors);
                } else {
                    // return;                            alert(json.success);

                    alertSuccess(json.success);

                    window.location.href = "index.php?class_name=CourseMobile&course_date=" + courseDate + "#pageListCourse";


                    // getPagination();
                }


            }
        );

    }


    function addListenerAjaxForm() {

        $("a.button-edit-form , a.button-add-form").on("click", function () {
            event.preventDefault();
            getForm(this);
        });

        $("a.button-delete-form").on("click", function () {
            event.preventDefault();

            deleteRecord(this);
        });


    }


    addListenerAjaxForm();


});