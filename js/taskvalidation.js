$(document).ready(function () {
    $('form').submit(function () {

        var task_name = $('#task_name').val();
        var event_id = $('#event_id').val();
        var task_des = $('#task_des').val();
        var task_deadline = $('#task_deadline').val();
        var task_priority = $('#task_priority').val();
        var member_name = $('#member_name').val();
        var task_assigned_budget = $("#task_assigned_budget").val();
        var task_actual_budget = $("#task_actual_budget").val();
        var task_comment = $('#task_comment').val();
        var task_progress = $('#task_progress').val();

        //  var email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        if (task_name == "") {
            $('#msg').text("Empty Task Name");
            $('#task_name').focus();
            return false;
        }
        if (event_id == "") {
            $('#msg').text("Empty Event Name");
            $('#event_id').focus();
            return false;
        }
        if (task_deadline == " ") {
            $('#msg').text("Empty Task Deadline");
            $('#task_deadline').focus();
            return false;
        }

        if (task_deadline != "") {
            //alert(member_dob);
            var cdate = new Date();
            var cyear = cdate.getFullYear();
            var cmonth = cdate.getMonth();
            var cd = cdate.getDate();

            var ddate = new Date(task_deadline);
            var dyear = ddate.getFullYear();
            var dmonth = ddate.getMonth();
            var dd = ddate.getDate();


            var d = ddate - ddate;

            if (d < 0) {
                $('#msg').text("Invalid deadline");
                $('#task_deadline').focus();
                $('#task_deadline').select();
                return false;
            }

        }
        /*
         if (!($('#male').is(':checked') || $('#female').is(':checked'))) {
         $('#msg').text("Please select your gender");
         return false;
         }

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
         }*/
    });
})