<div class="row formtitle">
                <h1>DANH SÁCH LOẠI SIZE</h1>
        </div>
        <div class="row formcontent">
        <form action="index.php?act=listcolor" method="post">
            <div class="row mb10 formdssp">
           
                <table>
                    <tr>
                        <th></th>
                        <th>STT</th>
                        <th>TÊN COLOR</th>
                        <th></th>
                    </tr>
                    <?php
                    $i=0;
                        foreach ($listcolor as $color){
                            extract($color);
                            $suacolor="index.php?act=suacolor&id=".$id;
                            $xoacolor="index.php?act=xoacolor&id=".$id;
                            echo' <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.($i=$i+1).'</td>
                            <td>'.$color_name.'</td>
                            <td>
                                <a  href="'.$suacolor.'"   ><input type="button" value="Sửa"></a>
                                <a  href="'.$xoacolor.'" ><input type="button" value="Xóa"></a> 
                            </td>
                        </tr>';
                        } 
                    ?>
                </table>
            </div>

            <div class="row mb10">
                <input type="button" value="CHỌN TẤT CẢ">
                <input type="button" value="BỎ CHỌN TẤT CẢ">
                <input type="button" value="XÓA MỤC ĐÃ CHỌN">
                <a href="index.php?act=addcolor"><input type="button" value="NHẬP THÊM"></a>
            </div>
        </from>
    </div>
</div>
