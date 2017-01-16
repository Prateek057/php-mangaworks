<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 1/15/2017
 * Time: 7:26 PM
 */
?>
<div class="container-fluid">
    <br/>
    <div class="row">
        <?php foreach ($news as $news_item): ?>
            <div class="col-md-2" style="padding-top: 10px;">
                <div class="card">
                    <img class="card-img-top" style="height: 180px;width: auto"
                         src="<?php echo base_url('assets/images/manga-words.jpg'); ?>" alt="Card image cap">
                    <div class="card-block">
                        <h3><?php echo $news_item['title']; ?></h3>

                        <?php echo $news_item['text']; ?>
                        <p><a href="<?php echo site_url('news/' . $news_item['slug']); ?>">View article</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

