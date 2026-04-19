<?php


function CollapseOne($title, $content, $num, $id = 2)
{
    ($num == 1) ? $in = "" : $in = "in";

    $output = "";

    $output .= "<div class='accordion-group'>
        <div class='accordion-heading'>
            <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion{$id}' href='#collapse{$num}'>
               <h3 class='text-center'>$title</h3> 
            </a>
        </div>
        <div id='collapse{$num}' class='accordion-body collapse $in'>
            <div class='accordion-inner'>
                $content
            </div>
        </div>
    </div>";

    return $output;
}

function CollapseAll($collapse_individuals, $id = 2)
{
    $output = "<div class='accordion' id='accordion{$id}'>";

    $output .= $collapse_individuals;

    $output .= "</div>";


    return $output;
}

//CollapseAll();


//<div class='accordion-group'>
//        <div class='accordion-heading'>
//            <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#collapseTwo'>
//    Collapsible Group Item #2
//</a>
//        </div>
//        <div id='collapseTwo' class='accordion-body collapse'>
//            <div class='accordion-inner'>
//Anim pariatur cliche...
//            </div>
//        </div>
//    </div>
