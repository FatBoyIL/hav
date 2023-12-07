
<div class="row formtitle">
    <h1>DANH SÁCH LOẠI SIZE</h1>
</div>

<div class="row formcontent">
    <div class="row mb10 formdssp">
    <form action="index.php?act=listsize" method="post">
        <table>
            <tr>
                <th></th>
                <th>STT</th>
                <th>TÊN SIZE</th>
                <th></th>
            </tr>

            <?php
            $i = 0;
            foreach ($listsize as $size) {
                extract($size);
                $suasize = "index.php?act=suasize&id=" . $id;
                $xoasize = "index.php?act=xoasize&id=" . $id;
            ?>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $size_name; ?></td>
                    <td>
                        <a href="<?php echo $suasize; ?>"><input type="button" value="Sửa"></a>
                        <a href="<?php echo $xoasize; ?>"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
    </div>

    <div class="row mb10">
        <input type="button" value="CHỌN TẤT CẢ">
        <input type="button" value="BỎ CHỌN TẤT CẢ">
        <input type="button" value="XÓA MỤC ĐÃ CHỌN">
        <a href="index.php?act=addsize"><input type="button" value="NHẬP THÊM"></a>
    </div>
</div>
</div>
