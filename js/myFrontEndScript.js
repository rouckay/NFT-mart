$(document).ready(function () {
    $('#btn_add_comment').click(function (e) {
        e.preventDefault();
        var mem_id = $('#mem_id').val();
        var author = $('#author').val();
        var comment = $('#comment').val();
        var pro_id = $('#pro_id').val();
        $.post('phpscripts/add_comment.php', {
            mem_id: mem_id,
            pro_id: pro_id,
            author: author,
            comment: comment
        }, function (data) {
            $('#resp').text(data)
        });
        $('#comment')[0].reset();
    })
});

