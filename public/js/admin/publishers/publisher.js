$(function () {
    $(document).ready(function() {
        $("#crudsPublisherForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 50,
                },
                address:{
                    required: true,
                    minlength: 5,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
            },
            messages: {
                name: {
                    required: "Name is required",
                    minlength: "Name cannot be less than 5 characters",
                    maxlength: "Name cannot be more than 50 characters"
                },
                address: {
                    required: "Address is required",
                    minlength: "Address cannot be less than 5 characters",
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
            }
        });
    });
});