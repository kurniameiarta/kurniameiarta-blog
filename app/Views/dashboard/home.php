<?= $this->extend('dashboard/page_layout'); ?>

<?= $this->section('content'); ?>

<h5 class="my-4">Welcome, <?= session()->get('user')['name'] ?></h5>

<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa-solid fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Posts</span>
                <span class="info-box-number"><?= $totalPosts ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-secondary"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Drafted Post's</span>
                <span class="info-box-number"><?= $draftPosts ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Published Post's</span>
                <span class="info-box-number"><?= $publishedPosts ?></span>
            </div>

        </div>
    </div>


</div>

<?= $this->endSection(); ?>