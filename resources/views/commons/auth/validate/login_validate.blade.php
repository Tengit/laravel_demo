<script>
    $(document).ready(function() {
        $("#checkLogin").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                fullname:{
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                name: {
                    required: "Username is required",
                    maxlength: "Username cannot be more than 20 characters"
                },
                fullname: {
                    required: "Fullname is required",
                    maxlength: "Fullname cannot be more than 20 characters"
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 5 characters"
                },
            }
        });
    });
</script>
