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
                          <div class="table-wrapper">
                            <table class="line-item-table table table--loose">
                              <thead class="hidden-phone" style="">
                                <tr>
                                  <th>
                                    Id hóa đơn
                                  </th>
                                  <th class="table__cell--center">
                                    Ngày đặt
                                  </th>
                                  <th class="table__cell--center">
                                    Ngày nhận
                                  </th>
                                  <th class="table__cell--center">
                                    Tổng giá trị
                                  </th>
                                  <th class="table__cell--center">
                                    Phương thức thanh toán
                                  </th>
                                  <th class="table__cell--center">
                                    Tình trạng
                                  </th>
                                  <th class="table__cell--right">
                                    Thao tác
                                  </th>
                                </tr>
                                </thead>
                              <tbody>

                                @foreach ($list as $item)
                                
                              <tr>
                                <td>
                                  <?php echo($item->IdInvoice);?>
                                </td>
                                <td class="line-item__line-price table__cell--center hidden-phone">
                                  <?php echo($item->NgayDat);?>
                                </td>
                                <td class="line-item__line-price table__cell--center hidden-phone">
                                  <?php echo($item->NgayGiao);?>
                                </td>
                                <td class="line-item__line-price table__cell--center hidden-phone">
                                  <?php echo($item->TongTien);?>đ
                                </td>
                                <td class="line-item__line-price table__cell--center hidden-phone">
                                  <?php echo($item->PhuongThucThanhToan);?>
                                </td>
                                <td class="line-item__line-price table__cell--center hidden-phone">
                                  <?php echo($item->TrangThai);?>
                                </td>
                                <td class="line-item__line-price table__cell--right hidden-phone">
                                  <a href="<?php echo('../Account/DetailInvoice?id='.$item->IdInvoice); ?>">Xem chi tiết</a>
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
        </div>
    </section>
</main>
  

  @include('user.footeruser')
</body>