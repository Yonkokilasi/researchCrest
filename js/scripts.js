
$(document).ready(function () {

    // $(":submit").attr("disabled", true);

    // Show the first section with an animation
    $('.wizard_content_details').show();

    // Continue is clicked on paper details section
    $('#next-details').click(function () {
        // Hide paper details section
        $('.wizard_heading_details').removeClass('active_heading').addClass('clickable_heading details_clickable');
        $('.wizard_content_details').hide();

        // Show paper content section
        $('.wizard_content_instructions').show(1000);
        $('.wizard_heading_instructions').addClass('active_heading');
    });

    // Continue is clicked on paper instructions section
    $('#next-instructions').click(function () {
        // Hide instructions section
        $('.wizard_heading_instructions').removeClass('active_heading').addClass('clickable_heading');
        $('.wizard_content_instructions').hide();

        // Show calculator section
        $('.wizard_content_calculator').show(1000);
        $('.wizard_heading_calculator').addClass('active_heading');
    });

    // Continue is clicked on calculator section
    $('#next-calculator').click(function () {

        // Hide Calculations section
        $('.wizard_content_calculator').hide();
        $('.wizard_heading_calculator').removeClass('active_heading').addClass('clickable_heading');

        // Show additional feature section
        $('.wizard_content_additional_features').show(1000);
        $('.wizard_heading_additional_features').addClass('active_heading');

        //Show all other headings
        $('.wizard_heading_details').show();
        $('.wizard_heading_instructions').show();
        $('.wizard_heading_calculator').show();
        $('.wizard_heading_additional_features').show();

    });

    // Continue is clicked on additional features section
    $('#next-add').click(function () {
        // Hide Additional  features section
        $('.wizard_content_additional_features').hide();
        $('.wizard_heading_additional_features').removeClass('active_heading').addClass('clickable_heading clickable');

        // Show login section
        $('.wizard_content_login').show(1500);
        $('.wizard_heading_login').addClass('active_heading');
    });

    $('.wizard_heading_instructions').click(function () {
        $('.wizard_heading_instructions').addClass('active_heading ').removeClass('clickable_heading');
        $('.wizard_heading_additional_features').removeClass('active_heading').addClass('clickable_heading');
        $('.wizard_heading_login').removeClass('active_heading').addClass('clickable_heading');
        $('.wizard_content_instructions').slideToggle('slow');
        $('.wizard_content_additional_features').hide();
        $('.wizard_content_details').hide();
        $('.wizard_content_calculator').hide();
        $('.wizard_content_login').hide();
        $('.wizard_content_calculator').hide();
    });

    $('.wizard_heading_calculations').click(function () {
        $('.wizard_content_calculator').slideToggle('slow');
        $('.wizard_content_additional_features').hide();
        $('.wizard_content_login').hide();
        $('.wizard_content_details').hide();
        $('.wizard_content_instructions').hide();
    });

    $('.wizard_heading_additional_features').click(function () {
        $('.wizard_content_additional_features').slideToggle('slow');
        $('.wizard_content_login').hide();
        $('.wizard_content_details').hide();
        $('.wizard_content_calculator').hide();
        $('.wizard_content_instructions').hide();
    });

    $('.wizard_heading_login').click(function () {
        $('.wizard_content_login').slideToggle('slow');
    });

});
// Check promotional amount
function checkAmount() {
    var promoAmount = document.getElementById("promoCode").value;

    if (promoAmount) {
        $.ajax({
            type: 'post',
            url: 'php/percentage.php',
            data: {
                promoAmount: promoAmount,
            },
            success: function (response) {
                // calculator()
                var amnt = response;
                $('#promoAmount').html(amnt);
                if (response == "Promotional code exists") {
                    return true;
                } else {
                    return false;
                }
            }
        });


    } else {
        $('#promoAmount').html("");
        return false;
    }

}
// Check amount from form input

var forceSubmit = false;

