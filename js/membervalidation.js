
$(document).ready(function () {
    $('form').submit(function () {

        var member_fname = $('#member_fname').val();
        var member_lname = $('#member_lname').val();
        var member_email = $('#email').val();
        var member_dob = $('#member_dob').val();
        var member_albatch = $('#member_albatch').val();
        var member_nic = $('#member_nic').val();
        var member_tel = $("#member_tel").val();
        var role_id = $("#role_id").val();
        var member_image = $('#member_image').val();

        var email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        if (member_fname == "") {
            $('#msg').text("Empty First Name");
            $('#member_fname').focus();
            return false;
        }
        if (member_lname == "") {
            $('#msg').text("Empty Last Name");
            $('#member_lname').focus();
            return false;
        }

        if (member_dob != "") {
            //alert(member_dob);
            var cdate = new Date();
            var cyear = cdate.getFullYear();
            var cmonth = cdate.getMonth();
            var cd = cdate.getDate();

            var ddate = new Date(member_dob);
            var dyear = ddate.getFullYear();
            var dmonth = ddate.getMonth();
            var dd = ddate.getDate();

            var age = cyear - dyear;
            var m = cmonth - dmonth;
            var d = cd - dd;

            if (m < 0 || (m == 0 && d < 0)) {
                age--;
            }

            if (age < 19) {
                $('#msg').text("Under Age");
                $('#member_dob').focus();
                $('#member_dob').select();
                return false;
            }
        }
        //if (!($('#male').is(':checked') || $('#female').is(':checked'))) {
           // $('#msg').text("Please select your gender");
          //  return false;
       // }

        if (member_dob != "" && member_nic != "") {
            var ypat1 = member_dob.substring(2, 4);
            var ypat2 = member_nic.substring(0, 2);
            if (ypat1 != ypat2) {
                $('#msg').text("DOB and NIC are not matching");
                $('#member_nic').focus();
                $('#member_nic').select();
                return false;
            }

            if (member_albatch == "") {
                $('#msg').text("Empty A/L Batch");
                $('#member_albatch').focus();
                return false;
            }

            if (!member_email.match(email)) {
                $('#msg').text("Invalid Email");
                $('#email').focus();
                $('#email').select();
                return false;
            }

            var hid = $('#hid').val();
            if (hid == 0) {
                $('#msg').text("Existing Email");
                $('#email').focus();
                $('#email').select()
                return false;

            }

            var nicpat = /^[0-9]{9}[vVxX]$/;
            if (member_nic != "") {
                if (!member_nic.match(nicpat)) {
                    $('#msg').text("Invalid NIC");
                    $('#member_nic').focus();
                    $('#member_nic').select();

                    return false;
                }
            }

        }
        var telpat = /^[0][0-9]{9}$/;
        var telpat1 = /^\+94[0-9]{9}$/;
        if (member_tel != "") {
            if (!(member_tel.match(telpat) || member_tel.match(telpat1))) {
                $('#msg').text("Invalid Telephone No");
                $('#member_tel').focus();
                $('#member_tel').select();
                return false;
            }
        }
        if (role_id == "") {
            $('#msg').text("Please Select a Role Name");
            $('#role_id').focus();
            return false;
        }
        if (member_image != "") {
            var ext = member_image.split(".");
            var len = ext.length;
            var e = ext[len - 1];
            var ex = e.toLowerCase();
            var arr = ['jpg', 'png', 'gif', 'jpeg', 'bmp'];
            if ($.inArray(ex, arr) == -1) {
                $('#msg').text("Invalid Image Extension");
                $('#member_image').focus();
                return false;
            }
        }
    });
});



