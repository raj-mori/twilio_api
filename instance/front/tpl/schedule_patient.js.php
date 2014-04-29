
<script type="text/javascript">

    var delUrl = '';
    var searchParams = {};
    function DeleteCost(url) {
        delUrl = url;
        $("#myModal").modal("show");
    }
    function DeleteLog(url) {
        delUrl = url;
        $("#myModal").modal("show");
    }
    $(document).ready(function() {

        
        searchParams = {
            filter: '<?php print $urlArgs[1] ?>',
            state: '<?php print $urlArgs[0] ?>',
            date: ''
        };

        $('#prebtn').attr("disabled", true);
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            onSelect: function(e) {
                searchParams.date = e;

            }
        });
    });
    function getNextrecord() {
        $("#prebtn").attr('disabled', false);
        var page_no = $("#next_page_no").html();
        $("#next_page_no").html(parseInt(page_no) + parseInt(10));
        page_no = $("#next_page_no").html();
        var count_data = $("#countdata").html();

        if (parseInt(page_no) > parseInt(count_data))
        {
            $("#nextbtn").attr('disabled', true);
        }
        showWait();
        $.ajax({
            url: _U + 'schedule_patient',
            data: {Nextrecord: 1, Limit: page_no},
            success: function(r) {
                hideWait();
                $("#costList").html(r);
                //$("#next_page_no").html(parseInt(page_no) + parseInt(10));
            }
        });
    }
    function getPrerecord() {
        $("#nextbtn").attr('disabled', false);
        var page_no = $("#next_page_no").html();
        $("#next_page_no").html(parseInt(page_no) - parseInt(10));
        page_no = $("#next_page_no").html();
        if (page_no == 0) {
            $("#prebtn").attr('disabled', true);
        }
        showWait();
        $.ajax({
            url: _U + 'schedule_patient',
            data: {Nextrecord: 1, Limit: page_no},
            success: function(r) {
                hideWait();
                $("#costList").html(r);
                //$("#next_page_no").html(parseInt(page_no) - parseInt(10));
            }
        });
    }

    function showRes(dir) {
        var current_date = new Date($("#datepicker").val() || formatDate(new Date()));
        current_date.setDate(dir == "up" ? current_date.getDate() + 1 : current_date.getDate() - 1);

        $("#datepicker").val(formatDate(current_date));
        searchParams.date = formatDate(current_date);

    }
    function formatDate(dt) {
        return dt.getMonth() + 1 + "/" + dt.getDate() + "/" + dt.getFullYear();
    }
    function makeCall(id)
    {
        $("#callModal").modal("show");
        $("#div2").hide();
        $('#div1').show();
        $("#success").html('<img src="<?php print _MEDIA_URL ?>img/ajax-loader.gif" />  Connecting!.....');
        $.ajax(
                {
                    url: 'schedule_patient',
                    dataType: 'json',
                    data: {statusCall: 1, id: id},
                    success: function(r) {

                        if (r.msg == 1) {

                            $("#success").html('Call Executed Successfully!');
                        }
                        if (r.msg == 2)
                        {
                            $("#div1").hide();
                            $("#div2").show();
                            $("#error").html('Sorry!.. Your Call Failed PlZ Check');
                        }
                    }

                });
    }
    function sendMessage(id)
    {


        $("#callModal").modal("show");
        $("#div2").hide();
        $('#div1').show();
        $("#success").html('<img src="<?php print _MEDIA_URL ?>img/ajax-loader.gif" />  Sending!.....');
        $.ajax(
                {
                    url: 'schedule_patient',
                    dataType: 'json',
                    data: {status: 1, id: id},
                    success: function(r) {

                        if (r.msg == 1) {

                            $("#success").html('Message Sent Successfully');
                        }
                        if (r.msg == 2)
                        {
                            $("#div1").hide();
                            $("#div2").show();
                            $("#error").html('Sorry!.. Your Message Failed PlZ Check');
                        }
                    }


                });
    }

    function conversion_history(id)
    {

        location.href = '<?php print _U ?>conversion/' + id ;

    }
    function edit_message(id)
    {
        $("#1_"+id).hide();
        $("#2_"+id).show();
        $('#edit_focus_message_'+id).focus();
       
    }
    function edit_focus_message(id)
    {
        $.ajax(
                {
                    url: _U+'schedule_patient',
                    dataType: 'json',
                    data: {message_status: 1, id: id, message: $("#edit_focus_message_"+id).val()},
                    success: function(r) {
                        if (r.msg == 1) {
                            location.href= "schedule_patient";
                        }


                    }
                });


    }
    function previewModalContent(id) {

        $.ajax({
            url: _U + 'schedule_patient/',
            data: {status_edit: 1, id: id},
            success: function(r) {

                var a = r.split("^");

                $("#name_edit").val(a[0]);
                $("#age_edit").val(a[1]);
                $("#gender_edit").val(a[2]);
                $("#address_edit").val(a[3]);
                $("#phno_edit").val(a[4]);
                $("#email_edit").val(a[5]);
                $("#message_edit").val(a[6]);
                $("#patient_id").val(a[7]);

                $("#preview").modal('show');
            }
        });

    }




</script>

<?php include "jquery_ui.php"; ?>
