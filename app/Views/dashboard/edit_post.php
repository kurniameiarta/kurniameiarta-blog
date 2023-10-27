<?= $this->extend('dashboard/page_layout'); ?>

<?= $this->section('content'); ?>
<div class="row-sm">

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit your post.</h3>
        </div>

        <form action="<?= base_url('admin/post/update/' . $post['id_post']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" id="id_post" name="id_post" value="<?= $post['id_post'] ?>">
            <input type="hidden" id="status" name="status" value="<?= $post['status'] ?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="text">Title</label>
                    <input type="text" class="form-control <?= validation_show_error('title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= old('tite', $post['title']) ?>" placeholder="Enter a title">
                    <div class="invalid-feedback">
                        <?= validation_show_error('title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea class="form-control <?= validation_show_error('body') ? 'is-invalid' : '' ?>" rows="3" id="body" name="body" placeholder="Enter ..."><?= old('tite', $post['body']) ?></textarea>
                    <div class="invalid-feedback">
                        <?= validation_show_error('body') ?>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('ckeditor5-build-classic/ckeditor.js') ?>" type="text/javascript"></script>
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<?= $this->endSection(); ?>