$(document).ready(function () {
    $('#next_order').hide();
    $('#new_order').show();

    $('.returning_customer').click(function () {
        $('#next_order').show(1500);
        $('#new_order').hide(2000);
    });

    $('.new_customer').click(function () {
        $('#next_order').hide(1500);
        $('#new_order').show(2000);
    });

    $('.tab_li').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

});