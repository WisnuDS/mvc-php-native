<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<!--    <h1 class="h3 mb-2 text-gray-800">Orders</h1>-->
<!--    <p class="mb-4">Database from order table</a>.</p>-->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <div class="p-2 bd-highlight justify-content-start">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Order</h6>
                </div>
                <form class="d-flex justify-content-center" action="<?=BASE_URL."__Admin/updateDriver/".$data['id']?>" method="post">
                    <div class="form-group mr-2 mt-2">
                        <label for="driver">Driver</label>
                    </div>
                    <div class="form-group mr-2">
                        <select class="form-control" name="driver" id="driver">
                            <?php foreach ($data['driver'] as $datum):?>
                                <option value="<?=$datum['id']?>"><?=$datum['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <?php foreach ($data['item'] as $datum):?>
            <div class="card mb-4 py-3 border-bottom-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$datum['item_name']?></div>
                            <div class="text-xs font-weight-bold text-primary mb-1"><?="Rp. ".$datum['quantity']." x ".$datum['price']?></div>
                        </div>
                        <div class="col-auto">
                            <div class="h5 mb-0 font-weight-bold text-gray-600">Rp. <?=$datum['quantity']*$datum['price']?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



