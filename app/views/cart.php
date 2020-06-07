
    <div class="hero-wrap hero-bread" style="background-image: url('<?=BASE_URL?>img/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
                                <th>Note</th>
						      </tr>
						    </thead>
						    <tbody>
                                <transition-group name="slide-fade" tag="tr">
                                    <tr class="text-center" v-for="cart in carts" v-show="cart.status=='cart'">
                                        <td class="product-remove"><a @click="deleteCart(cart)"><span class="ion-ios-close"></span></a></td>

                                        <td class="image-prod"><div class="img" :style="{'background-image': 'url(<?=BASE_URL?>uploads/' + cart.image + ')'}"></div></td>

                                        <td class="product-name">
                                            <h3>{{cart.item_name}}</h3>
                                            <p>{{cart.item_description}}</p>
                                        </td>

                                        <td class="price">${{cart.price}}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input @change="updateCart(cart)" v-model="cart.quantity" type="number" name="quantity" class="quantity form-control input-number" min="1" max="100">
                                            </div>
                                        </td>

                                        <td class="total">Rp.{{cart.price*cart.quantity}}</td>
                                        <td class="total">
                                            <div class="input-group mb-3">
                                                <input @change="updateNoteCart(cart)" v-model="cart.item_note" type="text" name="quantity" class="quantity form-control input-number" min="1" max="100">
                                            </div>
                                        </td>
                                    </tr><!-- END TR-->
                                </transition-group>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rp.{{totalItem}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>Rp.0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>Rp.0</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp.{{totalItem}}</span>
    					</p>
    				</div>
    				<p><a href="<?=BASE_URL?>Checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
    </section>