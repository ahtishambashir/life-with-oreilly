/* <![CDATA[ */
/// Jquery validate newsletter
jQuery(document).ready(function () {

    $('#newsletter_form').submit(function () {

        var action = $(this).attr('action');

        $("#message-newsletter").slideUp(750, function () {
            $('#message-newsletter').hide();

            $('#submit-newsletter')
                .after('<i class="icon-spin4 animate-spin loader"></i>')
                .attr('disabled', 'disabled');

            $.post(action, {
                email_newsletter: $('#email_newsletter').val()
            },
                function (data) {
                    document.getElementById('message-newsletter').innerHTML = data;
                    $('#message-newsletter').slideDown('slow');
                    $('#newsletter_form .loader').fadeOut('slow', function () { $(this).remove() });
                    $('#submit-newsletter').removeAttr('disabled');
                    if (data.match('success') != null) $('#newsletter_form').slideUp('slow');

                }
            );

        });

        return false;

    });

});

// Jquery validate form contact
$('#contactform').submit(function () {

    var action = $(this).attr('action');

    $("#message-contact").slideUp(750, function () {
        $('#message-contact').hide();

        $('#submit-contact')
            .after('<i class="icon-spin4 animate-spin loader"></i>')
            .attr('disabled', 'disabled');

        $.post(action, {
            name_contact: $('#name_contact').val(),
            phone_contact: $('#phone_contact').val(),
            lastname_contact: $('#lastname_contact').val(),
            email_contact: $('#email_contact').val(),
            main_destination_input: $('#main_destination_input').val(),
            message_contact: $('#message_contact').val(),
            verify_contact: $('#verify_contact').val(),
            first_integer: $('#first_integer').val(),
            second_integer: $('#second_integer').val()
        },
            function (data) {
                document.getElementById('message-contact').innerHTML = data;
                $('#message-contact').slideDown('slow');
                $('#contactform .loader').fadeOut('slow', function () { $(this).remove() });
                $('#submit-contact').removeAttr('disabled');
                if (data.match('success') != null) $('#contactform').slideUp('slow');

            }
        );

    });
    return false;
});

/// Jquery validate contact form detail page
$('#contact_detail').submit(function () {

    var action = $(this).attr('action');

    $("#message-contact-detail").slideUp(750, function () {
        $('#message-contact-detail').hide();

        $('#submit-contact-detail')
            .after('<i class="icon-spin4 animate-spin loader"></i>')
            .attr('disabled', 'disabled');

        $.post(action, {
            name_detail: $('#name_detail').val(),
            email_detail: $('#email_detail').val(),
            message_detail: $('#message_detail').val(),
            verify_contact_detail: $('#verify_contact_detail').val()
        },
            function (data) {
                document.getElementById('message-contact-detail').innerHTML = data;
                $('#message-contact-detail').slideDown('slow');
                $('#contact_detail .loader').fadeOut('slow', function () {
                    $(this).remove()
                });
                $('#submit-contact-detail').removeAttr('disabled');
                if (data.match('success') != null) $('#contact_detail').slideUp('slow');

            }
        );

    });
    return false;
});

// Jquery validate form main contact
$('#mainContactform').submit(function () {

    var action = $(this).attr('action');

    $("#main_form_massage").slideUp(750, function () {
        $('#main_form_massage').hide();

        $('#submit_main_form')
            .after('<i class="icon-spin4 animate-spin loader"></i>')
            .attr('disabled', 'disabled');

        $.post(action, {
            main_input_name: $('#main_input_name').val(),
            main_email_input: $('#main_email_input').val(),
            main_phone_input: $('#main_phone_input').val(),
            main_destination_input: $('#main_destination_input').val(),
            dates: $('#dates').val(),
            adult_main_input: $('#adult_main_input').val(),
            main_child_input: $('#main_child_input').val()
        },
            function (data) {
                document.getElementById('main_form_massage').innerHTML = data;
                $('#main_form_massage').slideDown('slow');
                $('#mainContactform .loader').fadeOut('slow', function () { $(this).remove() });
                $('#submit_main_form').removeAttr('disabled');
                if (data.match('success') != null) $('#mainContactform').slideUp('slow');

            }
        );

    });
    return false;
});

// Jquery validate customize form
$('#customizeForm').submit(function () {

    var action = $(this).attr('action');

    $("#customizeMassage").slideUp(750, function () {
        $('#customizeMassage').hide();

        $('#customizeSubmit')
            .after('<i class="icon-spin4 animate-spin loader"></i>')
            .attr('disabled', 'disabled');

        $.post(action, {
            customizeName: $('#customizeName').val(),
            customizePhone: $('#customizePhone').val(),
            customizeEmail: $('#customizeEmail').val(),
            customizeAdult: $('#customizeAdult').val(),
            customizeChild: $('#customizeChild').val(),
            customizeRoom: $('#customizeRoom').val(),
            customizeDays: $('#customizeDays').val(),
            customizeCity: $('#customizeCity').val(),
            customizeDate: $('#customizeDate').val(),
            customizeTripType: $('#customizeTripType').val(),
            customizeLocation: $('#customizeLocation').val(),
            customizeUserMassage: $('#customizeUserMassage').val(),
            customizaVerify: $('#customizaVerify').val()
        },
            function (data) {
                document.getElementById('customizeMassage').innerHTML = data;
                $('#customizeMassage').slideDown('slow');
                $('#customizeForm .loader').fadeOut('slow', function () { $(this).remove() });
                $('#customizeSubmit').removeAttr('disabled');
                if (data.match('success') != null) $('#customizeForm').slideUp('slow');

            }
        );

    });
    return false;
});

/* ]]> */