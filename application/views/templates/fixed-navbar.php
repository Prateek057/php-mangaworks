<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 1/15/2017
 * Time: 7:04 PM
 */ ?>
<nav class="navbar navbar-toggleable-md navbar-fixed-top navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo site_url('news/'); ?>">MangaWorks</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if ($active == "news") echo "active"; ?>">
                <a class="nav-link" href="<?php echo base_url("index.php/news"); ?>" role="button">Archives</a>
            </li>
            <li class="nav-item <?php if ($active == "create") echo "active"; ?>">
                <a class="nav-link" href="<?php echo base_url("index.php/news/create"); ?>" role="button">Create</a>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <?php
                if($user_item == null){ ?>
                    <li class="nav-item <?php if ($active == "login") echo "active"; ?>">
                        <a class="nav-link" href="<?php echo base_url("index.php/users/login"); ?>" role="button">Login</a>
                    </li>
                    <li class="nav-item <?php if ($active == "register") echo "active"; ?>">
                        <a class="nav-link" href="<?php echo base_url("index.php/users/register"); ?>" role="button">Register</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url("index.php/users/edit"); ?>" role="button"><?php if($user_item != null) echo strtoupper($user_item); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("index.php/users/logout"); ?>" role="button">Logout</a>
                    </li>
                <?php }
            ?>

        </ul>
    </div>
</nav>