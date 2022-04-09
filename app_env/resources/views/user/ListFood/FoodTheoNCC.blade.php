<!DOCTYPE html>
<html lang="en">
  <head>
      @include('user.htmlhead')
  </head>
</html>
<body>
  @include('user.headeruser')




  <main id="main" role="main">
    <div id="shopify-section-collection-template" class="shopify-section">
      <section data-section-id="collection-template" data-section-type="collection">
        <div class="container container--flush">
          <div class="page__sub-header">
            <nav aria-label="Điều hướng" class="breadcrumb">
              <ol class="breadcrumb__list" role="list">
                <li class="breadcrumb__item">
                  <a class="breadcrumb__link link" href="/">Trang chủ</a><svg focusable="false" class="icon icon--arrow-right" viewBox="0 0 8 12" role="presentation">
                    <path stroke="currentColor" stroke-width="2" d="M2 2l4 4-4 4" fill="none" stroke-linecap="square"></path>
                  </svg>
                </li>
                <li class="breadcrumb__item">
                          <a class="breadcrumb__link link" href="<?php echo url('ListFood/Index');?>">Thực phẩm</a><svg focusable="false" class="icon icon--arrow-right" viewBox="0 0 8 12" role="presentation">
                            <path stroke="currentColor" stroke-width="2" d="M2 2l4 4-4 4" fill="none" stroke-linecap="square"></path>
                          </svg>
                        </li>
                <li class="breadcrumb__item"><span class="breadcrumb__link" aria-current="page">{{$NameId}}</span></li>
              </ol>
            </nav>
          </div>
          <div class="layout">
            <div class="layout__section layout__section--secondary hidden-pocket">
              <div class="card">
                <div class="card__section card__section--tight">
                  <p class="card__title--small heading">Nhà cung cấp</p>
                  <div class="collection__filter-group">
                      <ul class="collection__filter-checkbox-list" role="list">
                      @foreach($NhaSanXuats as $i)
                      <li class="collection__filter-checkbox">
                              <a href="<?php echo url('ListFood/FoodTheoNCC?id='.$i->IdNSX);?>" title="">
                              <?php echo $i->TenNSX;?>
                            </a>
                          </li>
                      @endforeach


                      </ul>
                  </div>
                </div>
                <div class="card__section card__section--tight">
                  <p class="card__title--small heading">Loại</p>
                  <div class="collection__filter-group">
                      <ul class="collection__filter-checkbox-list" role="list">
                          @foreach ($LoaiThucPhams as $j)
                          
                              <li class="collection__filter-checkbox">
                                  <a href="<?php echo url('ListFood/FoodTheoLoai?id='.$j->IdLoai);?>" title="">{{$j->TenLoai}}</a>
                              </li>
                          
                          @endforeach

                      </ul>
                  </div>
                </div>
                  
                  <div class="card__section card__section--tight">
                  <p class="card__title--small heading">Khuyến mãi</p>
                  <div class="collection__filter-group">
                      <ul class="collection__filter-checkbox-list" role="list">
                          
                              <li class="collection__filter-checkbox">
                                  <a href="<?php echo url('ListFood/FoodDuocKM');?>" title="">Các sản phẩm khuyến mãi</a>
                              </li>
                          

                      </ul>
                  </div>
                </div>

              </div>
            </div>

            <div class="layout__section">
              <div class="collection">
                <div class="card ">
                  <header class="card__header card__header--tight">
                    <div class="collection__header ">
                      <div class="collection__header-inner">
                        <div class="collection__description ">
                          <div class="rte" id="bigpen">
                          Sản phẩm của {{$NameId}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </header>
                  <div class="collection__dynamic-part">
                    <div class="collection__toolbar collection__toolbar--bordered">
                      <div class="collection__toolbar-item collection__toolbar-item--sort">
                        <div class="value-picker-wrapper">
                          <!-- nút ấn đễ sắp xếp theo giá-->
                          <button href1="<?php echo url('ListFood/FoodTheoNCC?sapxep=1&id='.$Id);?>" onclick="location.href = this.getAttribute('href1');" class="value-picker-button" type="button">
                            <span>Sắp xếp</span>
                          </button>
                        </div>

                      </div>
                    </div>

                    <div class="product-list product-list--collection product-list--with-sidebar">
                        @foreach($list as $item)
            
                        <div class="product-item product-item--vertical  1/3--tablet-and-up 1/4--desk">
                            <a href="<?php echo url('Food/Index?id='.$item->IdThucPham);?>" class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                                <div class="aspect-ratio " style="height:230px; width:230px; padding-bottom: 100.0%">
                                    <img class="product-item__primary-image image--fade-in lazyautosizes lazyloaded" src="{{$item->LinkHinhAnh}}" />

                                </div>
                            </a>
                            <div class="product-item__info">
                                <div class="product-item__info-inner">
                                    <a href="<?php echo url('Food/Index?id='.$item->IdThucPham);?>" class="product-item__title text--strong link">{{$item->TenThucPham}}</a>
                                    <div class="product-item__price-list price-list">
                                    <?php
                                        $khuyenMaiExist = null;
                                        foreach($KhuyenMais as $temp){
                                          if($temp->IdKhuyenMai == $item->IdKhuyenMai){
                                            $khuyenMaiExist = $temp;
                                            break;
                                          }
                                        }
                                    ?>    
                                    
                                    @if ($khuyenMaiExist != null)
                                        <?php
                                            $sale = $item->GiaBan * (100 - $khuyenMaiExist->PhanTramKhuyenMai) / 100;
                                            ?>
                                            <span class="price price--highlight">
                                                <span class="visually-hidden">Giá sale</span>{{$sale}}₫
                                            </span>
                                            <span class="price price--compare">
                                                <span class="visually-hidden">Giá gốc</span>{{$item->GiaBan}}₫
                                            </span> 
                                        @else
                                        
                                            <span class="price price--highlight">
                                                <span class="visually-hidden">Giá gốc</span>{{$item->GiaBan}}₫
                                            </span>
                                        @endif
                                    </div>
                                    <?php 
                                      $loHangExist = null;
                                        foreach($LoHangs as $temp0){
                                          if($temp0->IdThucPham == $item->IdThucPham && $temp0->SoLuong >0){
                                            $loHangExist = $temp0;
                                            break;
                                          }
                                        }
                                    ?>
                                    @if ($loHangExist != null)
                                    
                                        <form method="get" action="../GioHang/ThemGioHang" id="product_form_id_6806124495026_1624509122e13fa354" accept-charset="UTF-8" class="product-item__action-list button-stack" enctype="multipart/form-data">
                                            <input type="hidden" name="IdFood" value="{{$item->IdThucPham}}">
                                            <input type="hidden" name="strURL" value="<?php echo url()->full(); ?>">
                                            <button type="submit" class="product-item__action-button button button--small button--primary" data-action="add-to-cart">Thêm vào giỏ</button>
                                        </form> 
                                    @else
                                    
                                        <form method="get" accept-charset="UTF-8" class="product-item__action-list button-stack" enctype="multipart/form-data">
                                            <button class="product-item__action-button button button--small button--disabled" disabled="" style="cursor: not-allowed;">Hết hàng</button>
                                        </form>
                                        @endif
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
        </div>
      </section>
    </div>


  </main>
  


  @include('user.footeruser')
</body>




