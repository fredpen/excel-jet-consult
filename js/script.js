function newsletter() {
    $(".alert-box").fadeOut("fast");
     $(".sub_note").html('<p class="footnote" style="text-align: center;color: green;font-size: 20px;margin-top: 30px;">Adding you to our mail list ...</p>');


    var newslettername = $("input[name='newslettername']").val(),
        newsletteremail = $("input[name='newsletteremail']").val();

    if (newslettername.length < 2) {
        fade_in();
         $(".sub_note").html('<p class="footnote" style="text-align: center;color: green;font-size: 30px; margin-top: 30px;">Enter your full name</p>');
        return
    }


    if (validateEmail(newsletteremail) == false) {
        fade_in();
         $(".sub_note").html('<p class="footnote" style="text-align: center;color: green;font-size: 30px; margin-top: 30px;">Kindly enter a valid email</p>');
        return;
    }


     $.post("includes/ajax/newsletter.php", {newslettername: newslettername, newsletteremail:newsletteremail},

        function (data) {
            console.log(data);
            if (data) {
                 $(".sub_note").fadeOut("fast");
                $("#newsletter-form").html('<p class="footnote" style="text-align: center;color: green;font-size: 23px;line-height: 41px;">Thanks for subscribing, we will be in touch :)</p>');
            }else{
                console.log("no dtatata");
            }
    })
}



// get the values of selects
var gender,
    course,
    marry,
    payment;


    // validate emails
function validateEmail(email) {
    var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    return re.test(email);
}

// fades in the error box
function fade_in() {
    $(".alert-box").fadeIn("fast");
}

// chnage the text in the alert box to the error message
function alert_mess(mess) {
    $(".alert_text").text(mess);
}




$("#gender").on("change", function () {
    gender = $(this).children("option:selected").val();
});

$("#course").on("change", function () {
    course = $(this).children("option:selected").val();
});

$("#marry").on("change", function () {
    marry = $(this).children("option:selected").val();
});

$("#payment").on("change", function () {
    payment = $(this).children("option:selected").val();
});

function register() {
    $(".alert-box").fadeOut("fast");

    var name = $("input[name='name']").val(),
        email = $("input[name='email']").val(),
        birthdate = $("input[name='birthdate']").val(),
        phone = $("input[name='phone']").val(),
        country = $("input[name='country']").val(),
        depositor = $("input[name='depositor']").val(),
        account_number = $("input[name='account_number']").val(),
        bank = $("input[name='bank']").val();


    if (name.length < 5) {
        fade_in();
        alert_mess("Kindly enter your full name");
        return;
    }

    if (validateEmail(email) == false) {
        fade_in();
        alert_mess("Kindly enter a valid email");
        return;
    }

    if (birthdate.length < 6) {
        fade_in();
        alert_mess("Select your date of birth");
        return;
    }

    if (phone.length < 11) {
        fade_in();
        alert_mess("Enter a valid phone number");
        return;
    }

    if (country.length < 3) {
        fade_in();
        alert_mess("Enter the country you are registering from");
        return;
    }

    if (depositor.length < 3) {
        fade_in();
        alert_mess("Enter the name of depositor's account");
        return;
    }

    if (bank.length < 2) {
        fade_in();
        alert_mess("Enter the name of the bank used for the payment");
        return;
    }

    if (account_number.length < 10) {
        fade_in();
        alert_mess("Enter the account number used for making the payment");
        return;
    }

    if (gender == undefined) {
        fade_in();
        alert_mess("Kindly indicate your gender");
        return;
    }

    if (course == undefined) {
        fade_in();
        alert_mess("Kindly select a course");
        return;
    }

    if (marry == undefined) {
        fade_in();
        alert_mess("Select your marriage status");
        return;
    }

    if (payment == undefined) {
        fade_in();
        alert_mess("Select your means of payment");
        return;
    }


    // alerting user that the registration is on going
    fade_in();
    alert_mess("Processing your request ...");


    // make the ajax request
    $.post("includes/ajax/register.php",
        {
            name: name,
            email: email,
            birthdate: birthdate,
            phone: phone,
            country: country,
            depositor: depositor,
            account_number: account_number,
            gender:gender,
            course:course,
            marry:marry,
            payment:payment,
            bank:bank
        },

        function (data) {
            console.log(data);

        // if registration is successful
        if (data) {

            // $(".fail_container").fadeIn("slow");
            $(".result_container").fadeIn("slow");

        } else if (!data) {

            $(".fail_container").fadeIn("slow");
        }

    });
}


$(document).ready(function () {

    // close the modal for user to edit thier details
    $("#close").on("click", function(e){
        $(".fail_container").fadeOut("slow");
        $(".alert-box").fadeOut("fast");
    })

    // fadeout alert box
    $(".closed").on("click", function (e) {
        $(".alert-box").fadeOut("slow");
    })


     $("#registerbtn").on("click", function(e){
        e.preventDefault();
    })

      $("#newsletterbtn").on("click", function(e){
        e.preventDefault();
    })

});




