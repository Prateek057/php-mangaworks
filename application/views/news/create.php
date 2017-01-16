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

        <?php echo form_open('news/create'); ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="input" name="title"/><br/>

            <label for="text">Text</label>
            <textarea class="form-control" name="text"></textarea><br/>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Create news item"/>

    </form>
</div>
