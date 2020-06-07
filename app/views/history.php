<div class="hero-wrap hero-bread" style="background-image: url('<?=BASE_URL?>img/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Transaction</span>
                </p>
                <h1 class="mb-0 bread">My History Transaction</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <?php foreach ($data['transactions'] as $transaction): ?>
        <div class="row">
            <div class="col-md-9 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>&nbsp;</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($transaction['detail_items'] as $detail_item):?>
                        <tr class="text-center">
                            <td class="image-prod">
                                <div class="img" style="background-image:url(<?=BASE_URL."uploads/".$detail_item['image']?>);"></div>
                            </td>

                            <td class="product-name">
                                <h3><?=$detail_item['item_name']?></h3>
                                <p><?=$detail_item['item_description']?></p>
                            </td>

                            <td class="price">Rp. <?=$detail_item['price']?></td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number"
                                           value="<?=$detail_item['quantity']?>" min="1" max="100" disabled>
                                </div>
                            </td>

                            <td class="total">Rp. <?=$detail_item['quantity']*$detail_item['price']?></td>
                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="note" class="quantity form-control input-number"
                                           value="<?=$detail_item['item_note']?>" min="1" max="100" disabled>
                                </div>
                            </td>
                        </tr><!-- END TR-->
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h7><?=$transaction['id']?> -</h7>
                    <h7><?=$transaction['transaction_date']?></h7>
                    <hr>
                    <h3>Cart Totals <a href="<?=BASE_URL."Checkout/invoiceHistory/".$transaction['id']?>" class="btn-sm btn-success">invoice</a></h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>Rp. <?=$transaction['subtotal']?></span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>Rp. <?= $transaction['detail_subdistrict']['price'] ?></span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>0</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>Rp. <?=$transaction['subtotal']+$transaction['detail_subdistrict']['price']?></span>
                    </p>
                    <p class="d-flex">
                        <span>Driver</span>
                        <span><a href="" onclick="return false" class="btn-sm btn-primary buttonModal" data-toggle="modal" data-target="#myModal" data-id="<?=$transaction["detail_driver"]["id"]?>">detail</a></span>
                    </p>
                    <p class="d-flex">
                        <span>Status</span>
                        <span style="color: <?=$transaction['color']?>;"><?=$transaction['status']?></span>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <?php endforeach; ?>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Driver</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="detail">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="" onclick="return false" type="button" class="btn-sm btn-danger" data-dismiss="modal">Close</a>
                </div>

            </div>
        </div>
    </div>
</section>