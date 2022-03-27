<?php
?>
<li class="<?php echo $curr_page == "blo" ? 'active' : ''; ?>">
    <a href="blog.php?myPost">
        <span class="lnr lnr-dice"></span>My Post</a>
</li>
<li class="<?php echo $curr_page == "blog" ? 'active' : ''; ?>">
    <a href="blog.php?add_new">
        <span class="lnr lnr-dice"></span>Add New POST</a>
</li>
<li class="<?php echo $curr_page == "" ? 'active' : ''; ?>">
    <a href="blog.php?NewPost">
        <span class="lnr lnr-chart-bars"></span>New Post</a>
</li>
<li class="<?php echo $curr_page == 'dashboard-upload.php' ? 'active' : ''; ?>">
    <a href="blog.php?TopPost">
        <span class="lnr lnr-upload"></span>TOP Post</a>
</li>