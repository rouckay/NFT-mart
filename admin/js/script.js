$(document).ready(function() {
    $('#sample_form').on('submit', function(event) {
        event.preventDefault();
        var count_error = 0;
        $.ajax({
            url: "process.php",
            method: "POST",
            date: $(this).serialize(),
            beforeSend: function() {
                $('#save').attr('disabled', 'disabled');
                $('#process').css('display', 'block');
            },
            success: function(data) {
                var percentage = 0;

                var timer = setInterval(function() {
                    percentage = percentage + 30;
                    progress_bar_process(percentage, timer);
                }, 1000);
            }
        })
    });

    function progress_bar_process(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#sample_form')[0].reset();
            $('#process').css('display', 'none');
            $('.progress-bar').css('width', '0%');
            $('#save').attr('disabled', false);
            $('#success_message').html("<div class='alert alert-success'>data Saved</div>");
            setTimeout(function() {
                $('#success_message').html('');
            }, 5000);
        }
    }
});