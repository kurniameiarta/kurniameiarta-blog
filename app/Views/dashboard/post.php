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
        <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $value) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $value['title'] ?></td>
                                    <td><?= $value['body'] ?></td>
                                    <td><?= $value['created_at'] ?></td>
                                    <td><?= $value['updated_at'] ?></td>
                                    <td class="btn-group text-center">
                                        <a href="<?= base_url('admin/post/edit/' . $value['slug']) ?>" class="btn btn-warning mx-2">Edit</a>
                                        <button href="#" class="btn btn-danger delete-button" data-id="<?= $value['id_post'] ?>">Delete</button>
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
            [1, 'asc']
        ]
    });

    function showDeleteConfirmation(id) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Anda yakin akan menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
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
</script>

<?= $this->endSection(); ?>