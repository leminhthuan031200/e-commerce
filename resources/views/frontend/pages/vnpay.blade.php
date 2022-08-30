
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Chọn Phương thức thanh to&#225;n">
    <meta name="keywords" content="Chọn Phương thức thanh to&#225;n">
    <meta name="author" content="Chọn Phương thức thanh to&#225;n">
    <title>Chọn Phương thức thanh to&#225;n</title>
    <link href="{{asset('css/Styles.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<body onunload="" class="background-grey">

<div class="payement-method">
    <div class="payment-method__body">
        

    <div class="section-body-middle-introduce text-center padding-sx-big">
        Chọn Phương thức thanh to&#225;n
    </div>
<form action="{{route('vnpay-index')}}" method="get">        
    <div class="section-body-middle-form-p1 nopadding no-border">
        <input type="text" hidden value="{{$code_order}}"name="code_order">
        <input type="text"  hidden value="{{$total_amount}}"name="total_amount">
                <!--Check QR Support-->
                    <div class="wrap">
                        <button type="submit" value="VNPAYQR" id="VNPAYQR" name="paymethod" class="btn-list-option collapsed paytype-qr">
                            Thanh toán quét mã <span class="vnpay--red">VN</span><span class="vnpay--blue">PAY</span><sup class="vnpay--red">QR</sup>
                        </button>
                    </div>
                <!--Check local bank support-->
                    <div class="wrap">
                        <button type="button" class="btn-list-option collapsed paytype-localbank" data-toggle="collapse" data-target="#tab1" aria-expanded="false">
                            Thẻ ATM v&#224; t&#224;i khoản ng&#226;n h&#224;ng
                            <div class="triangle-border"></div>
                            <span class="arrow">
                                <img src="{{asset('vnpay/ic-arrow.svg')}}">
                            </span>
                        </button>
                       
                        <div id="tab1" class="list-option-collapse collapse" aria-expanded="false" style="height: 1px;">
                            <div class="collapse-wrap">
                                <ul class="list_cart-2 clearfix">
                                        <li>
                                           
                                            <label for="VIETCOMBANK">
                                                <input name="vnpay" type="submit" value="VIETCOMBANK" id="VIETCOMBANK" name="paymethod"><img src="{{asset('vnpay/vietcombank_logo.png')}}" width="200" height="40" alt="VIETCOMBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VIETINBANK">
                                                <input name="vnpay" type="submit" value="VIETINBANK" id="VIETINBANK" name="paymethod"><img src="{{asset('vnpay/vietinbank_logo.png')}}" width="200" height="40" alt="VIETINBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="BIDV">
                                                <input name="vnpay" type="submit" value="BIDV" id="BIDV" name="paymethod"><img src="{{asset('vnpay/bidv_logo.png')}}" width="200" height="40" alt="BIDV"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="AGRIBANKHP">
                                                <input name="vnpay" type="submit" value="AGRIBANKHP" id="AGRIBANKHP" name="paymethod"><img src="{{asset('vnpay/bank/agribank_logo.png')}}" width="200" height="40" alt="AGRIBANKHP"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="AGRIBANK">
                                                <input name="vnpay" type="submit" value="AGRIBANK" id="AGRIBANK" name="paymethod"><img src="{{asset('vnpay/agribank_logo.png')}}" width="200" height="40" alt="AGRIBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="SACOMBANK">
                                                <input name="vnpay" type="submit" value="SACOMBANK" id="SACOMBANK" name="paymethod"><img src="{{asset('vnpay/sacombank_logo.png')}}" width="200" height="40" alt="SACOMBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="MBBANKHP">
                                                <input name="vnpay" type="submit" value="MBBANKHP" id="MBBANKHP" name="paymethod"><img src="{{asset('vnpay/mbb_logo.png')}}" width="200" height="40" alt="MBBANKHP"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="TECHCOMBANK">
                                                <input name="vnpay" type="submit" value="TECHCOMBANK" id="TECHCOMBANK" name="paymethod"><img src="{{asset('vnpay/techcombank_logo.png')}}" width="200" height="40" alt="TECHCOMBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="MBBANK">
                                                <input name="vnpay" type="submit" value="MBBANK" id="MBBANK" name="paymethod"><img src="{{asset('vnpay/mbb_logo.png')}}" width="200" height="40" alt="MBBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="ACB">
                                                <input name="vnpay" type="submit" value="ACB" id="ACB" name="paymethod"><img src="{{asset('vnpay/acb_logo.png')}}" width="200" height="40" alt="ACB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VPBANK">
                                                <input name="vnpay" type="submit" value="VPBANK" id="VPBANK" name="paymethod"><img src="{{asset('vnpay/vpbank_logo.png')}}" width="200" height="40" alt="VPBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="SHB">
                                                <input name="vnpay" type="submit" value="SHB" id="SHB" name="paymethod"><img src="{{asset('vnpay/shb_logo.png')}}" width="200" height="40" alt="SHB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="DONGABANK">
                                                <input name="vnpay" name="vnpay" type="submit" value="DONGABANK" id="DONGABANK" name="paymethod"><img src="{{asset('vnpay/dongabank_logo.png')}}" width="200" height="40" alt="DONGABANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="EXIMBANK">
                                                <input name="vnpay" type="submit" value="EXIMBANK" id="EXIMBANK" name="paymethod"><img src="{{asset('vnpay/eximbank_logo.png')}}" width="200" height="40" alt="EXIMBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="TPBANK">
                                                <input name="vnpay" type="submit" value="TPBANK" id="TPBANK" name="paymethod"><img src="{{asset('vnpay/tpbank_logo.png')}}" width="200" height="40" alt="TPBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="NCB">
                                                <input name="vnpay" type="submit" value="NCB" id="NCB" name="paymethod"><img src="{{asset('vnpay/ncb_logo.png')}}" width="200" height="40" alt="NCB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="OJB">
                                                <input name="vnpay" name="vnpay" type="submit" value="OJB" id="OJB" name="paymethod"><img src="{{asset('vnpay/oceanbank_logo.png')}}" width="200" height="40" alt="OJB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="MSBANK">
                                                <input name="vnpay" type="submit" value="MSBANK" id="MSBANK" name="paymethod"><img src="{{asset('vnpay/msbank_logo.png')}}" width="200" height="40" alt="MSBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="HDBANK">
                                                <input name="vnpay" type="submit" value="HDBANK" id="HDBANK" name="paymethod"><img src="{{asset('vnpay/hdbank_logo.png')}}" width="200" height="40" alt="HDBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="NAMABANK">
                                                <input name="vnpay" type="submit" value="NAMABANK" id="NAMABANK" name="paymethod"><img src="{{asset('vnpay/namabank_logo.png')}}" width="200" height="40" alt="NAMABANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="OCB">
                                                <input name="vnpay" name="vnpay" type="submit" value="OCB" id="OCB" name="paymethod"><img src="{{asset('vnpay/ocb_logo.png')}}" width="200" height="40" alt="OCB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="SCB">
                                                <input name="vnpay" type="submit" value="SCB" id="SCB" name="paymethod"><img src="{{asset('vnpay/scb_logo.png')}}" width="200" height="40" alt="SCB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="IVB">
                                                <input name="vnpay" type="submit" value="IVB" id="IVB" name="paymethod"><img src="{{asset('vnpay/ivb_logo.png')}}" width="200" height="40" alt="IVB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="ABBANK">
                                                <input name="vnpay" type="submit" value="ABBANK" id="ABBANK" name="paymethod"><img src="{{asset('vnpay/abbank_logo.png')}}" width="200" height="40" alt="ABBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VIETCAPITALBANK">
                                                <input name="vnpay" type="submit" value="VIETCAPITALBANK" id="VIETCAPITALBANK" name="paymethod"><img src="{{asset('vnpay/vietcapitalbank_logo.png')}}" width="200" height="40" alt="VIETCAPITALBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VIETBANK">
                                                <input name="vnpay" type="submit" value="VIETBANK" id="VIETBANK" name="paymethod"><img src="{{asset('vnpay/vietbank_logo.png')}}" width="200" height="40" alt="VIETBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="SEABANK">
                                                <input name="vnpay" type="submit" value="SEABANK" id="SEABANK" name="paymethod"><img src="{{asset('vnpay/seabank_logo.png')}}" width="200" height="40" alt="SEABANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VIB">
                                                <input name="vnpay" type="submit" value="VIB" id="VIB" name="paymethod"><img src="{{asset('vnpay/vib_logo.png')}}" width="200" height="40" alt="VIB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="BACABANK">
                                                <input name="vnpay" type="submit" value="BACABANK" id="BACABANK" name="paymethod"><img src="{{asset('vnpay/bacabank_logo.png')}}" width="200" height="40" alt="BACABANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VIETABANK">
                                                <input name="vnpay" type="submit" value="VIETABANK" id="VIETABANK" name="paymethod"><img src="{{asset('vnpay/vietabank_logo.png')}}" width="200" height="40" alt="VIETABANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="SAIGONBANK">
                                                <input name="vnpay" type="submit" value="SAIGONBANK" id="SAIGONBANK" name="paymethod"><img src="{{asset('vnpay/saigonbank_logo.png')}}" width="200" height="40" alt="SAIGONBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="PVCOMBANK">
                                                <input name="vnpay" type="submit" value="PVCOMBANK" id="PVCOMBANK" name="paymethod"><img src="{{asset('vnpay/PVComBank_logo.png')}}" width="200" height="40" alt="PVCOMBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="WOORIBANK">
                                                <input name="vnpay" type="submit" value="WOORIBANK" id="WOORIBANK" name="paymethod"><img src="{{asset('vnpay/wooribank_logo.png')}}" width="200" height="40" alt="WOORIBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="KIENLONGBANK">
                                                <input name="vnpay" type="submit" value="KIENLONGBANK" id="KIENLONGBANK" name="paymethod"><img src="{{asset('vnpay/kienlongbank_logo.png')}}" width="200" height="40" alt="KIENLONGBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="NAPAS">
                                                <input name="vnpay" type="submit" value="NAPAS" id="NAPAS" name="paymethod"><img src="#" width="200" height="40" alt="NAPAS"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="LIENVIETBANK">
                                                <input name="vnpay" type="submit" value="LIENVIETBANK" id="LIENVIETBANK" name="paymethod"><img src="{{asset('vnpay/lienvietbank_logo.png')}}" width="200" height="40" alt="LIENVIETBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="BAOVIETBANK">
                                                <input name="vnpay" type="submit" value="BAOVIETBANK" id="BAOVIETBANK" name="paymethod"><img src="{{asset('vnpay/baovietbank_logo.png')}}" width="200" height="40" alt="BAOVIETBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="PGBANK">
                                                <input name="vnpay" type="submit" value="PGBANK" id="PGBANK" name="paymethod"><img src="{{asset('vnpay/pgbank_logo.png')}}" width="200" height="40" alt="PGBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="GPBANK">
                                                <input name="vnpay" type="submit" value="GPBANK" id="GPBANK" name="paymethod"><img src="{{asset('vnpay/gpbank_logo.png')}}" width="200" height="40" alt="GPBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="UOB">
                                                <input name="vnpay" type="submit" value="UOB" id="UOB" name="paymethod"><img src="{{asset('vnpay/uob_logo.png')}}" width="200" height="40" alt="UOB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VRB">
                                                <input name="vnpay" type="submit" value="VRB" id="VRB" name="paymethod"><img src="{{asset('vnpay/vrb_logo.png')}}" width="200" height="40" alt="VRB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VIDBANK">
                                                <input name="vnpay" type="submit" value="VIDBANK" id="VIDBANK" name="paymethod"><img src="{{asset('vnpay/vidbank_logo.png')}}" width="200" height="40" alt="VIDBANK"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="SHINHANBANK">
                                                <input name="vnpay" type="submit" value="SHINHANBANK" id="SHINHANBANK" name="paymethod"><img src="{{asset('vnpay/shinhanbank_logo.png')}}" width="200" height="40" alt="SHINHANBANK"/>
                                            </label>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--Check InternalCard Support-->
                    <div class="wrap">
                        <button type="button" class="btn-list-option collapsed paytype-intncard" data-toggle="collapse" data-target="#tab2" aria-expanded="false">
                            Thẻ thanh to&#225;n quốc tế
                            <div class="triangle-border"></div>
                            <span class="arrow">
                                <img src="{{asset('vnpay/ic-arrow.svg')}}">
                            </span>
                        </button>
                        <div id="tab2" class="list-option-collapse collapse" aria-expanded="false" style="height: 1px;">
                            <div class="collapse-wrap">
                                <ul class="list_cart-2 clearfix">
                                        <li>
                                            <label for="AMEX">
                                                <input name="vnpay" type="submit" value="AMEX" id="AMEX" name="paymethod"><img src="{{asset('vnpay/amex_logo.png')}}" width="200" height="40" alt="AMEX"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="VISA">
                                                <input name="vnpay" type="submit" value="VISA" id="VISA" name="paymethod"><img src="{{asset('vnpay/visa_logo.png')}}" width="200" height="40" alt="VISA"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="MASTERCARD">
                                                <input name="vnpay" type="submit" value="MASTERCARD" id="MASTERCARD" name="paymethod"><img src="{{asset('vnpay/mastercard_logo.png')}}" width="200" height="40" alt="MASTERCARD"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="JCB">
                                                <input name="vnpay" type="submit" value="JCB" id="JCB" name="paymethod"><img src="{{asset('vnpay/jcb_logo.png')}}" width="200" height="40" alt="JCB"/>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="UPI">
                                                <input name="vnpay" type="submit" value="UPI" id="UPI" name="paymethod"><img src="{{asset('vnpay/upi_logo.png')}}" width="200" height="40" alt="UPI"/>
                                            </label>
                                        </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                <!--Check E-wallet support-->
                    <div class="wrap">
                        <button type="submit" value="VNMART" id="VNMART" name="paymethod" class="btn-list-option collapsed paytype-ewallet">V&#237; điện tử VNPAY</button>
                    </div>


        </div>
        <div class="text-center margin10 section-body-middle-bottom" id="btn-back">
            <button type="submit" class="btn btn-default" id="btnCancel" name="btnCancel" style="margin: 0 auto">Quay lại</button>
        </div>
