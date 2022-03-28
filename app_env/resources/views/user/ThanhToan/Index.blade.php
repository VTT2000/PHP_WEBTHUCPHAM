<!DOCTYPE html>
<html lang="en">
  <head>
      @include('user.htmlhead')
      <link rel="stylesheet" href="{{asset('AdminLTE/css/checkout.css')}}" />
  </head>
</html>
<body>
  @include('user.headeruser')

  <div class="content" data-content="">
        <div class="wrap">
            <div class="main">
                <header class="main__header" role="banner">
                    <a class="logo logo--left" href="#">
                        <img alt="" class="logo__image logo__image--medium" src="~/img/logo.png">
                    </a>
                    <h1 class="visually-hidden">
                        Thông tin khách hàng
                    </h1>
                    <nav aria-label="Điều hướng">
                        <ol class="breadcrumb " role="list">
                            <li class="breadcrumb__item breadcrumb__item--completed">
                                <a class="breadcrumb__link" href="#">Giỏ hàng</a>
                                <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumb__chevron-icon" aria-hidden="true" focusable="false"> <use xlink:href="#chevron-right"></use> </svg>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--blank">
                                <span class="breadcrumb__text">Thanh toán</span>
                            </li>
                        </ol>
                    </nav>
                </header>
                <main class="main__content" role="main">
                    <div class="step" data-step="contact_information">
                        <form method="" action="" class="edit_checkout animate-floating-labels" novalidate="novalidate" data-customer-information-form="true" data-email-or-phone="true" accept-charset="UTF-8">
                            <div class="step__sections">
                                <!--Thông tin khách hàng-->
                                <div class="section section--contact-information">
                                    <div class="section__header">
                                        <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch" id="main-header" tabindex="-1">
                                                Thông tin liên lạc
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <div class="logged-in-customer-information">
                                            <p class="logged-in-customer-information__paragraph">
                                                <span class="page-main__emphasis">Tên khách hàng : {{$KhachHang->Name}}</span>
                                        
                                            </p>
                                        </div>
                                        <div class="'fieldset'">
                                            <div class="field field--required field--show-floating-label">
                                                <div class="field__input-wrapper">
                                                    <label class="field__label field__label--visible" for="checkout_shipping_address_city">Email</label>
                                                    <input disabled placeholder="Email" class="field__input" aria-required="true" size="30" type="text" value="<?php echo $KhachHang->Email; ?>">
                                                </div>
                                            </div>
                                            <div class="field field--required field--show-floating-label">
                                                <div class="field__input-wrapper">
                                                    <label class="field__label field__label--visible" for="checkout_shipping_address_city">Địa chỉ nhận hàng</label>
                                                    <input id="diaChiNhanHang000" name="diaChiNhanHang" placeholder="Địa chỉ nhận hàng" class="field__input" aria-required="true" size="30" type="text" value="<?php echo $KhachHang->DiaChi; ?>">
                                                </div>
                                            </div>
                                            <div class="field field--required field--show-floating-label">
                                                <div class="field__input-wrapper">
                                                    <label class="field__label field__label--visible" for="checkout_shipping_address_city">Số điện thoại</label>
                                                    <input disabled placeholder="Điện thoại" class="field__input" aria-required="true" size="30" type="text" value="<?php echo $KhachHang->SDT; ?>">
                                                </div>
                                            </div>
                                            <div class="field field--required field--show-floating-label">
                                                <div class="field__input-wrapper">
                                                    <label class="field__label field__label--visible" for="checkout_shipping_address_city">Ngày nhận hàng</label>
                                                    <input id="dateDelivery000" name="dateDelivery" placeholder="Ngày nhận" class="field__input" aria-required="true" size="30" type="datetime" 
                                                    value="<?php $datetime = new DateTime(); $datetime->setDate(date('Y'), date('m'), (date('d')+1)); echo $datetime->format('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--phuong thuc giao hàng-->
                                <div class="section">
                                    <div class="section__header">
                                        <h2 class="section__title">
                                            Phương thức thanh toán
                                        </h2>
                                    </div>
                                    <div class="section__content">
                                        <div class="content-box">
                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <a type="button" onclick="thanhToanThuong();" class="step__footer__continue-btn btn" aria-busy="true">
                                                        <span class="btn__content">Thanh toán thường (nhận tiền khi giao hàng)</span>
                                                    </a>
                                                    <script>
                                                        function thanhToanThuong(){
                                                            var domain = location.origin
                                                            url = domain + '/ThanhToan/ThanhToanThuong?dateDelivery=' + document.getElementById('dateDelivery000').value
                                                                +'&diaChiNhanHang='+document.getElementById('diaChiNhanHang000').value;
                                                            location.href = url;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <script src="https://www.paypal.com/sdk/js?client-id=AeNgWBwjVxAurOZjItvopDzG3j82L2BHC8UJp3_I9NvIbbZHs7JyWk-i7cNsKH2St2FWoyEKviQG_1oH&disable-funding=credit,card">
                                                    </script>
                                                    <div id="paypal-button-container"></div>
                                                    <script>
                                                        paypal.Buttons({
                                                            createOrder: function (data, actions) {
                                                                // This function sets up the details of the transaction, including the amount and line item details.
                                                                return actions.order.create({
                                                                    purchase_units: [{
                                                                        amount: {
                                                                            value: <?php echo $Tongtien ?>
                                                                        }
                                                                    }]
                                                                });
                                                            },
                                                            onApprove: function (data, actions) {
                                                                // This function captures the funds from the transaction.
                                                                return actions.order.capture().then(function (details) {
                                                                    // This function shows a transaction success message to your buyer.
                                                                    alert('Thanh toán Paypal thành công bởi ' +
                                                                        details.payer.name.given_name);
                                                                    location.href = location.origin + '/ThanhToan/ThanhToanPaypal?dateDelivery=' + document.getElementById('dateDelivery000').value
                                                                    +'&diaChiNhanHang='+document.getElementById('diaChiNhanHang000').value;
                                                                });
                                                            }
                                                        }).render('#paypal-button-container');
                                                        //This function displays Smart Payment Buttons on your web page.
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="step__footer" data-step-footer="">
                                    <a class="step__footer__previous-link" href="<?php echo url()->to('GioHang/Index'); ?>"><span class="step__footer__previous-link-content">Trở lại giỏ hàng</span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
                <footer class="main__footer" role="contentinfo">
                    <ul class="policy-list" role="list">
                        <li class="policy-list__item ">
                            <a>Chính sách đổi trả hàng</a>
                        </li>
                        <li class="policy-list__item ">
                            <a>Chính sách giao hàng</a>
                        </li>
                        <li class="policy-list__item ">
                            <a>Chính sách bảo mật</a>
                        </li>
                        <li class="policy-list__item ">
                            <a>Điều khoản sử dụng</a>
                        </li>
                    </ul>




                </footer>
            </div>
            <aside class="sidebar" role="complementary">
                <div class="sidebar__header">


                </div>
                <div class="sidebar__content">
                    <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary="">

                        <div class="order-summary__sections">
                            <div class="order-summary__section order-summary__section--product-list">
                                <div class="order-summary__section__content">
                                    <table class="product-table">
                                        <thead class="product-table__header">
                                            <tr>
                                                <th scope="col"><span class="">Hình ảnh</span></th>
                                                <th scope="col"><span class="">Thông tin sản phẩm</span></th>
                                                <th scope="col"><span class="">Giá</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-order-summary-section="line-items">
                                            @foreach ($listGH as $item)
                                            
                                                <tr class="product" data-product-id="" data-variant-id="" data-product-type="" data-customer-ready-visible="">
                                                    <td class="product__image">
                                                        <div class="product-thumbnail ">
                                                            <div class="product-thumbnail__wrapper">
                                                                <img alt="{{$item->getNameFood()}}" class="product-thumbnail__image" src="{{$item->getLinkHinhAnh()}}">
                                                            </div>

                                                        </div>

                                                    </td>
                                                    <th class="product__description" scope="row">
                                                        <span class="product__description__name order-summary__emphasis">{{$item->getNameFood()}}</span>
                                                        <br />
                                                        <span class="product__description__variant order-summary__small-text">Số lượng: {{$item->getSoLuong()}}</span>
                                                    </th>

                                                    <td class="product__price">
                                                        <span class="order-summary__emphasis skeleton-while-loading">{{$item->getThanhTien()}}₫</span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                        <tr>
                                        </tr>
                                    </thead>
                                    
                                    <tfoot class="total-line-table__footer">
                                        <tr class="total-line">
                                            <th class="total-line__name payment-due-label" scope="row">
                                                <span class="payment-due-label__total">Tổng cộng</span>
                                            </th>
                                            <td class="total-line__price payment-due" data-presentment-currency="VND">
                                                <span class="payment-due__price skeleton-while-loading--lg" data-checkout-payment-due-target="">
                                                    {{$Tongtien}}₫
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="partial-icon-symbols" class="icon-symbols" data-tg-refresh="partial-icon-symbols" data-tg-refresh-always="true">
                        <svg xmlns="http://www.w3.org/2000/svg">
                            <symbol id="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.1 2.3L13.7.9 8 6.6 2.3.9.9 2.3 6.6 8 .9 13.7l1.4 1.4L8 9.4l5.7 5.7 1.4-1.4L9.4 8"></path></svg></symbol>
                            <symbol id="spinner-small"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M32 16c0 8.837-7.163 16-16 16S0 24.837 0 16 7.163 0 16 0v2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14h2z"></path></svg></symbol>
                            <symbol id="spinner-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z"></path></svg></symbol>
                            <symbol id="chevron-right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"></path></svg></symbol>
                            <symbol id="down-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12"><path d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"></path></svg></symbol>
                        </svg>
                    </div>
                </div>
            </aside>
        </div>
    </div>

  @include('user.footeruser')
</body>