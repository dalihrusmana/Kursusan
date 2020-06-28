<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="input-group col-lg-6 mb-3">
                            <input type="text" class="form-control" placeholder="Cari data user..." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Institusi</th>
                        <th scope="col">Keahlian</th>
                        <th scope="col">Portfolio</th>
                        <th scope="col">Tanggal Buat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user_data as $ur) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $ur['nama_user']; ?></td>
                            <td><?= $ur['email_user']; ?></td>
                            <td><img src="<?= base_url('assets/img/profile/') . $ur['image_user']; ?>" class="card-img" style="max-width: 100px;"></td>
                            <td><?= $ur['is_active']; ?></td>
                            <td><?= $ur['jenis_kelamin']; ?></td>
                            <td><?= $ur['occupation']; ?></td>
                            <td><?= $ur['nama_institusi']; ?></td>
                            <td><?= $ur['keahlian']; ?></td>
                            <td><a href="<?= $ur['link_portfolio']; ?>" target="blank">Portfolio</a></td>
                            <td><?= date('d F Y', $user['date_created']); ?></td>
                            <td>
                                <a href="#" class="badge badge-success">Edit</a>
                                <a href="#" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (empty($user_data)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data user tidak ditemukan.
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Submenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukan title submenu">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Masukan url submenu">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukan icon submenu">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked></input>
                            <label for="is_active" class="form-check-label">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>