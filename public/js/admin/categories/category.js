$(function () {
    $(document).ready(function() {
        $("#crudsCategoryForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                abbreviation: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
            },
            messages: {
                name: {
                    required: "Name is required",
                    minlength: "Name cannot be less than 5 characters",
                    maxlength: "Name cannot be more than 20 characters"
                },
                abbreviation: {
                    required: "Abbreviation is required",
                    minlength: "Abbreviation cannot be less than 5 characters",
                    maxlength: "Abbreviation cannot be more than 20 characters"
                },
            }
        });
    });
});