<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 1/15/2017
 * Time: 7:37 PM
 */
?>
<div class="container">


    <h2><?php echo $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="input" name="username"/><br/>

        <label for="password">Password</label>
        <input class="form-control" type="password" name="password"/><br/>
    </div>

    <input class="btn btn-primary" type="submit" name="submit" value="Register"/>

    </form>
</div>

