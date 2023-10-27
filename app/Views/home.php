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
            on <?= date('F j - Y, g:i ', strtotime($post['created_at'])) ?>
        </p>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>