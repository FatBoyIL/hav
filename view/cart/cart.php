<?php
if (!isset($_SESSION)) session_start();
$cart = $_SESSION['cart'] ?? [];
?>

<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="boxtitle">
                Thông tin Giỏ Hàng
            </div>
            <div class="row boxcontent giohang-custom-table">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>Màu</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $totalAmount = 0; // Initialize total amount
                        $index = 0; // Initialize the index


                        foreach ($cart as $info) {
                           
                            $xoasp='<a href="index.php?act=delcart&idcart='.$index.'"> <input type="button" value="xoa"></a>';
                            // Check if the required keys exist in the $info array
                            $product_name = isset($info['product_name']) ? $info['product_name'] : '';
                            $size_id = isset($info['size_id']) ? $info['size_id'] : '';
                            $color_id = isset($info['color_id']) ? $info['color_id'] : '';
                            $qty = isset($info['qty']) ? $info['qty'] : '';

                            // Calculate the total price for the current item
                            $subtotal = $qty * $info['price'];
                            $totalAmount += $subtotal;

                            // Output the table row for the current item
                            echo '<tr>';
                            echo '<td>' . $index+1 . '</td>';
                            echo '<td>' . $product_name . '</td>';
                            echo '<td>' . $size_id . '</td>';
                            echo '<td>' . $color_id . '</td>';
                            echo '<td>' . $qty . '</td>';
                            echo '<td>$' . number_format($info['price'], 0) . '</td>';
                            echo '<td>$' . number_format($subtotal, 0) . '</td>';
                            echo '<td>'.$xoasp.'</td>';
                            echo '</tr>';

                            $index++; // Increment the index
                        }
                        ?>
                        
                    </tbody>
                </table>

                <div class="custom-total">
                    <strong>Tổng Tiền: $<?php echo number_format($totalAmount, 0); ?></strong>
                </div>
            </div>
        </div>
    </div>

    <div class="boxright">
        <?php include "view/boxright.php"; ?>
    </div>
</div>