function calculator(value) {

    // High School
    var acadlvl = ""; //Academic level
    var type = ""; //Type Of Work
    var num = ""; //Number Of pages
    var deadline = ""; //date
    var sp = ""; // spacing
    var specificWriter = ""; // specific writer
    var digitalSources = ""; // Digital sources
    var promoCode = ""; // Promotional Code
    var promoCodes = $('#promoCode').val();
    $.post("php/percentage.php", {
        "promoCode": promoCodes
    }, function (data) {
        //alert(data);
        if (value == "#typeOfWork") {


            type = $(value + " option:selected").val();
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            num = $("#pages").val();
            console.log("Here we go ", num);
            deadline = $("#deadline").val();
            digitalSources = $("#digitalSources").val();
            sp = document.querySelector('input[name="spacing"]:checked').value;
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }

        }
        if (value == "#deadline") {
            deadline = $(value + " option:selected").val();
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            num = $("#pages").val();
            type = $("#typeOfWork").val();
            digitalSources = $("#digitalSources").val();
            sp = document.querySelector('input[name="spacing"]:checked').value;
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }


        }
        if (value == "#pages") {

            num = $("#pages").val();
            deadline = $("#deadline").val();
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            type = $("#typeOfWork").val();
            digitalSources = $("#digitalSources").val();
            sp = document.querySelector('input[name="spacing"]:checked').value;
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }


        }
        if (value == "#spacing") {
            sp = document.querySelector('input[name="spacing"]:checked').value;
            deadline = $("#deadline").val();
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            type = $("#typeOfWork").val();
            digitalSources = $("#digitalSources").val();
            num = $("#pages").val();
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }

        }
        if (value == "#level") {
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            deadline = $("#deadline").val();
            sp = document.querySelector('input[name="spacing"]:checked').value;
            type = $("#typeOfWork").val();
            num = $("#pages").val();
            digitalSources = $("#digitalSources").val();
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }


        }
        if (value == "#specificWriter") {
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            deadline = $("#deadline").val();
            sp = document.querySelector('input[name="spacing"]:checked').value;
            type = $("#typeOfWork").val();
            num = $("#pages").val();
            digitalSources = $("#digitalSources").val();
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }

        }
        if (value == "#promoCode") {
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            deadline = $("#deadline").val();
            sp = document.querySelector('input[name="spacing"]:checked').value;
            type = $("#typeOfWork").val();
            num = $("#pages").val();
            digitalSources = $("#digitalSources").val();
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }


        }
        if (value == "#digitalSources") {
            digitalSources = $(value + " option:selected").val();
            acadlvl = document.querySelector('input[name="level"]:checked').value;
            deadline = $("#deadline").val();
            sp = document.querySelector('input[name="spacing"]:checked').value;
            type = $("#typeOfWork").val();
            num = $("#pages").val();
            if ($("#specificWriter").val() == '') {
                specificWriter = 0;
            } else {
                specificWriter = 5;
            }
            if (data == 1) {
                promoCode = parseInt(data);
            } else {
                promoCode = (1 - parseInt(data) / 100);
            }

        }

        // if the promocode is incorrect set it to 1 
        if (isNaN(promoCode)) {
            promoCode = 1;
        }

        result1 = parseFloat(promoCode) * parseFloat(type) * parseFloat(acadlvl) * parseFloat(num) * parseFloat(deadline) * parseFloat(sp) + parseFloat(specificWriter) + parseFloat(digitalSources) + parseFloat('2.0');

        if (isNaN(result1)) {
            return;
        } else {
            result = parseFloat(result1).toFixed(0);
        }

        $("#amount").attr("value", result);
        $("#amount2").attr("value", result);
        $("#grand_total").attr("value", result);
        $("#grand_total2").attr("value", result);

    });

}

function randomString() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    //abcdefghiklmnopqrstuvwxyz
    //ABCDEFGHIJKLMNOPQRSTUVWXYZ
    var string_length = 8;
    var randomstring = '';
    for (var i = 0; i < string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum, rnum + 1);
    }
    document.order.regId.value = randomstring;
}

