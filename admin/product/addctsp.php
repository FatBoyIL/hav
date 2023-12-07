<div class="row formtitle">
    <h1>THÊM MỚI SIZE GIÀY </h1>
</div>
<div class="row formcontent">
    <form action="index.php?act=addctsp" method="post" enctype="multipart/form-data">
        <div class="row mb10">
            <h1 style="color:red">Giày -<h1>  <br>

        </div>
        <div class="row mb10">
        variant_id <br>
            <input type="text" name="variant_id">
        </div>
        <div class="row mb10">
        product_id <br>
            <input type="text" name="product_id">
        </div>
        <div class="row mb10">
        size_id <br>
        <input type="text" name="size_id">
        </div>
        <div class="row mb10">
        color_id <br>
        <input type="text" name="color_id">
        </div>
        <div class="row mb10">
        stock_quantity <br>
            <input type="text" name="stock_quantity">
        </div>
        <div class="row mb10">
            <input type="submit" name="add" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            <a href="index.php?act=dsctsp"><input type="button" value="DANH SÁCH CTSP"></a>
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != ""))
            echo $thongbao;
        ?>
    </form>
</div>
</div>