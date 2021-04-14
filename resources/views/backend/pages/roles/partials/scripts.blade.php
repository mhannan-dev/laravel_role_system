<script type="text/javascript">
    $("#checkPermissionAll").click(function() {
        if ($(this).is(':checked')) {
            //Check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        } else {
            //Un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

    function checkPermissionByGroup(className, checkThis) {
        const groupIdName = $("#" + checkThis.id);
        const classCheckBox = $('.' + className + ' input');
        console.log(classCheckBox);
        if (groupIdName.is(':checked')) {
            classCheckBox.prop('checked', true);
        } else {
            classCheckBox.prop('checked', false);
        }
    }

</script>