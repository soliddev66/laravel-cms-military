/***************************************************************************************
 Template Name    : Allegro | Multipurpose Laravel CMS Script
 Author           : ElseColor
 Version          : 1.0.0
 Created          : 2020
 File Description : Custom js file of the template
 ****************************************************************************************/


$(function() {

    "use strict";

    /* ----------------------------------------------------------------
           [ Alert Auto Close Js ]
-----------------------------------------------------------------*/

    $(function(){
        window.setTimeout(function() {
            $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);
    });

    /* ----------------------------------------------------------------
                [ Prevent Multiple Submit Js ]
-----------------------------------------------------------------*/
    $(function(){
        $('form').on('submit', function () {
            $(this).find(':submit').attr('disabled', 'true');
        });
    });

    /* ----------------------------------------------------------------
              [ Fontawesome IconPicker Js ]
-----------------------------------------------------------------*/

    $('#iconPickerBtn').iconpicker();

    $(".iconpicker-item").click(function() {
        var li = document.getElementById('icon-value');

        if (li.className === "null") {
            document.getElementById("icon").value = "";
        } else {
            document.getElementById("icon").value = li.className;
            document.getElementById("iconpicker-search").value = "اكتب لل";
        }


    });

    /* ----------------------------------------------------------------
           [ Fontawesome IconPicker Rtl Js ]
-----------------------------------------------------------------*/

    var hasRtl  = $('body').hasClass("rtl-version");

    if (hasRtl) {
        $('.iconpicker-search').attr('placeholder', 'اكتب للتصفية');
    }



});