// Check email
function checkemail() {
    var email = document.getElementById("email").value;

    if (email) {
        $.ajax({
            type: 'post',
            url: 'php/checkdata.php',
            data: {
                user_email: email,
            },
            success: function (response) {
                $('#email_status').html(response);
                if (response == "email is ok") {
                    return true;
                } else {
                    return false;
                }
            }
        });


    } else {
        $('#email_status').html("");
        return false;
    }

}
// Check email

// password
$(function () {
    $("#password_Match").keyup(function () {
        var password = $("#password").val();
        $("#divCheckPasswordMatch").html(password == $(this).val() ? "<span style='color: #0f0;'>Passwords match.</span>" : "<span style='color: #f00;'>Passwords do not match!</span>");
    });
});

// Returning customer
function checkemail2() {
    var email2 = document.getElementById("email2").value;

    if (email2) {
        $.ajax({
            type: 'post',
            url: 'php/checklogin.php',
            data: {
                user_email: email2,
            },
            success: function (response) {
                $('#email2_status').html(response);
                if (response == "email is ok") {
                    return true;
                } else {
                    return false;
                }
            }
        });


    } else {
        $('#email_status').html("");
        return false;
    }

}
// Returning customer

function check_password_safety(password) {

    var msg = "";
    var points = password.length;
    var password_info = document.getElementById('password_info');

    var has_letter = new RegExp("[a-z]");
    var has_caps = new RegExp("[A-Z]");
    var has_numbers = new RegExp("[0-9]");
    var has_symbols = new RegExp("\\W");

    if (has_letter.test(password)) {
        points += 4;
    }
    if (has_caps.test(password)) {
        points += 4;
    }
    if (has_numbers.test(password)) {
        points += 4;
    }
    if (has_symbols.test(password)) {
        points += 4;
    }


    if (points >= 24) {
        msg = '<span style="color: #0f0;">Your password is strong!</span>';
    } else if (points >= 16) {
        msg = '<span style="color: #00f;">Your password is medium!</span>';
    } else if (points >= 12) {
        msg = '<span style="color: #fa0;">Your password is weak!</span>';
    } else {
        msg = '<span style="color: #f00;">Your password is very weak!</span>';
    }

    password_info.innerHTML = msg;
}

// Check password
function checkpass() {
    var email2 = document.getElementById("email2").value;
    var password2 = document.getElementById("password2").value;
    if (password2) {
        $.ajax({
            type: 'post',
            url: 'php/user_login.php',
            data: {
                user_email: email2,
                user_password: password2,
            },
            success: function (response) {
                $('#pass_status').html(response);
                if (response == "password is ok") {
                    return true;
                } else {
                    return false;
                }
            }
        });


    } else {
        $('#email_status').html("");
        return false;
    }

}
// paypal skrill checker
$(document).ready(function () {
    $(".cb-enable").click(function () {
        var parent = $(this).parents('.switch');
        $('.cb-disable', parent).removeClass('selected');
        $(this).addClass('selected');
        $('.checkbox', parent).attr('checked', true);
    });
    $(".cb-disable").click(function () {
        var parent = $(this).parents('.switch');
        $('.cb-enable', parent).removeClass('selected');
        $(this).addClass('selected');
        $('.checkbox', parent).attr('checked', false);
    });
});

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// Check writer
function checkwriter() {
    var writer = document.getElementById("specificWriter").value;

    if (writer) {
        $.ajax({
            type: 'post',
            url: 'php/writer.php',
            data: {
                writer_id: writer,
            },
            success: function (response) {
                $('#chooseWriter').html(response);
                if (response == "writer Id exists..") {
                    return true;
                } else {
                    return false;
                }
            }
        });


    } else {
        $('#chooseWriter').html("");
        return false;
    }

}
// Check writer

// Check promotional code
function checkcode() {
    var promoCode = document.getElementById("promoCode").value;

    if (promoCode) {
        $.ajax({
            type: 'post',
            url: 'php/checkcode.php',
            data: {
                promoCode: promoCode,
            },
            success: function (response) {
                $('#checkcode').html(response);
                if (response == "Promotional code exists") {
                    return true;
                } else {
                    return false;
                }
            }
        });


    } else {
        $('#checkcode').html("");
        return false;
    }

}
// Check promotional code