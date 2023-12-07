<div>
    <div class="row mb  ">
        <div class="boxleft mr ">
            <div class="row mb">
                <div class="baner">
                    <!-- Slideshow container -->
                    <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides fade">
                            <!-- <div class="numbertext">1 / 3</div> -->
                            <img src="./accest/image/banner2.jpg" style="width:100%">
                            <!-- <div class="text">Caption Text</div> -->
                        </div>

                        <div class="mySlides fade">
                            <!-- <div class="numbertext">2 / 3</div> -->
                            <img src="./accest/image/banner2.jpg" style="width:100%">
                            <!-- <div class="text">Caption Two</div> -->
                        </div>

                        <div class="mySlides fade">
                            <!-- <div class="numbertext">3 / 3</div> -->
                            <img src="./accest/image/banner3.jpg" style="width:100%">
                            <!-- <div class="text">Caption Three</div> -->
                        </div>

                        <!-- Next and previous buttons -->
                        <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
                    </div>
                    <br>

                    <!-- The dots/circles -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>

                </div>
            </div>
            <div class="row">
                <?php
                $i = 0;
                foreach ($spnew as $sp) {
                    extract($sp);
                    $linksp="index.php?act=variant&id=".$product_id;
                    $hinh = $img_path . $thumbnail;
                    if (($i == 2) || ($i == 5) || ($i == 8)) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }
                    echo '<div class="boxgiay ' . $mr . '">
                        <div class="row img">
                        <a href="'.$linksp.'">  <img src="' . $hinh . '" alt=""></a>
                          
                        </div>
                        <p class="price">' . $price . ' $</p>
                        <a href="'.$linksp.'">' . $title . '</a>
                    </div>';
                    $i += 1;
                    # code...
                }
                ?>
            </div>
        </div>

        <div class="boxright ">
        <?php
        include "boxright.php"
        ?>
        </div>
    </div>

</div>