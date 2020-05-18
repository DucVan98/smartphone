@extends('layout')
@section('content')
<section class="product-content">
    <h1 class="title">
        <span>
            Sản phẩm
        </span>
    </h1>
    <nav class="product-filter clearfix">
        <ul class="display">
            <li id="grid" class="active grid"><a href="#" title="Grid"><i class="fa fa-th-large"></i></a></li>
            <li id="list" class="list"><a href="#" title="List"><i class="fa fa-th-list"></i></a></li>
        </ul>
        <div class="limit">
            <span>Sản phẩm/trang</span>
            <select id="lblimit" name="lblimit" class="nb_item" onchange="window.location.href = this.options[this.selectedIndex].value">
                <option value="?limit=10">10</option>
                <option selected="selected" value="?limit=12">12</option>
                <option value="?limit=20">20</option>
                <option value="?limit=50">50</option>
                <option value="?limit=100">100</option>
                <option value="?limit=250">250</option>
                <option value="?limit=500">500</option>
            </select>
        </div>
        <div class="sort">
            <span>Sắp xếp</span>
            <select class="selectProductSort" id="lbsort" onchange="window.location.href = this.options[this.selectedIndex].value">
                <option selected="selected" value="?sort=index&amp;order=asc">Mặc định</option>
                <option value="?sort=price&amp;order=asc">Gi&#225; tăng dần</option>
                <option value="?sort=price&amp;order=desc">Gi&#225; giảm dần</option>
                <option value="?sort=name&amp;order=asc">T&#234;n sản phẩm: A to Z</option>
                <option value="?sort=name&amp;order=desc">T&#234;n sản phẩm: Z to A</option>
            </select>
        </div>
    </nav>
    <div class="product-block clearfix">
        <div class="product-list row">
            <div class="col-md-2 col-sm-2 col-xs-12 product-resize product-item-box">
                <div class="product-item wow pulse">
                    <div class="image image-resize">
                        <a href="san-pham/nokia-asha-206---2-sim-(cty).html" title="NOKIA ASHA 206 - 2 SIM (CTY)">
                            <img src="upload/shop96/images/product/32a5b0cf-2129-4167-b5d8-aeeb62bc5a91.jpg" data-original="/upload/shop96/images/product/32a5b0cf-2129-4167-b5d8-aeeb62bc5a91.jpg" alt="NOKIA ASHA 206 - 2 SIM (CTY)" class="img-responsive lazy-img" />
                        </a>
                        <span class="promotion">-0%</span>
                    </div>
                    <div class="right-block">
                        <h2 class="name">
                            <a href="san-pham/nokia-asha-206---2-sim-(cty).html" title="NOKIA ASHA 206 - 2 SIM (CTY)">NOKIA ASHA 206 - 2 SIM (CTY)</a>
                        </h2>
                        <div class="rating">
                            <div class="rating-1">
                                <span class="rating-img">
                                </span>
                            </div>
                        </div>
                        <div class="price">
                            <span class="price-new">1.369.000&nbsp;₫</span>
                            <span class="price-old">1.369.000&nbsp;₫</span>
                        </div>
                        <div class="action">
                            <a class="btn-add-cart" href="javascript:void(0)" onclick="AddToCard(706,1)">Mua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 product-resize product-item-box">
                <div class="product-item wow pulse">
                    <div class="image image-resize">
                        <a href="san-pham/nokia-130---2-sim-(cty).html" title="NOKIA 130 - 2 SIM (CTY)">
                            <img src="Uploads/shop96/images/product/12e2d532-0b7d-4078-93b4-e64b8dc95acf.jpg" data-original="/Uploads/shop96/images/product/12e2d532-0b7d-4078-93b4-e64b8dc95acf.jpg" alt="NOKIA 130 - 2 SIM (CTY)" class="img-responsive lazy-img" />
                        </a>
                        <span class="promotion">-0%</span>
                    </div>
                    <div class="right-block">
                        <h2 class="name">
                            <a href="san-pham/nokia-130---2-sim-(cty).html" title="NOKIA 130 - 2 SIM (CTY)">NOKIA 130 - 2 SIM (CTY)</a>
                        </h2>
                        <div class="rating">
                            <div class="rating-1">
                                <span class="rating-img">
                                </span>
                            </div>
                        </div>
                        <div class="price">
                            <span class="price-new">500.000&nbsp;₫</span>
                            <span class="price-old">500.000&nbsp;₫</span>
                        </div>
                        <div class="action">
                            <a class="btn-add-cart" href="javascript:void(0)" onclick="AddToCard(707,1)">Mua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="navigation">
            <ul class="pagination">
                <li>
                    <a href="index2679.html?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                        <li class="active"><a href="index2679.html?page=1">1</a></li>
                        <li><a href="index4658.html?page=2">2</a></li>
                        <li><a href="index9ba9.html?page=3">3</a></li>
                <li>
                    <a href="index9ba9.html?page=3" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div> -->
</section>
@endsection