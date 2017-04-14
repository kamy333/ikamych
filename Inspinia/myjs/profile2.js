/**
 * Created by Kamran on 2/13/2017.
 */


function updateRecord(thisVar) {
    var href = $(thisVar).data('newhref');
    var newUrl = "ajax/profile.php" + href;
    // alert(newUrl);

    RemoveListenersNotes();

    $.get(newUrl, function (data, status, xhr) {
        // alert(data);
        $('#smallNotelist').html(data);
        addListenersNotes();
        addListenersh5hrefNote();
    });


}
function RemoveListenersNotes() {
    // $( "#table_result" ).off( "click","a.button-edit-form , a.button-add-form" );
    $("a.smallNoteListChecklink").off("click");
    $("#h5href").off("click");

}

function addListenersNotes() {
    $("a.smallNoteListChecklink").on("click", function () {
        event.preventDefault();
        // alert('hello profile');
        updateRecord(this);
    });
}

function addListenersNotesEditDelete() {
    $("a.NoteList-link-edit").on("click", function () {
        event.preventDefault();
        var href = $(this).data('myhrefedittodolist');
        // alert(ibox());
        // $( "#result" ).load( "ajax/test.html #container" );

        // $('#smallNotelistibox').html(ibox());

        $("#smallNotelistForm").load(href);
        // updateRecordEdit(this);
    });

    $("a.NoteList-link-delete").on("click", function () {
        event.preventDefault();
        var href = $(this).data('myhrefdeletetodolist');
        // alert(href);
        if (confirm("are you sure you delete")) {
            $("#smallNotelistForm").load(href);
        } else {
            alert("Deletion Cancelled!");
        }

        // updateRecordEdit(this);
    });


}

function addListenersh5hrefNote() {
    $("#h5href").on("click", function () {
        event.preventDefault();
        // alert('hello profile');
        updateRecord(this);
    });
}


function addHoverListenerNoteList() {
    var i = 0;
    $("li.ul-list-SmallNote")
        .mouseout(function () {
            var a = $(this).data('myid');
            // alert('out '+a);
            var jselect = "#NoteList-link-all" + a;
            $(jselect).css("display", "none");


        })
        .mouseover(function () {
            var a = $(this).data('myid');
            // alert('over '+a);
            // https://www.ikamy.ch/Inspinia/profile.php
            var jselect = "#NoteList-link-all" + a;
            $(jselect).css("display", "inline");


        })
        .click(function () {
            // alert('hi');
            var a = $(this).data('myid');
            var jselectedit = "#NoteList-link-edit" + a;
            var jselectdelete = "#NoteList-link-delete" + a;
            var jselect = "#NoteList-link-all" + a;

            $(jselect).css("background-color ", "red");


        });
}


addListenersNotes();
addListenersh5hrefNote();
addHoverListenerNoteList();
addListenersNotesEditDelete();


function ibox($content, $col, $h5, $iboxid) {

    // $content="",$col=5,$h5="Header"

    $content = $content || "<div id='smallNotelistForm'></div>";
    $col = $col || 10;
    $h5 = $h5 || "header";
    $iboxid = $iboxid + "";

    $output = "<div class='col-lg-" + $col + "' id='" + $iboxid + "' >";
    $output += " <div class='ibox float-e-margins'>";
    $output += "<div class='ibox-title'>";
    $output += "<h5>";
    $output += $h5;
    $output += "</h5>";
    $output += "<div class='ibox-tools'>";
    $output += " <a class='collapse-link'>";
    $output += "<i class='fa fa-chevron-up'></i>";
    $output += "</a>";
    $output += "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>";
    $output += "<i class='fa fa-wrench'></i>";
    $output += "</a>";
    $output += "  <ul class='dropdown-menu dropdown-user'>";
    $output += "<li><a href='#'>Config option 1</a>";
    $output += "</li>";
    $output += "<li><a href='#'>Config option 2</a>";
    $output += "</li>";
    $output += "</ul>";
    $output += "<a class='close-link'>";
    $output += "<i class='fa fa-times'></i>";
    $output += "</a>";
    $output += "</div>";
    $output += "</div>";
    $output += "<div class='ibox-content'>";
    // $output+=$content;
    $output += $content;
    $output += "</div>";
    $output += "</div>";
    $output += " </div>";


    return $output;
}
