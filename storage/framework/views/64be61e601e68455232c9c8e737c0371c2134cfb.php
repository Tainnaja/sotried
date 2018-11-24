<?php $__env->startSection('content'); ?>

    <!-- Slider -->


    <div class="main_slider" style="background-image:url(<?php echo e(asset('assets/images/slider_1.jpg')); ?>)">
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
                            <?php $__currentLoopData = $categoryMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                    data-filter=".<?php echo e($menu->id); ?>"><?php echo e($menu->category_name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid"
                         data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/product/<?php echo e($product->slug); ?>">
                                <div class="product-item <?php echo e($product->category_id); ?> ">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <?php echo $product->thumbs; ?>

                                    </div>

                                    <div class="product_info">
                                        <h6 class="product_name"><a
                                                    href="/product/<?php echo e($product->slug); ?>"><?php echo e($product->product_name); ?></a>
                                        </h6>

                                        <div class="product_price"><?php echo e(number_format($product->product_price)); ?> Bath<span><?php echo e(number_format($product->original_price )); ?>

                                                Bath</span></div>

                                        <input type="number" class="quantity" id="quantity" name="quantity" value="1"
                                               style="width: 50px; margin-right: 10px;">
                                    </div>
                                </div>
                                <div class="add_to_cart_button red_button"><a
                                            href="<?php echo e(route('basket.create', ['id' => $product->id])); ?>">add to cart</a>
                                </div>
                            </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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


<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>