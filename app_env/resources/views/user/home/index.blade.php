<?php
  include_once("./app_env/resources/views/layout/headerUser.blade.php");
?>
<body>

    <!-- body-->
    <main id="main" role="main">
        <!-- slider-->
        <div id="shopify-section-slideshow" class="shopify-section">

            <section data-section-id="slideshow" data-section-type="slideshow">
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style=" height:650px;">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner flickity-viewport">
                  <div class="carousel-item active" data-bs-interval="2000">
                    <img src="~/img/thit.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="slideshow__title heading h1">BÁN THỰC PHẨM SẠCH</h2>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="~/img/do an.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="slideshow__title heading h1">CHỈ DẪN NẤU ĂN</h2>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </section>

        </div>

        <!-- end slider-->
        <!-- list sản phẩm-->
        <div id="shopify-section-item" class="shopify-section">
            <section class="section" data-section-id="" data-section-type="featured-collection">
                <div class="container">
                    <header class="section__header">
                        <div class="section__header-stack">
                            <h2 class="section__title heading h3">TOP SẢN PHẨM </h2>

                        </div>
                        <a href="@Url.Action("Index","ListFood")" class="section__action-link link">View all</a>
                    </header>
                </div>
                <!-- sản phẩm-->
                <div class="container ">
                    <div class="scroller">
                      <div class="scroller__inner">
                        <div class="flickity-viewport" style="height: 500px; touch-action: pan-y;">
                          <div class="product-list product-list--vertical product-list--scrollable flickity-enabled" tabindex="0">

                            @foreach (var item in Model.ToList())
                            {
                          <div>
                            <div>


                              <div class="product-item product-item--vertical 1/4--lap 1/5--desk 1/6--wide is-selected" style=" left:20%;">
                                <a href="@Url.Action("Index","Food",new { id = item.IdFood })" class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                                  <div class="aspect-ratio " style="height: 133px; width: 133px; padding-bottom: 100.0%">
                                    <img class="product-item__primary-image image--fade-in lazyautosizes lazyloaded" src="@item.LinkHinhAnh" />
                                  </div>
                                </a><div class="product-item__info">
                                      <div class="product-item__info-inner">
                                        @*<a class="product-item__vendor link" href="/collections/vendors?q=HARRYS">HARRYS</a>*@
                                        <a href="@Url.Action("Index","Food",new { id = item.IdFood })" class="product-item__title text--strong link">@item.NameFood</a>
                                        <div class="product-item__price-list price-list">
                                          @if (list1.FirstOrDefault(p => p.IdKhuyenMai == item.IdKhuyenMai) != null)
                                          {
                                            var sale = item.Price * (100 - list1.FirstOrDefault(p => p.IdKhuyenMai == item.IdKhuyenMai).PhanTramKhuyenMai) / 100;
                                      <span class="price price--highlight">
                                        <span class="visually-hidden">Giá sale</span>@sale₫
                                      </span>
                                                <span class="price price--compare">
                                                  <span class="visually-hidden">Giá gốc</span>@item.Price₫
                                                </span> }
                                              else
                                              {
                                      <span class="price price--highlight">
                                        <span class="visually-hidden">Giá gốc</span>@item.Price₫
                                      </span>}

                                        </div>

                                        @if (list0.FindAll(p => p.IdFood == item.IdFood).FirstOrDefault(p => p.SoLuong > 0) != null)
                                        {
                                      @using Microsoft.AspNetCore.Http.Extensions;
                                                <form method="get" action="../GioHang/ThemGioHang" id="product_form_id_6806124495026_1624509122e13fa354" accept-charset="UTF-8" class="product-item__action-list button-stack" enctype="multipart/form-data">
                                                  <input type="hidden" name="IdFood" value="@item.IdFood">
                                                  <input type="hidden" name="strURL" value="@Context.Request.GetDisplayUrl()">
                                                  <button type="submit" class="product-item__action-button button button--small button--primary" data-action="add-to-cart">Thêm vào giỏ</button>
                                                </form> }
                                              else
                                              {
                                              <form method="get" accept-charset="UTF-8" class="product-item__action-list button-stack" enctype="multipart/form-data">                               
                                                <button class="product-item__action-button button button--small button--disabled" disabled="" style="cursor: not-allowed;">Hết hàng</button>
                                              </form>
                                              }

                                      </div>

                                </div>
                              </div>
                            </div>
                          </div>}
                          </div>
                          </div>
                        </div>
                      </div>

                </div>
                <!-- end sản phẩm-->
            </section>
        </div>
        <!-- end list sản phẩm-->
    </main>

</body>


<?php
  include_once("./app_env/resources/views/layout/footeruser.blade.php");
?>



