<div class="row formtitle">
    <h1>CHI TIẾT SẢN PHẨM - <span style="color:red"><?php echo $SAMPHAM['title']; ?></span></h1>
</div>

<div class="row formcontent">
    <form action="index.php?act=listctsp" method="post"></form><br>

    <div class="row mb10 formdssp">
        <table>
            <tr>
                <th></th>
                <th>STT</th>
                <th>SIZE</th>
                <th>MÀU SẮC</th>
                <th>SỐ LƯỢNG</th>
                <th>Chức Năng</th>
            </tr>
            <?php
            $i=0;
            // Check if $lisctsp is set and is an array
            if (isset($lisctsp) && is_array($lisctsp)) {
                foreach ($lisctsp as $variant) {
                    $suactspsp = "index.php?act=suasp&id=" . $variant['product_id'];
                    $xoactspsp = "index.php?act=xoasp&id=" . $variant['product_id'];
                    echo '<tr>
        <td><input type="checkbox" name="" id=""></td>
        <td>' . ($i=$i+1) . '</td>
        <td>' . $variant['size_name'] . '</td>
        <td>' . $variant['color_name'] . '</td>
        <td>' . $variant['stock_quantity'] . '</td>
        <td>
            <a href="' . $suactspsp . '"><input type="button" value="Sửa"></a>
            <a href="' . $xoactspsp . '"><input type="button" value="Xóa"></a> <br>
        </td>
      </tr>';
                }
            }
            ?>
        </table>
    </div>

    <div class="row mb10">
        <input type="button" value="CHỌN TẤT CẢ">
        <input type="button" value="XÓA MỤC ĐÃ CHỌN">
        <a href="index.php?act=addctsp&id=<?php echo $SAMPHAM['product_id']; ?>"><input type="button" value="THÊM MỚI"></a>
    </div>
</div>
</div>