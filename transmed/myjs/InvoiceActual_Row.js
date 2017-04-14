$(function () {
    $('#add').click(function () {
        addnewrow();
    });

    $('body').delegate('.remove', 'click', function () {
        $(this).parent().remove();
    });

    //$(document).on("change", ".price", function() {
    //
    //});

    $(document).on("keyup", ".price", function () {
        var units = this.value;
        var quantity = $(this).parent().prev().children("input").val();
        var subtotal = Number(units) * Number(quantity);

        $(this).parent().next().children("input").val(subtotal);
        total();
    });

    $(document).on("keyup", ".quantity", function () {
        var quantity = this.value;
        var units = $(this).parent().next().children("input").val();
        var subtotal = Number(units) * Number(quantity);

        $(this).parent().next().next().children("input").val(subtotal);
        total();
    });


});

function total() {
    var t = 0;
    $('.amount').each(function (i, e) {
        var amt = $(this).val() - 0;
        t += amt;

    });

    $('.grandtotal').html(t);

}

function addnewrow() {

    var n = ($('.detail tr').length - 0) + 1;

    var tr =
        '<tr>' +
        '<td class="no">' + n + '</td>' + select +
        //' <td class="text-center"><input type="text" class="form-control category" name="category[]"></td>'+
        //'<td class="text-center"><input type="text" class="form-control quantity" name="quantity[]"></td>' +
        //' <td class="text-center"><input type="text" class="form-control price" name="price[]"></td>'+
        // '<td class="text-center"><input type="text" class="form-control amount" name="amount[]"></td>'+
        ' <td class="text-center remove btn btn-danger table-btn1 ">Delete</td>' +
        '</tr>';

    $('.detail').append(tr);
}

function calculateAmt() {
    //$('.detail').('.quantity,.price','keyup',function(){
    //});


    var tr = $(this).parent();

    var qty = tr.find('.quantity').val();
    alert(qty);
    var price = tr.find('.price').val();
    var amt = qty * price;

    //tr.find('.amount').val(amt);


}
