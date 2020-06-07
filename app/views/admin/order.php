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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Postal Code</th>
                        <th>Telephone</th>
                        <th>Driver</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Postal Code</th>
                        <th>Telephone</th>
                        <th>Driver</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($data['transactions'] as $datum): ?>
                        <tr>
                            <td><?= $datum['id'] ?></td>
                            <td><?= $datum['transaction_date'] ?></td>
                            <td><?= $datum['detail_user']['full_name'] ?></td>
                            <td><?= $datum['address'] ?></td>
                            <td><?= $datum['detail_subdistrict']['name'] ?></td>
                            <td><?= $datum['zip'] ?></td>
                            <td><?= $datum['telephone'] ?></td>
                            <td><?= $datum['detail_driver']['name'] ?></td>
                            <td class="text-<?=$datum['color']?>"><?= $datum['status'] ?></td>
                            <td><a href="<?=BASE_URL."__Admin/detailOrder/".$datum['id']?>" class="btn-sm btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


