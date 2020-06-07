<div class="hero-wrap hero-bread" style="background-image: url('<?= BASE_URL ?>img/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
                <h1 class="mb-0 bread">Products</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="#" class="active">All</a></li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp animated" v-for="item in items">
                <div class="product">
                    <a href="#" class="img-prod"><img class="img-fluid" :src="src+item['image']"
                                                      alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">{{item['item_name']}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="price-sale">Rp.{{item['price']}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#"
                                   class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" onclick="return false" @click="insertCart(item['id'],<?=$data["user"]["id"]?>)" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                </div>
            </div>
        </div>
    </div>
</section>