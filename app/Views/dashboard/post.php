<?= $this->extend('dashboard/page_layout'); ?>

<?= $this->section('content'); ?>

<!-- <p>tabel</p> -->
<!-- table -->
<?php if (session()->getFlashdata('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session()->getFlashdata('success') ?>',
        })
    </script>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Your posts</h3>
    </div>

    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $value) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $value['title'] ?></td>
                                    <td><?= subtitle($value['body'], 100) ?></td>
                                    <td><?= $value['created_at'] ?></td>
                                    <td><?= $value['updated_at'] ?></td>
                                    <td><small class=" badge <?= $value['status'] != 'draft' ? 'badge-success' : 'badge-secondary' ?>"><?= $value['status'] ?></td>
                                    <td>
                                        <div class="btn-group text-center">
                                            <button class="btn btn-secondary status-button mx-2" data-id="<?= $value['id_post'] ?>" data-status="<?= $value['status'] ?>">Status</button>
                                            <a href="<?= base_url('admin/post/view/' . $value['slug']) ?>" class="btn btn-info " target="_blank"><i class="fa-solid fa-eye"></i></a>
                                            <a href="<?= base_url('admin/post/edit/' . $value['slug']) ?>" class="btn btn-warning mx-2"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                            <button href="#" class="btn btn-danger delete-button" data-id="<?= $value['id_post'] ?>"><i class=" fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    new DataTable('#example', {
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        order: [
            [4, 'desc']
        ]
    });

    function showDeleteConfirmation(id) {
        Swal.fire({
            title: 'Confirm delete',
            text: 'Are you sure delete this data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger the form submission for POST request
                console.log(id);
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/post/delete/' + id;
                document.body.appendChild(form);
                form.submit();
            }
        });

    }
    document.querySelectorAll('.delete-button').forEach((button) => {
        const itemId = button.getAttribute('data-id');
        button.addEventListener('click', () => showDeleteConfirmation(itemId));
    });

    function showActionConfirmation(id, currentStatus) {
        console.log(currentStatus);
        Swal.fire({
            title: 'Keep draft or publish',
            input: 'select',
            inputOptions: {
                published: 'Publish',
                draft: 'Draft'
            },
            // inputPlaceholder: 'Select a action',
            showCancelButton: true,
            inputValue: currentStatus, // Set the current status as the default value
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(id);
                console.log(result.value);

                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/post/edit/update-status/' + id;

                const statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'status';
                statusInput.value = result.value;

                form.appendChild(statusInput);

                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    document.querySelectorAll('.status-button').forEach((button) => {
        const itemId = button.getAttribute('data-id');
        const currentStatus = button.getAttribute('data-status'); // Get the current status from a data attribute
        button.addEventListener('click', () => showActionConfirmation(itemId, currentStatus));
    });
</script>

<?= $this->endSection(); ?>