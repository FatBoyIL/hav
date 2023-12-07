<div>
    <div class="row mb">
        <div class="boxleft mr">
            <div class="row mb">
                <div class="boxtitle">
                   Cập nhật Tài Khoản
                </div>
                <div class="row boxcontent formdangky">
                  <?php 
                          if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                            extract($_SESSION['user']);
                          }
                  
                  ?>
                    <form action="index.php?act=dangky" method="post">
                        <div class="row mb10">
                            Tên đăng nhập <br>
                            <input type="text" name="username" required >
                        </div>
                        <div class="row mb10">
                            Gmail <br>
                            <input type="email" name="email"  required>
                        </div>
                        <div class="row mb10">
                            SDT <br>
                            <input type="text" name="phone"  required>
                        </div>
                        <div class="row mb10">
                            Địa chỉ <br>
                            <input type="text" name="address"   required>
                        </div>
                        <div class="row mb10">
                            Mật khẩu <br>
                            <input type="password" name="password" required>
                        </div>
                        <div class="row mb10">
                            <input type="submit" name="capnhat" value="Cập nhật">
                            <input type="reset" value="Nhập Lại">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="boxright">
           
            <?php
            include "view/boxright.php";
            ?>
        </div>
    </div>
</div>
