<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image_user']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama_user']; ?></h5>
                    <p class="card-text"><?= $user['email_user']; ?></p>
                    <p class="card-text"><?= $user['jenis_kelamin']; ?></p>
                    <p class="card-text"><?= $user['occupation']; ?></p>
                    <p class="card-text"><?= $user['nama_institusi']; ?></p>
                    <p class="card-text"><?= $user['keahlian']; ?></p>
                    <p class="card-text"><a href="<?= $user['link_portfolio']; ?>" target="blank"><?= $user['link_portfolio']; ?></a></p>
                    <p class="card-text"><small class="text-muted">Member sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->