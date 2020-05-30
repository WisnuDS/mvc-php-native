<!DOCTYPE html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <title>Register Pasar Tradisional</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?=BASE_URL?>img/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(<?=BASE_URL?>img/bg_2.jpg);">
					<span class="login100-form-title-1">
						Pasar Tradisional Register
					</span>
            </div>
            <?php FlashMessage::showFlasher(); ?>

            <form id="register" class="login100-form validate-form" action="<?=BASE_URL?>authentication/registrationAccount" method="post" enctype="multipart/form-data">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Full Name is required">
                    <span class="label-input100">Full Name</span>
                    <input class="input100" type="text" name="name" placeholder="Enter full name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <p v-if="!isAvailable" class="text-danger">this username is used by another user</p>
                    <input v-model="username" v-on:change="checkUsername" class="input100" type="text" name="username" placeholder="Enter username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="pass" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Enter email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
                    <span class="label-input100">Address</span>
                    <label>
                        <textarea class="input100" type="text" name="address" placeholder="Enter address"></textarea>
                    </label>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Kecamatan is required">
                    <span class="label-input100">Kecamatan</span>
                    <input class="input100" type="text" name="subdistrict" placeholder="Enter sub-district">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Postal code is required">
                    <span class="label-input100">Postal Code</span>
                    <input class="input100" type="text" name="zip" placeholder="Enter postal code">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Telephone is required">
                    <span class="label-input100">Telephone</span>
                    <input class="input100" type="text" name="telephone" placeholder="Enter telephone">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26">
                    <span class="label-input100">Photo Avatar</span>
                    <input class="input100" type="file" name="avatar" accept="image/*">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div>
                        <a href="<?=BASE_URL?>authentication" class="txt1">
                            Have account?
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" :disabled="!isAvailable">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="<?=BASE_URL?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?=BASE_URL?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?=BASE_URL?>vendor/bootstrap/js/popper.js"></script>
<script src="<?=BASE_URL?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?=BASE_URL?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?=BASE_URL?>vendor/daterangepicker/moment.min.js"></script>
<script src="<?=BASE_URL?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?=BASE_URL?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?=BASE_URL?>js/mainlogin.js"></script>
<!--===============================================================================================-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="<?=BASE_URL?>js/vuefile.js"></script>

</body>
</html>