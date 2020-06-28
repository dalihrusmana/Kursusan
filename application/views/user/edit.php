<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-4">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email_user']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['nama_user']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <?php foreach ($jenis_kelamin as $jk) : ?>
                            <?php if ($jk == $user['jenis_kelamin']) : ?>
                                <option value="<?= $jk; ?>" selected><?= $jk; ?></option>
                            <?php else : ?>
                                <option value="<?= $jk; ?>"><?= $jk; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Pekerjaan</label>
                <div class="col-sm-10">
                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                        <?php foreach ($pekerjaan as $pkrj) : ?>
                            <?php if ($pkrj == $user['occupation']) : ?>
                                <option value="<?= $pkrj; ?>" selected><?= $pkrj; ?></option>
                            <?php else : ?>
                                <option value="<?= $pkrj; ?>"><?= $pkrj; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nama Institusi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" value="<?= $user['nama_institusi']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Keahlian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="keahlian" name="keahlian" value="<?= $user['keahlian']; ?>">
                    <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Link Portfolio</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="portfolio" name="portfolio" value="<?= $user['link_portfolio']; ?>">
                    <?= form_error('portfolio', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image_user']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Simpan Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->