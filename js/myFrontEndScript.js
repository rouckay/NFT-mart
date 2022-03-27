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
            $('#resp').html(data)
            $('#product-comment').load(location.href + " #product-comment");
        });
        $('#comment')[0].reset();
    })
    // --------------------button Add To Favourite -----------------
    $('#btn_add_fav').click((e) => {
        e.preventDefault();
        console.log(e.target.parentElement)
    })
    // --------------------END button Add To Favourite -----------------
});
