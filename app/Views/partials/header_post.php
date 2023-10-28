<!-- Page Header-->
<header class="masthead" style="background-image: url(<?= base_url('/img/post/' . $post['image']) ?>)">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= $post['title'] ?></h1>
                    <!-- <h2 class="subheading"><?= subtitle($post['body']) ?></h2> -->
                    <span class="meta">
                        Posted by
                        <a href="#">wahyusinggihw</a>
                        on <?= date('F j - Y, H:i ', strtotime($post['created_at'])) ?>
                    </span>
                    <?php if ($post['image'] == 'default.jpg') : ?>
                        <small>Photo by <a style="color: grey;" target="_blank" href="https://unsplash.com/@heytowner?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">JOHN TOWNER</a> on <a style="color: grey;" target="_blank" href="https://unsplash.com/photos/aerial-photo-of-brown-moutains-JgOeRuGD_Y4?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>