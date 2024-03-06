// scripts.js
$(document).ready(function() {
    $('.project_list').change(function() {
        var selectedOption = $(this).children("option:selected").val();

    $.ajax({
        url: '/get/phase',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            selectedOption: selectedOption
        },
        success: function(response) {
           
                alert('Phase: ' + response);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(error);
        }
    });


    });

    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true
    });
});
