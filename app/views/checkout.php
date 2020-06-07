<div class="hero-wrap hero-bread" style="background-image: url('<?= BASE_URL ?>img/bg_1.jpg');"
     xmlns:v-model="http://www.w3.org/1999/xhtml" xmlns:v-model="http://www.w3.org/1999/xhtml"
     xmlns:v-model="http://www.w3.org/1999/xhtml">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <form action="<?=BASE_URL?>Checkout/invoice" class="billing-form" method="post">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" v-model="userData.full_name" class="form-control" placeholder=""
                                       name="name" readonly>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Sub-district/Kecamatan</label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select v-model="select" name="subDistrict" id="subDistrict" class="form-control"
                                            :readonly="radioAddress==='true'" required>
                                        <option value="0" disabled>Choose Sub-District/Kecamatan</option>
                                        <option v-for="subDistrict in subDistricts" :key="subDistrict.id"
                                                :value="subDistrict.id" :disabled="radioAddress==='true'">{{subDistrict.name}}
                                        </option>
                                    </select>
                                    <input type="hidden" name="selectHidden" v-model="select">
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input v-model="modelAddress" type="text" name="address" class="form-control"
                                       :readonly="radioAddress==='true'" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Postcode / ZIP *</label>
                                <input v-model="modelZip" type="text" name="zip" class="form-control" placeholder=""
                                       :readonly="radioAddress==='true'" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Email Address</label>
                                <input v-model="userData.email" type="text" name="email" class="form-control" placeholder=""
                                       readonly>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input v-model="userData.telephone" type="text" name="phone" class="form-control" placeholder=""
                                       readonly>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <label class="mr-3"><input checked @click="select=userData.subdistrict_id"
                                                               v-model="radioAddress" type="radio" value="true"
                                                               name="radio"> Ship to your address </label>
                                    <label><input v-model="radioAddress" type="radio" value="false" name="radio">
                                        Ship to different address</label>
                                </div>
                            </div>
                        </div>
                    </div><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>Rp. {{totalItem}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span>Rp. {{fee}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount</span>
                                    <span>Rp.0</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>Rp. {{parseInt(fee)+parseInt(totalItem)}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Agreement</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="agreeRadio" class="mr-2" checked>All
                                                transactions
                                                that have been made cannot be canceled</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <!-- <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <!-- <label><input type="radio" name="optradio" class="mr-2"> Paypal</label> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" v-model="agreement" name="agreeCheck" class="mr-2"> I have read
                                                and accept
                                                the
                                                terms and conditions</label>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <button type="submit" class="btn btn-primary py-3 px-4" :disabled="!agreement">Place
                                        an order
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
        </form>
    </div>
</section>