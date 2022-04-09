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
                <a href="<?php echo url('Account/Index'); ?>" class="card__linklist-item link text--strong">Thông tin cá nhân</a>
                <a href="<?php echo url('Account/Invoice')?>" class="card__linklist-item link">Đơn hàng của tôi </a>
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
              <h1 class="heading h1">Thông tin cá nhân </h1>
            </div>
            <div class="card__section">
                <form method="post" action="../Account/Index0" id="address_form_new" accept-charset="UTF-8" class="form">
                @csrf   
                <input type="hidden" name="form_type" value="customer_address"><input type="hidden" name="utf8" value="✓">
                    <div class="form__input-wrapper form__input-wrapper--labelled">
                        <label for="address-new[name]" class="form__floating-label">Họ và tên</label>
                        <input id="address-new[name]" type="text" class="form__field form__field--text" name="nameKH" value="{{$KH->Name}}" autofocus="">

                    </div>

                    <div class="form__input-wrapper form__input-wrapper--labelled">
                        <label for="address-new[phone]" class="form__floating-label">Điện thoại</label>
                        <input id="address-new[phone]" type="text" class="form__field form__field--text " name="sdtKH" value="{{$KH->SDT}}">

                    </div>

                    <div class="form__input-wrapper form__input-wrapper--labelled">
                        <label for="address-new[address1]" class="form__floating-label">Địa chỉ</label>
                        <input id="address-new[address1]" type="text" class="form__field form__field--text " name="diachiKH" value="{{$KH->DiaChi}}">

                    </div>
                    <div class="form__input-wrapper form__input-wrapper--labelled">
                        <label for="address-new[company]" class="form__floating-label">Email</label>
                        <input id="address-new[company]" type="email" class="form__field form__field--text " name="emailKH" value="{{$KH->Email}}">

                    </div>
                    <div class="form__input-wrapper form__input-wrapper--labelled">
                        <label for="address-new[address1]" class="form__floating-label">Password</label>
                        <input id="address-new[address1]" type="password" class="form__field form__field--text " name="pwKH" value="{{$KH->MatKhau}}">

                    </div>
                    <div class="form__input-wrapper form__input-wrapper--labelled">
                        <label for="address-new[address1]" class="form__floating-label">Xác nhận lại Password</label>
                        <input id="address-new[address1]" type="password" class="form__field form__field--text " name="repwKH" value="{{$KH->MatKhau}}">

                    </div>
                    <p class="text-danger">
                      {{$Error}}
                    </p>
                    <button class="form__submit button button--primary button--full" type="submit" style=" width: 40%; left: 300px; ">Cập nhật thông tin</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
</main>
  

  @include('user.footeruser')
</body>










