<!DOCTYPE html>
<html lang="en">
  <head>
      @include('user.htmlhead')
  </head>
</html>
<body>
  @include('user.headeruser')

  <main id="main" role="main">
    <div id="shopify-section-cart-template" class="shopify-section">
        <section data-section-id="cart-template" data-section-type="cart" data-section-settings="">
            <div class="container">
                <header class="page__header page__header--stack">
                    <h1 class="page__title heading h1">Giỏ hàng</h1>
                </header>
            </div>
            <div class="cart-wrapper" style="min-height: 358px;">
                <div class="cart-wrapper__inner">
                    <div class="cart-wrapper__inner-inner">
                        <div class="container container--flush">
                            <div class="card">
                                <div class="table-wrapper">
                                    <table class="line-item-table table table--loose">
                                        <thead class="hidden-phone">
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th class="table__cell--center">Số lượng</th>
                                                <th class="table__cell--center">Tổng</th>
                                                 <th class="table__cell--right">Tác vụ</th>
                                              </tr>
                                        </thead>
                                        <!-- đồ trong giỏ hàng-->
                                        <tbody>
                                            @foreach ($gioHangs as $item)
                                            
                                          <tr class="line-item line-item--stack">
                                            <td class="line-item__product-info">
                                              <div class="line-item__product-info-wrapper">
                                                <div class="line-item__image-wrapper">
                                                  <div class="aspect-ratio" style="padding-bottom: 100.0%">
                                                    <img src="<?php echo $item->getLinkHinhAnh();?>" alt="">
                                                  </div>
                                                </div>
                                                <div class="line-item__meta">
                                                  <a href="<?php echo url('Food/Index?id='.$item->getIdFood()); ?>" class="line-item__title link text--strong">{{$item->getNameFood()}}</a><div class="line-item__price-list"><span class="line-item__price">{{$item->getDonGia()}}₫</span></div>
                                                  <!--meobiet-->
                                                </div>
                                              </div>
                                            </td>
                                            <td class="line-item__quantity table__cell--center hidden-phone">
                                              <div class="quantity-selector">
                                                <a href="<?php echo url('GioHang/GiamMot?IdFood='.$item->getIdFood()) ;?>" type="button" class="quantity-selector__button" aria-label="Giảm số lượng xuống 1" title="Giảm số lượng xuống 1">
                                                  <svg focusable="false" class="icon icon--minus" viewBox="0 0 10 2" role="presentation">
                                                    <path d="M10 0v2H0V0z" fill="currentColor"></path>
                                                  </svg>
                                                </a>
                                                <input id="{{$item->getIdFood()}}" onchange="thayDoiSL(this.getAttribute('id'));" aria-label="Số lượng" class="quantity-selector__value" inputmode="numeric" value="{{$item->getSoLuong()}}" size="2">
                                                <script>
                                                  function thayDoiSL(id) {
                                                    var x = document.getElementById(id);
                                                    if (x.value.length == 0) {
                                                      x.value = "1";
                                                    }
                                                    else {
                                                      if (parseInt(x.value, 0) > 10) {
                                                        x.value = "10";

                                                      }
                                                      if (parseInt(x.value, 0) < 1) {
                                                        x.value = "1";
                                                      }
                                                    }
                                                    location.href = "http://" + location.host + "/GioHang/CapNhatGioHang?IdFood=" + id + "&soLuong=" + x.value;
                                                  }
                                                </script>
                                                <button dc-href="<?php echo url('GioHang/ThemMot?IdFood='.$item->getIdFood()) ;?>" onclick="location.href = this.getAttribute('dc-href');" type="button" class="quantity-selector__button" aria-label="Tăng số lượng lên 1" title="Tăng số lượng lên 1">
                                                  <svg focusable="false" class="icon icon--plus" viewBox="0 0 10 10" role="presentation">
                                                    <path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z" fill="currentColor" fill-rule="evenodd"></path>
                                                  </svg>
                                                </button>
                                              </div>

                                            </td>
                                            <td class="line-item__line-price table__cell--center hidden-phone"><span>{{$item->getThanhTien()}}</span>đ</td>
               
                                            <td class="line-item__line-price table__cell--right hidden-phone">  <a href="<?php echo url('GioHang/DeleteGH?id='.$item->getIdFood()) ?>">Loại bỏ</a></td>
                                                  </tr>
            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <form class="cart-recap" novalidate="novalidate" data-item-count="1">
                                <div class="cart-recap__scroller">
                                    <div class="card">
                                        <div class="card__section">
                                            <div class="cart-recap__price-line text--pull">
                                                <span class="cart-recap__price-line-label">Tổng cộng</span>
                                                <span style="display: block; text-align: right;" class="saw-extra-note"></span><span class="saw-cart-original-total"><span class="cart-recap__price-line-price">{{$Tongtien}}₫</span></span><br><span class="saw-cart-total"></span>
                                            </div>
                                            <div class="cart-recap__notices rte">
                                                <p>
                                                    Phí vận chuyển tính tại bước thanh toán
                                                </p>
                                            </div>
                                            <input type="hidden" value="<?php echo session()->get('KhachHangIdKH'); ?>" id="IDKHDN" />
                                            <input type="hidden" value="<?php echo count($gioHangs) ;?>" id="SLGH" />
                                            @if(!empty($KhachHang))
            
                                        <input type="hidden" value="{{$KhachHang->DiaChi}}" id="DiaChiKH" />
            
            @else
            
                                        <input type="hidden" value="" id="DiaChiKH" />
            @endif
                                            

                                            <button onclick="thanhToan();" class="cart-recap__checkout button button--primary button--full button--large">Thanh toán</button>
                                            <script>
                                                function thanhToan() {
                                                    var z = document.getElementById("IDKHDN");
                                                    if (z.value == null || z.value.length == 0) {
                                                        alert("Bạn hãy đăng nhập để thanh toán");
                                                        return;
                                                    }
                                                    else {
                                                        var c = document.getElementById("SLGH");
                                                        if (parseInt(c.value, 0) == 0) {
                                                            alert("Giỏ hàng bạn đang trống");
                                                            return;
                                                        }
                                                        var n = document.getElementById("DiaChiKH");
                                                        if (n.value.length == 0) {
                                                            alert("Bạn hãy điền địa chỉ trong thông tin cá nhân để thanh toán");
                                                            return;
                                                        }
                                                        else {
                                                            location.href = "http://" + location.host + "/ThanhToan/Index";
                                                            alert("Bắt đầu chuyển hướng sang trang thanh toán");
                                                            return;
                                                        }
                                                    }
                                                    
                                                }
                                                
                                            </script>
                                        </div>
                                    </div>
                                    <div class="cart-recap__secure-payment">
                                        <p class="cart-recap__secure-payment-title">
                                            <svg focusable="false" class="icon icon--lock-2" viewBox="0 0 12 15" role="presentation">
                                                <g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                    <path d="M6 1C4.32 1 3 2.375 3 4.125V6h6V4.125C9 2.375 7.68 1 6 1zM1 6h10v8H1z"></path>
                                                </g>
                                            </svg> 100% Bảo mật thanh toán
                                        </p>
                                        <div class="cart-recap__secure-payment-list payment-list payment-list--centered">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
  
  @include('user.footeruser')
</body>



