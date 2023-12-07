<div class="row mb ">
                <div class="boxtitle">
                    TÀI KHOẢN
                </div>
                <div class="boxcontent formuser">

                        <?php 
                                if (isset($_SESSION['user'])) {
                        ?>
                        <div class="row mb10">
                           HI <br>
                         
                        </div>
                        <div class="row mb10">
                            
                                    <li>
                                        <a href="index.php?act=edt_taikhoan">Cập nhật tài  khoản</a>
                                    </li>
                                    <li>
                                   <a href="index.php?act=cart">Gio Hang</a>
                                </li>
                                    <li>
                                        <a href="index.php?act=thoat">Thoát</a>
                                    </li>
                                    
                                    
                        </div>
                        <?php 
                           
                            }
                            else {
                            
                            ?>

                
                    <form action="index.php?act=dangnhap" method="post">
                        <div class="row mb10">
                            Tên dăng nhập <br>
                            <input type="text" name="user" id="">
                        </div>
                        <div class="row mb10">
                            Mật khẩu <br>
                            <input type="text" name="pass" id="">
                        </div>
                        <div class="row mb10">
                            <input type="checkbox" name="" id="">Lưu mật khẩu<br>
                        </div>
                        <div class="row mb10">
                            <input type="submit" value="Đăng nhập" name= "dangnhap">
                        </div>
                    </form>





                    <li>
                        <a href="#">Quên mật khẩu</a>
                    </li>
                    <li>
                        <a href="index.php?act=dangky">Đăng kí</a>
                    </li>
                    <li>
                        <a href="index.php?act=cart">Gio Hang</a>
                    </li>
                    <?php 
                        }
                        ?>
                </div>
            </div>
            <div class="row mb ">
                <div class="boxtitle">
                    DANH MỤC
                </div>
                <div class="boxcontent2 menudoc">
                    <ul>
                        <?php
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            $linkdm = "index.php?act=product&category_id=" . $category_id;
                            echo '<li>
                            <a href="' . $linkdm . '">' . $name . '</a>
                        </li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="boxfooter searchbox">
                    <actio action="" method="post">
                        <input type="text" name="" id="">
                        </form>
                </div>
            </div>
            <div class="row mb ">
                <div class="boxtitle">
                    SẢN PHẨM NỖI BẬT
                </div>
                <div class="row boxcontent">
                    <div>
                        <?php
                        foreach ($sp10 as $sp) {
                            extract($sp);
                            $linksp="index.php?act=variant&id=".$product_id;
                            $hinh = $img_path . $thumbnail;
                            echo ' <div class="row mb10 top10">
                            <img src="'.$hinh.'" alt="">
                            <a href="'.$linksp.'">'.$title.'</a>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>