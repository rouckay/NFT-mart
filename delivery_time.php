<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo $curr_page; ?>">Delivery Time</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">You Will Recieve Your Product Very Soon</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="shortcode_modules">
                <div class="modules__title">
                    <h3>Delivery Time</h3>
                </div>
                <div class="modules__content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="progress_wrapper">
                                <div class="with_close">
                                    <div class="labels clearfix">
                                        <p>Your Medicine Is On The Way</p>
                                        <span data-width="100" id="percent"></span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                            <span class="sr-only"> </span>
                                        </div>
                                        <img src="img/heartBeat.gif" alt="">
                                    </div>
                                </div>
                                <span class="p_cross lnr lnr-cross"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end .col-md-6 -->
    </div>
    <!-- end .row -->
</div>
<script>
    progress = document.querySelector('.progress-bar');
    var percent = document.querySelector('#percent');
    var d = new Date();
    var hours = d.setMilliseconds(1)
    console.log(hours)
    var num = 1;

    function pro() {
        num++;
        var adder = progress.setAttribute('style', `width:${num}%`);
        percent.innerHTML = num + '%';
        if (num == 100) {
            clearInterval(interval);
            location.href = 'dashboard-statement.php';
        }
    }
    var interval = setInterval(pro, 100)
</script>
<?php require_once "footer.php"; ?>