</form>
    </div>
</div>
 
    <!-- End Footer -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
 <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/bootbox.min.js')}}"></script>

    
 
<script>
    $(document)
        .ready(function () {
            $('#btnCancel')
                .click(function () {
                    var x = this;
                    bootbox.confirm({
                        title: "X&#225;c nhận",
                        message: "Bạn muốn hủy thanh to&#225;n Giao dịch n&#224;y ?",
                        className: 'in',
                        buttons: {
                            cancel: {
                                label: 'Cancel',
                                className: 'btn-default btn-confirm-custom'
                            },
                            confirm: {
                                label: 'OK',
                                className: 'btn-primary btn-confirm-custom'
                            }
                        },
                        callback: function (result) {
                            if (result) {
                                var bootstrapValidator = $(x).closest('form').data('bootstrapValidator');
                                if (bootstrapValidator) {
                                    bootstrapValidator.destroy();
                                }  
                                
                                // $(this).closest('form').validate().cancelSubmit = true;
                                $('<input>')
                                    .attr({
                                        type: 'hidden',
                                        id: 'btnCancel',
                                        name: 'btnCancel',
                                        value: 'cancel'
                                    })
                                    .appendTo('form');
                                //Process Ajax Submit
                                var postData =$(x).closest('form').serialize();
                                var submitUrl = $(x).closest('form').attr("action");
                                $.ajax({
                                    type: "POST",
                                    url: submitUrl,
                                    data: postData,
                                    dataType: 'JSON',
                                    success: function (data) {
                                        if (data.code === '00') {
                                            //Check ifram container
                                            if (self === top) {
                                                //  location.href = data.url;
                                                setTimeout(function () {
                                                        location.href = data.url;
                                                    },
                                                    200);
                                            } else {
                                                //  window.top.location.href = data.url;
                                                setTimeout(function () {
                                                        window.top.location.href = data.url;
                                                    },
                                                    200);
                                            }
                                            return false;
                                        } else {
                                            alert(x.Message);
                                        }
                                    }
                                });
                                
                                // $(x).closest('form').submit();
                            }
                            return true;
                        }
                    });
                    return false;
                });
        });
</script>
</body>
</html>