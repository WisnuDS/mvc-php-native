<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
    <p class="mb-4">Database from order table</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if ($data['id']==='3'): ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Join at</th>
                            <th>Phone Number</th>
                            <th>Telegram Id</th>
                            <th>Edit</th>
                            <th>Setoran</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Join at</th>
                            <th>Phone Number</th>
                            <th>Telegram Id</th>
                            <th>Edit</th>
                            <th>Setoran</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($data['user'] as $datum): ?>
                            <tr>
                                <td><?= $datum['id'] ?></td>
                                <td><?= $datum['name'] ?></td>
                                <td><?= $datum['status'] ?></td>
                                <td><?= $datum['join_at'] ?></td>
                                <td><?= $datum['whatsapp_number'] ?></td>
                                <td><?= $datum['telegram_id'] ?></td>
                                <td><a href="<?=BASE_URL?>" class="btn-sm btn-primary">Edit</a></td>
                                <td><a href="<?=BASE_URL?>" class="btn-sm btn-warning">Setoran</a></td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                <?php else: ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Sub District</th>
                            <th>Postal Code</th>
                            <th>Telephone</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Sub District</th>
                            <th>Postal Code</th>
                            <th>Telephone</th>
                            <th>Edit</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($data['user'] as $datum): ?>
                            <tr>
                                <td><?= $datum['id'] ?></td>
                                <td><?= $datum['username'] ?></td>
                                <td><?= $datum['full_name'] ?></td>
                                <td><?= $datum['email'] ?></td>
                                <td><?= $datum['address'] ?></td>
                                <td><?= $datum['name'] ?></td>
                                <td><?= $datum['zip'] ?></td>
                                <td><?= $datum['telephone'] ?></td>
                                <td><a href="<?=BASE_URL?>" class="btn-sm btn-primary">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



