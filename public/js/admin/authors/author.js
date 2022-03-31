$(function () {
    $(document).ready(function() {
        $("#crudsAuthorForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 100,
                },
                biography:{
                    required: true,
                    minlength: 5,
                },
                email: {
                    required: true,
                    email: true,
                    minlength: 5,
                    maxlength: 50
                },
                birthday: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Name is required",
                    minlength: "Name cannot be less than 5 characters",
                    maxlength: "Name cannot be more than 20 characters"
                },
                biography: {
                    required: "Biography is required",
                    minlength: "Biography cannot be less than 5 characters",
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                birthday: {
                    required: "Birthdate published is required",
                },
            }
        });
    });
});