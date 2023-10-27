<?= $this->extend('layouts/post_layout'); ?>

<?= $this->section('content'); ?>
<div class="col-md-10 col-lg-8 col-xl-7">
    <?= $post['body'] ?>
</div>

<?= $this->endSection(); ?>