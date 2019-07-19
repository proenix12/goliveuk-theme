jQuery(document).ready(function () {
    console.log('ajax.js');
    // function string_splitter(string, string_splitter) {
    //     if (string.indexOf(string_splitter) >= 0) {
    //         var string_parts = string.split("[" + string_splitter + "]");
    //         var string_parts_1 = string_parts[1].split("[/" + string_splitter + "]");
    //         var final_string = string_parts_1[0];
    //         return final_string;
    //     } else {
    //         return '';
    //     }
    // }


    // function validateFields(cclas, error_message) {
    //     let element = jQuery(cclas);
    //     element.css('display', 'block').find('span').find('span').html(error_message);
    // }

    //reset inputs
    // jQuery('form#contactForm  :input, form#leftForm  :input').focus(function () {
    //     jQuery(this).css({"border": "1px solid"});
    // });

    // jQuery('#contactForm').submit(function (e) {
    //     e.preventDefault();
    //     var thisForm = jQuery(this);
    //     if (!thisForm.hasClass("inProgress")) {
    //         thisForm.addClass('inProgress');
    //         jQuery.ajax({
    //             type: 'POST',
    //             url: MyAjax.ajaxurl,
    //             data: {
    //                 'action': 'contactForm',
    //             },
    //             success: function (data) {
    //                 let empty_form = string_splitter(data, 'emptyForm');

                        // if (error_errorTerms != '') {
                        //     validateFields('.errorTerms', error_errorTerms)
                        // }
    //                 console.log(data);

    // if (success == 'success') {
    //     thisForm[0].reset();
    // }
    //             },
    //             error: function (errorThrown) {
    //                 console.log(errorThrown);
    //             }
    //         });
    //     }
    // });

    //end document
});