<?= $this->extend('layouts/page_layout'); ?>

<?= $this->section('content'); ?>

<?php foreach ($posts as $post) : ?>
    <div class="post-preview">
        <a href="<?= base_url('post/' . $post['slug']) ?>">
            <h2 class="post-title"><?= $post['title'] ?></h2>
            <?php helper('my_helper'); ?>
            <h3 class="post-subtitle"><?= subtitle($post['body']) ?></h3>
        </a>
        <p class="post-meta">
            Posted by
            <a href="#">wahyusinggihw</a>
            on <?= date('F j - Y, H:i ', strtotime($post['updated_at'])) ?>
        </p>
    </div>
    <!-- Divider-->
    <hr class="my-4" />
<?php endforeach; ?>

<!-- Pager-->
<div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>

<?= $this->endSection(); ?>