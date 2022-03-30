$(function () {
    
    // summernote
    $('.summernote').summernote({
        tabSize: 2,
        height: 100,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
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
                    required: "Category is required",
                },
                publisher_id: {
                    required: "Publisher is required",
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
    $(document).ready(function() {
        $("#crudsPublisherForm").validate({
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
                    number: "Quantity include number only"
                },
                title: {
                    required: "Title is required",
                    number: "Title cannot be more than 20 characters"
                },
                quantity: {
                    required: "Quantity is required",
                    number: "Quantity include number only"
                },
                price: {
                    required: "Price is required",
                    number: "Price include number only"
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
    $(document).ready(function() {
        $("#crudsCategoryForm").validate({
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
                    number: "Quantity include number only"
                },
                title: {
                    required: "Title is required",
                    number: "Title cannot be more than 20 characters"
                },
                quantity: {
                    required: "Quantity is required",
                    number: "Quantity include number only"
                },
                price: {
                    required: "Price is required",
                    number: "Price include number only"
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