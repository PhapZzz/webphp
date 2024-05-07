

<?php foreach ($data['css_files'] as $css_file): ?>
            <link rel="stylesheet" href="<?= $css_file ?>">
        <?php endforeach; ?>
        
        <!-- <?php if (isset($js_files)): ?> -->
            <?php foreach ($data['js_files'] as $js_file): ?>
                <script src="<?= $js_file ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
        <div id="content">
            <div id="div_slider_sale"></div>
            <div id="logo_slider_sale"></div>
            
            <hr id="line_sale">

            <div id="div_sale">
                <h1 id="title_sale">#SINGEDsale</h1>
                <h2 id="sub_sale">Sale up to 50% </h2>
            </div>

            <div id="list_product_sale">
                <?php foreach ($dataSale['sale'] as $product): ?>
                <div class="product">
                    <a href="http://localhost:8008/PHP/index.php?controller=product&action=product&idProduct=<?php echo $product->getIdProduct(); ?>&idStyle=<?php echo $product->getIdStyle();?>">
                            <div class="img_product" style="background-image: url(./assets/product/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getNameProduct(); ?>)"> </div>
                    </a>
                    <div class="infor_product">
                        <a class="name_product"><?php echo $product->getNameProduct(); ?></a>
                        <div class="div_price">
                            <a class="price"><?php echo number_format($product->getPrice()); ?>đ</a>
                            <a class="old_price"><?php echo number_format($product->getOldPrice()); ?>đ</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>  

            <div class="pagination">
                <a href="<?php echo ($currentPage > 1) ? 'http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=' . ($currentPage - 1) : '#'; ?>">&laquo;</a>
                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    <a id="<?php echo $i;?>" href="http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
                <a href="<?php echo ($currentPage < $totalPage) ? 'http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=' . ($currentPage + 1) : '#'; ?>">&raquo;</a>
            </div>


        </div>
    