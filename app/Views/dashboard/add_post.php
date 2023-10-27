<?= $this->extend('dashboard/page_layout'); ?>

<?= $this->section('content'); ?>
<div class="row-sm">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Make a Post.</h3>
        </div>

        <form action="<?= base_url('admin/post/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="text">Title</label>
                    <input type="text" class="form-control <?= validation_show_error('title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= old('title') ?>" placeholder="Enter a title">
                    <div class="invalid-feedback">
                        <?= validation_show_error('title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea class="form-control <?= validation_show_error('body') ? 'is-invalid' : '' ?>" rows="3" id="body" name="body" placeholder="Enter ..."><?= old('body') ?></textarea>
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
                <button type="submit" class="btn btn-secondary" value="publish">Save as draft</button>
                <button type="submit" class="btn btn-primary" value="draft">Submit</button>
            </div>
        </form>
    </div>
</div>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
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