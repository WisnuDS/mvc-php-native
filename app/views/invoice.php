<!DOCTYPE html>
<html lang="id">

<head>
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=BASE_URL?>css/style.css">
    <style>
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        @media print {
            body {
                padding-top: 0;
            }

            #action-area {
                display: none;
            }
        }

        @media screen and (min-width: 1025px) {
            .btn-download {
                display: none !important;
            }

            .btn-back {
                display: none !important;
            }
        }

        @media screen and (max-width: 1024px) {
            .content-area > div {
                width: auto !important;
            }

            .btn-print {
                display: none !important;
            }
        }

        @media screen and (max-width: 720px) {
            .content-area > div {
                width: auto !important;
            }
        }

        @media screen and (max-width: 420px) {
            .content-area > div {
                width: 790px !important;
            }
        }

        @media screen and (max-width: 430px) {
            .content-area {
                transform: scale(0.59) translate(-35%, -35%)
            }

            .content-area > div {
                width: 720px !important;
            }

            .btn-print {
                display: none !important;
            }
        }

        @media screen and (max-width: 380px) {
            .content-area {
                transform: scale(0.45) translate(-58%, -62%);
            }

            .content-area > div {
                width: 790px !important;
            }

            .btn-print {
                display: none !important;
            }
        }

        @media screen and (max-width: 320px) {
            .content-area > div {
                width: 700px !important;
            }
        }
    </style>
</head>

<body style="font-family: open sans, tahoma, sans-serif; margin: 0; -webkit-print-color-adjust: exact; padding-top: 60px;">
<!--<div style="background: url(img/stamp.jpg) center no-repeat; background-size: contain; margin: auto; width: 790px;">*-->
<div id="action-area">
    <div id="navbar-wrapper"
         style="padding: 12px 16px;font-size: 0;line-height: 1.4; box-shadow: 0 -1px 7px 0 rgba(0, 0, 0, 0.15); position: fixed; top: 0; left: 0; width: 100%; background-color: #FFF; z-index: 100;">
        <div style="width: 50%; display: inline-block; vertical-align: middle; font-size: 12px;">
            <div class="btn-back" onclick="window.close();">
                <img src="https://ecs7.tokopedia.net/img/back-invoice.png" width="20px" alt="Back"
                     style="display: inline-block; vertical-align: middle;"/>
                <span
                        style="display: inline-block; vertical-align: middle; margin-left: 16px; font-size: 16px; font-weight: bold; color: rgba(49, 53, 59, 0.96);">Invoice</span>
            </div>
        </div>
        <div style="width: 50%; display: inline-block; vertical-align: middle; font-size: 12px; text-align: right;">
            <a class="btn-download" href="javascript:window.print()"
               style="display: inline-block; vertical-align: middle;">
                <img src="https://ecs7.tokopedia.net/img/download-invoice.png" alt="Download" width="20px" ;/>
            </a>
            <a class="btn-print" href="javascript:window.print()"
               style="height: 100%; display: inline-block; vertical-align: middle;">
                <button id="print-button"
                        style="border: none; height: 100%; cursor: pointer;padding: 8px 40px;border-color: #03AC0E;border-radius: 8px;background-color: #03AC0E;margin-left: 16px;color: #fff;font-size: 12px;line-height: 1.333;font-weight: 700;">
                    Cetak
                </button>
            </a>
            <a class="btn-print" href="<?= BASE_URL ?>History"
               style="height: 100%; display: inline-block; vertical-align: middle;">
                <button id="print-button"
                        style="border: none; height: 100%; cursor: pointer;padding: 8px 40px;border-color: #03AC0E;border-radius: 8px;background-color: #03AC0E;margin-left: 16px;color: #fff;font-size: 12px;line-height: 1.333;font-weight: 700;">
                    History
                </button>
            </a>
        </div>
    </div>
</div>


