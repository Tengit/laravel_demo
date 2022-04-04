$(function () {
    $(document).ready(function() {
        $("#crudsBookForm").validate({
            rules: {
                title: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                },
                isbn: {
                    required: true,
                    number: true
                },
                quantity: {
                    required: true,
                    number: true
                },
                num_pages: {
                    required: true,
                    number: true
                },
                price: {
                    required: true,
                    number: true
                },
                content: {
                    required: true,
                    minlength: 5,
                },
                edition: {
                    required: true,
                    number: true
                },
                date_published: {
                    required: true
                },
                category_id: {
                    required: true
                },
                'authorlist[]': {
                    required: true,
                    minlength: 1
                },
                publisher_id: {
                    required: true
                },
                condition: {
                    required: true
                },
            },
            messages: {
                isbn: {
                    required: "isbn is required",
                    number: "isbn include number only"
                },
                title: {
                    required: "Title is required",
                    number: "Title cannot be more than 20 characters"
                },
                quantity: {
                    required: "Quantity is required",
                    number: "Quantity include number only"
                },
                num_pages: {
                    required: "Page number is required",
                    number: "Page number include number only"
                },
                price: {
                    required: "Price is required",
                    number: "Price include number only"
                },
                content: {
                    required: "Content is required",
                },
                condition: {
                    required: "Condition is required",
                },
                category_id: {
                    required: "Please select Category",
                },
                'authorlist[]': {
                    required: "Please select Author",
                },
                publisher_id: {
                    required: "Please select Publisher",
                },
                edition: {
                    required: "Edition is required",
                    number: "Edition include number only"
                },
                date_published: {
                    required: "Date published is required",
                },
            }
        });
    });

    // upload images
    $("#product-images").fileinput({
        theme: "fas",
        maxFileCount: 5,
        allowedFileTypes: ['image'],
        showCancel: true,
        showRemove: false,
        showUpload: false,
        overwriteInitial: false
    });
});