$(function () {
    
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
        })
    });
    $(document).ready(function() {
        $("#crudsForm").validate({
            rules: {
                title: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                isbn: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                biography:{
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
            },
            messages: {
                isbn: {
                    required: "isbn is required",
                    maxlength: "isbn cannot be more than 20 characters"
                },
                title: {
                    required: "title is required",
                    maxlength: "title cannot be more than 20 characters"
                },
                name: {
                    required: "name is required",
                    maxlength: "name cannot be more than 20 characters"
                },
                biography: {
                    required: "biography is required",
                    maxlength: "biography cannot be more than 2000 characters"
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
            }
        });
    });
</script>