<div class="content-area">

    <div style="margin: auto; width: 790px;">
        <table width="100%" cellspacing="0" cellpadding="0" style="width: 100%; padding: 25px 32px;">
            <tr>
                <td>
                    <!-- header -->
                    <table width="100%">
                        <tr>
                            <td style="text-align: center;">
                                <p class="navbar-brand" style="color: #03AC0E">PASAR TRADISIONAL</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- payment info -->
            <tr>
                <td>
                    <table width="100%" style="color: #343030; font-size: 12px; margin-top: 25px;">
                        <tr>
                            <td width="100" style="font-weight: bold;">Tanggal</td>
                            <td></td>
                            <td style="width: 43%; vertical-align: top; padding-left: 30px;" rowspan="5">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="font-weight: 600; font-size: 14px;padding-bottom: 8px;">Tujuan
                                            Pengiriman:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 12px; padding-bottom: 20px;">
                                            <span style="margin-bottom: 3px; font-weight: 600; display: block;"><?=$data['user']['full_name']?></span>
                                            <div>
                                                <?=$data['address']?><br>
                                                <?=$data['subdistrict_name']['name']?><br>
                                                <?=$data['telephone']?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="100" style="font-weight: bold;">Status</td>
                            <td><?=$data['status']?></td>
                        </tr>
                        <tr>
                            <td width="100" style="font-weight: bold;">Pembayaran</td>
                            <td>Cash</td>
                        </tr>
                        <tr>
                            <td width="100" style="font-weight: bold;">Driver</td>
                            <td><?=$data['transaction'][0]['name']?></td>
                        </tr>
                        <tr>
                            <td width="100" style="font-weight: bold;">ID Transaksi</td>
                            <td><?=$data['transaction'][0]['id']?></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- ringkasan belanja -->
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0"
                           style="border: thin solid #979797; border-bottom: none; border-radius: 4px; color: #343030; margin-top: 20px;">
                        <tr style="background-color: rgba(242, 242, 242, 0.74)">
                            <td style="font-weight: 600; font-size: 16px; padding: 10px;">Ringkasan Pembayaran
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <table width="100%" style="font-size: 12px; padding: 10px 10px 0;">
                                    <tr>
                                        <td style="font-weight: 600;">Total Belanja</td>
                                    </tr>
                                </table>
                                <table width="100%" style="font-size: 12px; padding: 0 10px 10px 10px;">
                                    <tr>
                                        <td style="vertical-align: top">
                                            <table width="100%" style="font-size: 12px;">
                                                <?php foreach ($data["item"] as $datum):?>
                                                <tr>
                                                    <td style="padding: 0 10px 3px 0; width: 1%; white-space: nowrap;">
                                                        - <b><?=$datum["item_name"]?></b>
                                                    </td>
                                                    <td style="text-align: right; white-space: nowrap; vertical-align: middle;">
                                                        Rp <?=$datum["quantity"]*$datum["price"]?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%"
                                       style="border: thin solid #979797; border-left: none; border-right: none; border-radius: 4px; font-size: 14px;">
                                    <tr style="font-weight: 600">
                                        <td style="padding: 10px;">
                                            Delivery Fee
                                        </td>
                                        <td style="padding: 10px; text-align: right;">
                                            Rp <?=$data["transaction"][0]["price"]?>
                                        </td>
                                    </tr>
                                    <tr style="font-weight: 600">
                                        <td style="padding: 10px;">
                                            Subtotal
                                        </td>
                                        <td style="padding: 10px; text-align: right;">
                                            Rp <?=$data["total"]?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- total pembayaran -->
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width: 50%;"></td>
                            <td style="width: 50%;">
                                <table width="100%"
                                       style="width: 430px; margin-top: 15px; padding: 15px; border-radius: 4px; background-color: rgba(242, 242, 242, 0.74); border: thin solid rgba(0, 0, 0, 0.54); font-size: 16px; font-weight: bold; color: #42b549">
                                    <tr>
                                        <td>Total</td>
                                        <td style="text-align: right;"> Rp <?=$data["transaction"][0]["price"]+$data["total"]?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- separator -->
        <div style="margin: 30px 0;">
            <div style="border-bottom: thin dashed #474747; margin-bottom: 10px;"></div>
            <div style="border-bottom: thin dashed #474747"></div>
        </div>
<!--    </div>-->
</div>

<script type="text/javascript">var _cf = _cf || [];
    _cf.push(['_setFsp', true]);
    _cf.push(['_setBm', true]);
    _cf.push(['_setAu', '/assets/482cd139158b5d209c8a1b8205d6']); </script>
<script type="text/javascript" src="/assets/482cd139158b5d209c8a1b8205d6"></script>
</body>

<script src="https://cdn.tokopedia.net/built/d1dd3126ee9ae2b8381ed123ca34b2a2.js" type="text/javascript"></script>
<script src="https://cdn.tokopedia.net/built/6b42e5043225d4bd57fb1d885f07b835.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function (event) {

        var qrcode = new QRCode("invoice_qr", {
            text: "",
            width: 200,
            height: 200,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        $('#invoice_qr').on('contextmenu', 'img', function (e) {
            return false;
        });
    });
</script>
</html>
