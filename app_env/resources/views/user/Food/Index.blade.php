<!DOCTYPE html>
<html lang="en">
  <head>
      @include('user.htmlhead')
  </head>
</html>
<body>
  @include('user.headeruser')


  <body>
  <main id="main" role="main">
    <!-- link diều huong-->
    <div id="shopify-section-product-template" class="shopify-section">
      <section data-section-id="product-template" data-section-type="product">
        <div class="container container--flush">
          <div class="page__sub-header">
            <nav aria-label="Điều hướng" class="breadcrumb">
              <ol class="breadcrumb__list" role="list">
                <li class="breadcrumb__item">
                  <a class="breadcrumb__link link" href="#">Trang chủ</a><svg focusable="false" class="icon icon--arrow-right" viewBox="0 0 8 12" role="presentation">
                    <path stroke="currentColor" stroke-width="2" d="M2 2l4 4-4 4" fill="none" stroke-linecap="square"></path>
                  </svg>
                </li>
                <li class="breadcrumb__item">
                  <a class="breadcrumb__link link" href="#">Sản phẩm</a>
                  <svg focusable="false" class="icon icon--arrow-right" viewBox="0 0 8 12" role="presentation">
                    <path stroke="currentColor" stroke-width="2" d="M2 2l4 4-4 4" fill="none" stroke-linecap="square"></path>
                  </svg>
                </li>
                <li class="breadcrumb__item">
                  <span class="breadcrumb__link" aria-current="page">{{$thucPham->TenThucPham}}</span>
                </li>
              </ol>

            </nav>
            <div class="page__navigation">
              <span class="page__navigation-item page__navigation-item--next">
                <a href="#" class="link" rel="next">
                  Sau
                  <svg focusable="false" class="icon icon--arrow-right" viewBox="0 0 8 12" role="presentation">
                    <path stroke="currentColor" stroke-width="2" d="M2 2l4 4-4 4" fill="none" stroke-linecap="square"></path>
                  </svg>
                </a>
              </span>
            </div>
          </div>

          <div class="product-block-list product-block-list--small">
            <div class="product-block-list__wrapper" style="min-height: 496px;">
              <!--ảnh-->
              <div class="product-block-list__item product-block-list__item--gallery">
                <div class="card">
                  <div class="card__section card__section--tight">
                    <div class="product-gallery product-gallery--with-thumbnails">
                      <div class="product-gallery__carousel-wrapper">
                        <div class="product-gallery__carousel product-gallery__carousel--zoomable flickity-enabled is-fade" data-media-count="4" data-initial-media-id="21722104823986" >
                          <div class="flickity-viewport" style="height: 500px; touch-action: pan-y;">
                            <div class="flickity-slider" style="left: 0px; transform: translateX(50%);">
                              <div class="product-gallery__carousel-item is-selected" tabindex="-1" data-media-id="21722104823986" data-media-type="image" style="position: absolute; left: -50%; opacity: 1;">
                                <div class="product-gallery__size-limiter" style="max-width: 600px">
                                  <div class="aspect-ratio" style="padding-bottom: 100.0%">
                                    <img class="product-gallery__image image--fade-in lazyautosizes ls-is-cached lazyloaded" data-widths="[400,500,600]" data-sizes="auto" data-zoom="" alt="" data-srcset="" sizes="261px" src="{{$thucPham->LinkHinhAnh}}">
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
              <!--Food-->
              <div class="product-block-list__item product-block-list__item--info">
                <div class="card card--collapsed card--sticky" style="top: 241px;">
                  <div id="product-zoom-product-template" class="product__zoom-wrapper"></div><div class="card__section">

                    <div class="product-meta">
                      <h1 class="product-meta__title heading h1">{{$thucPham->TenThucPham}}</h1>
                      
                      <hr class="card__separator">
                      <form method="get" action="../GioHang/ThemGioHang" id="product_form_6806124495026" accept-charset="UTF-8" class="product-form" enctype="multipart/form-data">
                        <div class="product-form__info-list">
                          <div class="product-form__info-item">
                            <span class="product-form__info-title text--strong">Giá:</span>

                            <div class="product-form__info-content" role="region" aria-live="polite">
                              <div class="price-list">
                                <input id="idFood" type="hidden" name="IdFood" value="{{$thucPham->IdThucPham}}" />
                                <?php
                                    $khuyenMaiExist = null;
                                    foreach($KhuyenMais as $item){
                                        if($item->IdKhuyenMai == $thucPham->IdKhuyenMai){
                                            $khuyenMaiExist = $item;
                                        }
                                    }
                                ?>
                                @if (!empty($khuyenMaiExist))
                                    <?php
                                        $sale = $thucPham->GiaBan * (100 - $khuyenMaiExist->PhanTramKhuyenMai) / 100;
                                    ?>

                                  
                          <span class="price price--highlight">
                            <span class="visually-hidden">Giá sale</span>{{$sale}}₫
                          </span>
                                  <span class="price price--compare">
                                    <span class="visually-hidden">Giá gốc</span>{{$thucPham->GiaBan}}₫
                                  </span> 
                                @else
                                
                          <span class="price price--highlight">
                            <span class="visually-hidden">Giá gốc</span>{{$thucPham->GiaBan}}₫
                          </span>
                          @endif
                              </div>


                            </div>
                          </div>
                          <?php
                                $LoHang = null;
                                foreach($LoHangs as $item0){
                                    if($item0->IdThucPham == $thucPham->IdThucPham && $item0->SoLuong > 0){
                                        $LoHang = $item0;
                                    }
                                }
                          ?>
                          @if (!empty($LoHang))
                          
                    <div class="product-form__info-item">
                      <span class="product-form__info-title text--strong">Kho:</span>

                      <div class="product-form__info-content"><span class="product-form__inventory inventory inventory--high">Còn hàng</span></div>
                    </div>
                            <div class="product-form__info-item product-form__info-item--quantity">
                              <label for="product-template-6806124495026-quantity" class="product-form__info-title text--strong">Số lượng:</label>

                              <div class="product-form__info-content">
                                <div class="quantity-selector quantity-selector--product">
                                  <button id="giamSL" type="button" class="quantity-selector__button" data-action="decrease-picker-quantity" aria-label="Giảm số lượng xuống 1" title="Giảm số lượng xuống 1">
                                    <svg focusable="false" class="icon icon--minus" viewBox="0 0 10 2" role="presentation">
                                      <path d="M10 0v2H0V0z" fill="currentColor"></path>
                                    </svg>
                                  </button>
                                  <input id="soLuong" name="soLuong" aria-label="Số lượng" class="quantity-selector__value" inputmode="numeric" value="1" size="3">
                                  <button id="tangSL" type="button" class="quantity-selector__button" data-action="increase-picker-quantity" aria-label="Tăng số lượng lên 1" title="Tăng số lượng lên 1">
                                    <svg focusable="false" class="icon icon--plus" viewBox="0 0 10 10" role="presentation">
                                      <path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z" fill="currentColor" fill-rule="evenodd"></path>
                                    </svg>
                                  </button>
                                  <script>
                                    var giam = document.getElementById("giamSL");
                                    var soLuonght = document.getElementById("soLuong");
                                    var tang = document.getElementById("tangSL");

                                    giam.onclick = function () {
                                      if (parseInt(soLuonght.value, 0) - 1 < 1) {

                                      }
                                      else {
                                        soLuonght.value = parseInt(soLuonght.value, 0) - 1;
                                      }
                                    };

                                    tang.onclick = function () {
                                      if (parseInt(soLuonght.value, 0) + 1 > 10) {

                                      }
                                      else {
                                        soLuonght.value = parseInt(soLuonght.value, 0) + 1;
                                      }
                                    };

                                    soLuonght.onchange = function () {
                                      if (soLuonght.value.length == 0) {

                                      }
                                      else {
                                        if (soLuonght.value > 10) {
                                          soLuonght.value = 10;
                                        }
                                        if (soLuonght.value < 1) {
                                          soLuonght.value = 1;
                                        }
                                      }
                                    };

                                  </script>
                                </div>
                              </div>
                            </div> 
                          @else
                          
                    <div class="product-form__info-item">
                      <span class="product-form__info-title text--strong">Kho:</span>

                      <div class="product-form__info-content"><span class="product-item__inventory inventory inventory--high">Hết hàng</span></div>
                    </div>
                    @endif


                        </div>
                        <div class="product-form__payment-container">
                            <?php
                                use Illuminate\Http\Request;
                            ?>
                          <input type="hidden" name="strURL" value="<?php echo url()->full(); ?>">
                    @if (!empty($LoHang))
                          
                    <button type="submit" class="product-form__add-button button button--primary" data-action="add-to-cart">Thêm vào giỏ hàng</button>
                    @endif
                          <div data-shopify="payment-button" class="shopify-payment-button">
                            @if ($TheoDoi == false)
                            
                      <button id="btnTheoDoi0" type="button" class="shopify-payment-button__button shopify-payment-button__button--unbranded _2ogcW-Q9I-rgsSkNbRiJzA _2EiMjnumZ6FVtlC7RViKtj _2-dUletcCZ2ZL1aaH0GXxT" data-testid="Checkout-button">Theo dõi</button> 
                    @else
                    
              <button id="btnTheoDoi0" type="button" class="shopify-payment-button__button shopify-payment-button__button--unbranded _2ogcW-Q9I-rgsSkNbRiJzA _2EiMjnumZ6FVtlC7RViKtj _2-dUletcCZ2ZL1aaH0GXxT" data-testid="Checkout-button">Bỏ theo dõi</button>
              @endif
                            <script>
                              var btnTheodoi = document.getElementById("btnTheoDoi0");
                              var urlTheoDoi = location.origin + "/api/TheoDoiThucPham/" + document.getElementById("idFood").value;
                              btnTheodoi.onclick = function () {
                                fetch(urlTheoDoi)
                                  .then(response => response.text())
                                  .then(response => {
                                    // Do something with response.
                                    if (response == "1") {
                                      btnTheodoi.innerHTML = "Bỏ theo dõi";
                                    }
                                    else {
                                      if (response == "0") {
                                        btnTheodoi.innerHTML = "Theo dõi";
                                      }
                                      else {
                                        alert(response);
                                      }

                                    }
                                  })
                                  .catch(error => alert(error));
                              };

                            </script>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--Description-->
              <div class="product-block-list__item product-block-list__item--description">
                <div class="card">
                  <div class="card__header">
                    <h2 class="card__title heading h3">Mô tả</h2>
                  </div>
                  <div class="card__section">
                    <div class="rte text--pull bigpen-body-content">
                      <p>
                        Sản phẩm : {{$thucPham->TenThucPham}}
                      </p>

                      Thuộc loại thực phẩm : <?php
                            foreach($LoaiThucPhams as $t){
                                if($t->IdLoai == $thucPham->IdLoai){
                                    echo $t->TenLoai;
                                    break;
                                }
                            }
                      ?>
                      <br />
                      Số lượng trên một sản phẩm : {{$thucPham->SoLuongTrenMotSanPham}}
                      <br />
                      Đơn vị tính : {{$thucPham->DonViTinh}}
                      <br />
                      Nhà sản xuất : <?php
                            foreach($NhaSanXuats as $r){
                                if($r->IdNSX == $thucPham->IdNSX){
                                    echo $r->TenNSX;
                                    break;
                                }
                            }
                      ?>
                      @if (!empty($thucPham->IdKhuyenMai))
                      
                <br />
                        <?php 
                        foreach($KhuyenMais as $q){
                            if($q->IdKhuyenMai == $thucPham->IdKhuyenMai){
                                echo $q->MoTaKhuyenMai;
                                break;
                            }
                        }
                        ?>
                        
                        @endif
                      <br />
                      Trạng thái : {{$thucPham->TrangThai}}
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="Lc0lITfh"></script>
    <div class="fb-comments" data-href="https://localhost:44300/Food/Index/TP000006" data-width="" data-numposts="5"></div>

    <!--comment-->
    <!--Recomend-->
    <div id="shopify-section-product-recommendations" class="shopify-section">
      <section class="section" data-section-id="product-recommendations" data-section-type="product-recommendations" data-section-settings="{}">
        <div class="container">
          <header class="section__header">
            <h2 class="section__title heading h3">Sản phẩm cùng loại</h2>
          </header><div class="product-recommendations">
            <div class="scroller">
              <div class="scroller__inner">
                <div class="flickity-viewport" style="height: 455.594px; touch-action: pan-y;">
                  <div class="product-list product-list--vertical product-list--scrollable flickity-enabled" tabindex="0">
                    <?php
                        $list0 = array();
                        foreach($ThucPhams as $i0){
                            if($i0->IdLoai == $thucPham->IdLoai){
                                array_push($list0, $i0);
                            }
                        }
                        
                    ?>

                    @foreach ($list0 as $i)
                    

              <div class="product-item product-item--vertical 1/4--lap 1/5--desk 1/6--wide is-selected" style="left:0%;">
                <a href="<?php echo url()->to("/Food/Index?id=".$i->IdThucPham); ?>" class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                  <div class="aspect-ratio " style="height: 155px; width: 155px; padding-bottom: 100.0%">
                    <img class="product-item__primary-image image--fade-in lazyautosizes ls-is-cached lazyloaded" data-media-id="21727069831346"
                         data-sizes="auto" data-widths="[200,300,400,500,600]" alt="{{$i->TenThucPham}}"
                         data-srcset="" sizes="204px" srcset="{{$i->LinkHinhAnh}}">
                    <noscript>
                      <img src="{{$i->LinkHinhAnh}}" alt="{{$i->TenThucPham}}">
                    </noscript>
                  </div>
                </a>
                <div class="product-item__info">
                  <div class="product-item__info-inner">
                    <a href="<?php echo url()->to("/Food/Index?id=".$i->IdThucPham); ?>" class="product-item__title text--strong link">{{$i->TenThucPham}}</a>
                    <div class="product-item__price-list price-list">
                        <?php 
                            $khuyenMaiExist0 = null;
                            foreach($KhuyenMais as $x){
                                if($x->IdKhuyenMai == $i->IdKhuyenMai){
                                    $khuyenMaiExist0 = $x;
                                }
                            }
                        ?>
                      @if (!empty($khuyenMaiExist0))
                        <?php
                        $sale = $i->GiaMua * (100 - $khuyenMaiExist0->PhanTramKhuyenMai) / 100;
              ?>
                        <span class="price price--highlight">
                <span class="visually-hidden">Giá sale</span>{{$sale}}₫
              </span>
                        <span class="price price--compare">
                          <span class="visually-hidden">Giá gốc</span>{{$i->GiaBan}}₫
                        </span> 
                      @else
                      
              <span class="price price--highlight">
                <span class="visually-hidden">Giá gốc</span>{{$i->GiaBan}}₫
              </span>@endif
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!--Recently-->
    <div id="shopify-section-static-recently-viewed-products" class="shopify-section" style="display: block;">
      <section class="section" data-section-id="static-recently-viewed-products" data-section-type="recently-viewed-products" data-section-settings="{ }">
        <div class="container">
          <header class="section__header">
            <h2 class="section__title heading h3">Sản phẩm bạn vừa xem</h2>
          </header><div class="recently-viewed-products-placeholder">
            <div class="scroller">
              <div class="scroller__inner">
                <div class="flickity-viewport" style="height: 440.594px; touch-action: pan-y;">
                  <div class="product-list product-list--vertical product-list--scrollable flickity-enabled" tabindex="0">

                    <?php
                        $listDaXem0 = array();
                        $listDaXem = session()->get("listSPdaXem"); 
                        foreach($ThucPhams as $z){
                            if(in_array($z->IdThucPham, $listDaXem) ){
                                array_push($listDaXem0, $z);
                            }
                        }        
                    ?>
                    @foreach ($listDaXem0 as $y)
                    

              <div class="product-item product-item--vertical 1/4--lap 1/5--desk 1/6--wide is-selected" style="left: 0%;">
                <a href="<?php echo url()->to("/Food/Index?id=".$y->IdThucPham); ?>" class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                  <div class="aspect-ratio " style="height: 155px; width: 155px; padding-bottom: 100.0%">
                    <img class="product-item__primary-image image--fade-in lazyautosizes ls-is-cached lazyloaded" data-media-id="21722104103090" data-sizes="auto" data-widths="[200,300,400,500,600]" alt="Bánh Mì Hoa Cúc Mini Harrys Pháp 210gr"
                         data-srcset="" sizes="204px" srcset="{{$y->LinkHinhAnh}}">
                    <noscript>
                      <img src="{{$y->LinkHinhAnh}}" alt="{{$y->TenThucPham}}">
                    </noscript>
                  </div>
                </a>
                <div class="product-item__info">
                  <div class="product-item__info-inner">
                    <a href="<?php echo url()->to("/Food/Index?id=".$y->IdThucPham); ?>" class="product-item__title text--strong link">{{$y->TenThucPham}}</a><div class="product-item__price-list price-list">
                      <span class="price">
                        <span class="visually-hidden">Giá </span>{{$y->GiaBan}}₫
                      </span>
                    </div>
                    <?php
                        $existLoHang = null;
                        foreach($LoHangs as $p){
                            if($p->IdThucPham == $y->IdThucPham && $p->SoLuong > 0){
                                $existLoHang = $p;
                            }
                        }
                    ?>
                    @if (!empty($existLoHang))
                    
            <form method="get" action="../GioHang/ThemGioHang" id="product_form_id_6806124396722_static-recently-viewed-products" accept-charset="UTF-8" class="product-item__action-list button-stack" enctype="multipart/form-data">
              <input type="hidden" name="IdFood" value="{{$y->IdThucPham}}">
              <input type="hidden" name="strURL" value="<?php echo url()->full(); ?>">
              <button type="submit" class="product-item__action-button product-item__action-button--list-view-only button button--small button--primary" data-action="add-to-cart">Thêm vào giỏ</button>

            </form> 
          @else
          
  <form method="get" action="g" id="product_form_id_6806124396722_static-recently-viewed-products" accept-charset="UTF-8" class="product-item__action-list button-stack" enctype="multipart/form-data">

    <button type="submit" class="product-item__action-button product-item__action-button--list-view-only button button--small button--disabled" disabled="" style="cursor: not-allowed;">hết hàng </button>

  </form>@endif
                  </div>
                </div>
              </div>
              @endforeach

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    

  </main>
</body>

  @include('user.footeruser')
</body>




