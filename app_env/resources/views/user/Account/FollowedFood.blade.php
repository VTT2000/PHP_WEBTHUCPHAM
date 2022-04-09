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
                  <a href="<?php echo url('Account/Invoice')?>" class="card__linklist-item link">Đơn hàng của tôi </a>
                      <a href="<?php echo url('Account/FollowedFood')?>" class="card__linklist-item link text--strong">Thực phẩm đã theo dõi</a>
                  <a href="#" class="card__linklist-item link" data-no-instant="" onclick="logOutTK()">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--layout tác vụ -->
                <div class="layout__section">
                  <div class="card">
                    <div class="card__section card__section--tight">
                      <h1 class="heading h1"> Các thực phẩm đã theo dõi </h1>
                    </div>
                    <div class="table-wrapper">
                      <table class="line-item-table table table--loose">
                        <thead class="hidden-phone" style="">
                       <tr>
                        <th >
                          Id theo dõi
                        </th>
                        <th class="table__cell--center">
                          Tên thực phẩm
                        </th>
                        <th class="table__cell--center">
                          Số lượng trên một sản phẩm/Đơn vị tính
                        </th>
                        <th class="table__cell--center">
                          Tình trạng
                        </th>
                        <th class="table__cell--right" >
                          Thao tác
                        </th>                    
                        </tr>
                      </thead>
                        <tbody>
                          @foreach ($list as $item)
                          
                        <tr>
                          <td>
                            {{$item->IdTheoDoi}}
                          </td>
                          <td class="line-item__line-price table__cell--center hidden-phone">
                            <a href="<?php echo url('Food/Index?id='.$item->IdFood); ?>">
                              <?php
                                  $thucPham = null;
                                    foreach($ThucPhams as $i){
                                      if($i->IdThucPham == $item->IdFood){
                                        $thucPham = $i;
                                        echo $i->TenThucPham;
                                        break;
                                      }
                                    } 
                              ?>
                            </a>
                          </td>
                          <td class="line-item__line-price table__cell--center hidden-phone">
                          <?php echo($thucPham->SoLuongTrenMotSanPham.' '.$thucPham->DonViTinh); ?> 
                          </td>
                          <td class="line-item__line-price table__cell--center hidden-phone">
                            {{$thucPham->TrangThai}}
                          </td>
                          <td class="line-item__line-price table__cell--right hidden-phone">
                            <a href="<?php echo url('Account/DeleteFollowedFood?id='.$item->IdTheoDoi);?>" >Bỏ theo dõi</a>
                          </td>
                        </tr>
@endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
</main>

  

  @include('user.footeruser')
</body>










