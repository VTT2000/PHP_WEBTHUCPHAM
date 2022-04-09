<!DOCTYPE html>
<html lang="en">
  <head>
      @include('user.htmlhead')
  </head>
</html>
<body>
  @include('user.headeruser')


  
<main id="main" role="main">
    <section data-section-id="account" data-section-type="account">
        <div class="container container--flush">
            <div class="layout">
                <!--list tác vụ-->
                <div class="layout__section layout__section--secondary">
                    <div class="card card--sticky hidden-pocket">
                        <div class="card__section card__section--tight">

                          <div class="card__linklist">
                            <a href="<?php echo url('Account/Index'); ?>" class="card__linklist-item link">Thông tin cá nhân</a>
                  <a href="<?php echo url('Account/Invoice')?>" class="card__linklist-item link text--strong">Đơn hàng của tôi </a>
                      <a href="<?php echo url('Account/FollowedFood')?>" class="card__linklist-item link">Thực phẩm đã theo dõi</a>
                  <a href="#" class="card__linklist-item link" data-no-instant="" onclick="logOutTK()">Đăng xuất</a>
                          </div>
                        </div>
                    </div>
                </div>
                <!--layout tác vụ -->
                <div class="layout__section">
                    <div class="card">
                        <div class="card__section card__section--tight">
                            <h1 class="heading h1"> Các đơn hàng  </h1>
                        </div>
                        <div class="card__section">
                          <table class="line-item-table table table--loose">
                            <thead class="hidden-phone" style="">
                              <tr>
                                  <th >
                                    Tên thực phẩm
                                  </th>
                                  <th class="table__cell--center">
                                    Thuộc lô hàng
                                  </th class="table__cell--center"> 
                                  <th class="table__cell--center">
                                    Số lượng
                                  </th>
                                  <th  class="table__cell--right">
                                    Giá trị
                                  </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($list as $item)
                              
                            <tr>

                              <td>
                              
                                <a href="<?php echo url('Food/Index?id='.$item->IdThucPham); ?>">
                                  <?php
                                    foreach($ThucPhams as $i){
                                      if($i->IdThucPham == $item->IdThucPham){
                                        echo $i->TenThucPham;
                                        break;
                                      }
                                    } 
                                  ?>
                                </a>

                              </td>
                              <td class="line-item__line-price table__cell--center hidden-phone">
                              {{$item->IdLoHang}}
                              </td>
                              <td class="line-item__line-price table__cell--center hidden-phone">
                                {{$item->SoLuong}}
                              </td>
                              <td class="line-item__line-price table__cell--right hidden-phone">
                                {{$item->GiaTien}}đ
                              </td>

                            </tr>
@endforeach
                            </tbody>
                          </table>
                          <a class="fa fa-angle-double-left product-form__add-button button button--primary" href="{{url('Account/Invoice')}}">Trở về</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
  

  @include('user.footeruser')
</body>




