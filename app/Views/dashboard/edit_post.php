<?= $this->extend('dashboard/page_layout'); ?>

<?= $this->section('content'); ?>
<div class="row-sm">

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit post</h3>
        </div>

        <form action="<?= base_url('admin/post/update/' . $post['id_post']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" id="id_post" name="id_post" value="<?= $post['id_post'] ?>">
            <input type="hidden" id="status" name="status" value="<?= $post['status'] ?>">
            <input type="hidden" id="current_image" name="current_image" value="<?= $post['image'] ?>">

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
                    <div id="toolbar-container"></div>
                    <div class="editor-container <?= validation_show_error('editor1') ? 'editor-error' : '' ?>">
                        <div class="editor" id="editor">
                            <?= old($post['body'], $post['body']) ?>
                        </div>
                    </div>
                    <input type="hidden" name="editor1" id="editor1" value="<?= set_value('editor1', $post['body']) ?>">
                    <?php if (validation_show_error('editor1')) : ?>
                        <div class="text-danger"><?= validation_show_error('editor1') ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="image">Image (Optional)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= validation_show_error('image') ? 'is-invalid' : '' ?>" id="image" name="image">
                            <label class="custom-file-label" for="image" id="image-label">Choose file (Maximum size 1 MB)</label>
                        </div>
                        <!-- <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div> -->
                    </div>
                    <?php if (validation_show_error('image')) : ?>
                        <div class="text-danger"><?= validation_show_error('image') ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }

    .editor {
        border: 5px solid #f4f4f4;
        /* height: 300px; */
        overflow-y: auto;
        padding: 5px;
        background-color: white;
        height: 50vh;
    }

    /* editor is-invalid */
    .editor-error {
        border: 1px solid #dc3545;
    }

    .editor-container {
        background-color: #f0f0f0;
        /* Grey background color */
        padding: 20px;
        /* Optional padding for spacing around the editor */
    }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/decoupled-document/ckeditor.js"></script>
<script>
    DecoupledEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);

            // Listen for CKEditor content change
            editor.model.document.on('change:data', () => {
                const html = editor.getData();
                $("#editor1").val(html);
                // console.log(html);
            });

            // Submit the form when CKEditor is initialized
            $(document).on('submit', '.submit', function(event) {
                // You can manually trigger a content change before submitting the form to ensure the latest content is captured
                editor.model.change(writer => {
                    writer.setSelection(editor.model.document.selection);
                });

                // Prevent the default form submission
                event.preventDefault();

                // Now, "editor1" should be populated with the latest CKEditor content
                console.log($("#editor1").val());

                // Submit the form programmatically
                // $(this).submit();
            });
        })
        .catch(error => {
            console.error(error);
        });

    const inputImage = document.querySelector('#image');
    const imageLabel = document.querySelector('#image-label');
    inputImage.addEventListener('change', () => {
        const fileName = inputImage.files[0].name;
        imageLabel.textContent = fileName;
    });
</script>

<?= $this->endSection(); ?>