/**
 * Created by Kamran on 12/16/2016.
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


    function showSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'block';
    }

    function hideSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'none';
    }

    function reApplyJs() {
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "100%"}

        };
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
        $(".dial").knob();
    }


    function formatHeaderPagination() {
        $("#form-table-search-new").show();
        $("#form-table-search-origin").hide();
        $("#panel-heading-search").removeClass('col-md-12').addClass('col-md-9');

    }


    function getPagination(thisVar) {
        thisVar = thisVar || "";
        if (ajaxRunning) {
            return;
        }
        ajaxRunning = true;
        // RemoveAllListeners();

        // temp =$(thisVar).attr('data-href');
        // console.log('temp->',temp);

        // #button-search
        //   temp =$('#button-search').data('href');
        //   console.log('temp->',temp);

        var search = $('#input-search').val();
        console.log('search->', search);

        if (search) {
            searchQry = "&search_all=" + search;
        } else {
            searchQry = "";
        }


        var url = "";
        if (thisVar) {
            $(thisVar).click(function (e) {
                e.preventDefault();
                //do other stuff when a click happens
            });
            url = $(thisVar).attr('href');

            if (typeof url === "undefined" || url === '') {
                url = window.location.href + searchQry + "&page=1&order_Type=DESC";
            } else {
                url = $(thisVar).attr('href') + searchQry;
            }

        } else {
            url = window.location.href;

        }

        // var page = parseInt($(thisVar).text());

        // var n = url.indexOf("?");
        // var queString = url.substr(n);
        //
        // queryString = queString.replace("?&", "?");

        queryString = getQuerystring(url);
        var newUrl = "../admin/ajax/ajax_manage.php" + queryString;
        RemoveListenersPagination();
        // showSpinner();
        $.get(newUrl, function (data, status, xhr) {


            if (xhr.readyState == 4 && xhr.status == 200) {

                var result = data;
                $('#table_result').html(data);

                // console.log('Result: ' + result);
                // console.log('Result: ' + result);
                // hideSpinner();
                // $(thisVar).unbind('click').click();

                addAllListeners();
                reApplyJs();
                formatHeaderPagination();

                ajaxRunning = false;

            }
        });

        // addListenerAjaxPagination();
        // RemoveAllListeners();


    }

    function getForm(EditVar) {
        alertClear();
        $('#modal-form').html('');

        $(EditVar).click(function (e) {
            e.preventDefault();
            //do other stuff when a click happens
        });


        var url = $(EditVar).attr('href');
        var id = getParameterByName('id', url);
        var classname = getParameterByName('class_name', url);

        var newUrl = "../admin/ajax/ajax_edit.php";
        newUrl += "?class_name=" + classname;
        if (id) {
            newUrl += "&id=" + id;
        }

        removeListenersPostForm();
        $.get(newUrl, function (data, status, xhr) {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = data;
                $('#modals-form').html(data);
                // alert(data);
                // console.log('Result: ' + result);
                // hideSpinner();
                if (id) {
                    console.log('table_result-form-edit', newUrl);
                } else {
                    console.log('table_result-form-Add', newUrl);

                }
                reApplyJs();

                $('html, body').animate({
                    scrollTop: $("#table_view").offset().top
                }, 1000);

                addListenersPostForm();

            }
        });


    }


    function RemoveListenersPagination() {
        $("#table_result").off("click", "a.ajax-pagination")
            .off('click', '#button-search');
    }

    function RemoveListenersForm() {
        // $( "#table_result" ).off( "click","a.button-edit-form , a.button-add-form" );
        $("a.button-edit-form , a.button-add-form, a.button-delete-form").off("click");

    }

    function RemoveAllListeners() {
        RemoveListenersPagination();
        RemoveListenersForm();

    }

    function addListenerAjaxPagination() {
        // $( "a.ajax-pagination" ).on( "click", function() {
        //     event.preventDefault();
        //     getPagination(this);
        // });

        $('#table_result').on('click', 'a.ajax-pagination', function () {
            event.preventDefault();
            getPagination(this);
        }).on('click', '#button-search', function () {
            event.preventDefault();
            getPagination(this);
        });


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

        var newUrl = "../admin/ajax/ajax_delete.php?class_name=" + $class_name + "&id=" + id;


        $.getJSON(newUrl, function (data, status, xhr) {

            var json = data;
            if (json.hasOwnProperty('errors') && json.errors.length > 0) {
                // displayErrors(json.errors);

                alertError(json.errors);
            } else {
                alertSuccess(json.success);
                getPagination();
            }


        });

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

    function addAllListeners() {
        addListenerAjaxPagination();
        addListenerAjaxForm();

    }


    function enableSubmitButton() {
//              $( "#ajax-submit" ).prop( "disabled", false ).val( "Ajax Submit" );
//          button.prop( "disabled", false ).val( "Ajax Submit" );

//          var button = document.getElementById("ajax-submit");
//         button.disabled=false;
        $("#update-form-button , #add-form-button,#cancel-update-new").prop('disabled', false);


    }


    function disableSubmitButton() {
//              $( "#ajax-submit" ).prop( "disabled", false ).val( "Ajax Submit" );
//          button.prop( "disabled", false ).val( "Ajax Submit" );

//          var button = document.getElementById("ajax-submit");
//         button.disabled=false;
        $("#update-form-button , #add-form-button,#cancel-update-new").prop('disabled', true);


    }


    function alertSuccess(data) {
        data = data || 'no data';
        var output = '<div  class="alert alert-success  fade in"  role="alert" style="font-size: larger" >';
        output += '<a href="#" class="close" data-dismiss="alert">&times;</a>';
        output += '<span class="glyphicon glyphicon-ok" aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
        output += ' <span  class="sr-only">Success:</span>';
        output += data;
        output += '</div>';

        $('#message-ajax').html(output).show();

        // setTimeout(function() {
        //     $('#message-ajax').hide(500);
        // }, 5000);

    }

    function alertError(data) {
        data = data || 'no data';
        var output = '<div  class="alert alert-danger  fade in"  role="alert" >';
        output += '<a href="#" class="close" data-dismiss="alert">&times;</a>';
        output += '<span  class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
        output += ' <span  class="sr-only">Error:</span>';
        output += data;
        output += '</div>';

        $('#message-ajax').html(output).show();


    }


    function alertClear() {
        $('#message-ajax').html('').hide();

    }


    function updateAddForm(thisform) {
        alertClear();
        disableSubmitButton();
        showSpinner();

        var form = "#form_" + $class_name;
        var action = $(form).attr('action');
        var newUrl = "../admin/ajax/ajax_post.php";
        var form_data = $(form).serializeArray();

        console.log(form_data);

        $.post(newUrl, form_data, function (data, status, xhr) {
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            if (xhr.readyState === 4 && xhr.status === 200) {
                hideSpinner();
                enableSubmitButton();
                var json = data;

                console.log(json);

                if (json.hasOwnProperty('errors') && json.errors.length > 0) {

                    alertError(json.errors);
                } else {
                    $("#update-form-button , #add-form-button,#cancel-update-new").prop('disabled', false);
                    alertSuccess(json.success);
                    getPagination();
                    $('#modals-form').html('');
                }


            }
        }, 'json');


    }

    function addListenersPostForm() {
        $("#update-form-button , #add-form-button").on("click", function () {
            event.preventDefault();
            updateAddForm(this);
        });


        $("#cancel-update-new").on("click", function () {
            event.preventDefault();
            $('#modals-form').html('');
        });

    }


    function removeListenersPostForm() {
        $("#update-form-button , #add-form-button").off("click");
        $("#cancel-update-new").off("click");



    }


    function testButtonListeners() {
        $("#ajax-button-on").on("click", function () {
            event.preventDefault();
            alertSuccess();
            toggleView();
        });

        $("#ajax-button-off").on("click", function () {
            event.preventDefault();
            alertError('failed');
        });

    }


    function testShowButton() {
        $("#ajax-button-on,#ajax-button-off").show();
        testButtonListeners();
    }

    function testhideButton() {
        $("#ajax-button-on,#ajax-button-off").hide();
    }

    function toggleView() {
        if ($('#container-view').hasClass('container-fluid')) {
            $('#container-view').removeClass('container-fluid').addClass('container');
        } else {
            $('#container-view').removeClass('container').addClass('container-fluid');

        }

    }

    $('#message-ajax').hide();


    addAllListeners();
    addListenersPostForm();
    testhideButton();
    // testShowButton();
    formatHeaderPagination();


});