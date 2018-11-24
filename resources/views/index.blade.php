@extends('layouts/main')

@section('content')

    <!-- Slider -->


    <div class="main_slider" style="background-image:url({{ asset('assets/images/slider_1.jpg')}})">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>Welcome to AvaShop</h6>
                        <h1>รองเท้า กระเป๋า อยากได้อะไรหาได้ที่ี่นี่</h1>
                        <div class="red_button shop_now_button"><a href="#">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>สินค้ามาใหม่</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                                data-filter="*">all
                            </li>
                            @foreach($categoryMenu as $menu)
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                    data-filter=".{{ $menu->id }}">{{ $menu->category_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid"
                         data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        @foreach($products as $product)
                            <a href="/product/{{$product->slug}}">
                                <div class="product-item {{$product->category_id}} ">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        {!! $product->thumbs !!}
                                    </div>

                                    <div class="product_info">
                                        <h6 class="product_name"><a
                                                    href="/product/{{$product->slug}}">{{ $product->product_name }}</a>
                                        </h6>

                                        <div class="product_price">{{ number_format($product->product_price) }} Bath<span>{{ number_format($product->original_price ) }}
                                                Bath</span></div>

                                        <input type="number" class="quantity" id="quantity" name="quantity" value="1"
                                               style="width: 50px; margin-right: 10px;">
                                    </div>
                                </div>
                                <div class="add_to_cart_button red_button"><a
                                            href="{{ route('basket.create', ['id' => $product->id]) }}">add to cart</a>
                                </div>
                            </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>


    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>จัดส่งฟรี</h6>
                            <p>จะใกล้หรือไกลเราส่งให้ฟรี</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>จ่ายเงินสดตอนรับสินค้า</h6>
                            <p>ไม่มีบัตร ไม่ต้องห่วงเงินสดช่วยได้</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>ส่งสินค้าคืนได้ภายใน 7 วัน</h6>
                            <p>สินค้าไม่ตรงตามต้องการเปลี่ยนสินค้าได้</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>เปิดร้านกันทั้งวันทั้งคืน</h6>
                            <p>เซเว่นให้ 24 เราให้ 25 ชม.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')


    <script>

        $('.add_to_cart_button').find('a').click(function (event) {
            event.preventDefault();
            var quantity = $(this).parent().prev().find('input').val();
            $.ajax({
                type: "POST",
                url: $(this).attr('href'),
                data: {quantity: quantity}
                , success: function (data) {
                    console.log(data);
                    $('#checkout_items').html(data.cartCount);
                }
            });
            return false; //for good measure
        });
    </script>

@endsection
