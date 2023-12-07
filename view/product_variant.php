<div class="row mb">
<form action="" method="post">
    <div class="boxleft mr">
        <div class="row mb">
           
            <?php extract($onesp); ?>
            <div class="boxtitle">
                <?= $title ?>
            </div>
            <div class="row boxcontent">
                <?php
                $hinh = $img_path . $thumbnail;
                echo "<img src='{$hinh}' class='custom-image'>";
                ?>
                <div class="product-info">
                    <h2><?= $title ?></h2><br>
                    <h3><?= $price ?>$</h3>
                    <div class="row color">
                        COLOR<br>
                        <?php
                        $uniqueColors = array();
                    //   echo '<pre>'; print_r($listctsp);echo '</pre>';
                        foreach ($listctsp as $ctsp) {
                            $colorId = $ctsp['color_id'];
                            $colorName = $ctsp['color_name'];
                            if (!in_array($colorId, $uniqueColors)) {
                                echo '<button class="color" data-color="' . $colorId . '"><span>' . $colorName .'-'.$colorId .'</span></button>';
                                $uniqueColors[] = $colorId;
                            }
                        }
                        ?>
                    </div>
                    <div class="row size">
                        SIZE <br>
                        <?php

                        foreach ($listctsp as $ctsp) {
                            echo $ctsp['size_id'].'<button class="size" data-size="' . $ctsp['size_id'] . '"><span>' . $ctsp['size_name'] .'-'.$ctsp['size_id']. '?</span></button>';
                        }
                        ?>
                    </div>
                    <div class="soluong">

                    </div>

                    <button class="buy">Mua</button>
                </div>
            </div>

        </div>
        <div class="row mb">
            <div class="boxtitle">
                DESCTIPTION
            </div>
            <div class="row boxcontent">
                <div class="description">
                    <?= $description ?>
                </div>
            </div>
        </div>
        <div class="row mb">
            <div class="boxtitle">
                YOU MAY LIKE IT
            </div>
            <div class="row boxcontent">
                <div class="row">
                    <?php
                    $i = 0;
                    foreach ($spcl as $spcl) {
                        extract($spcl);
                        $linksp = "index.php?act=variant&id=" . $product_id;
                        $hinh = $img_path . $thumbnail;
                        if (($i == 2) || ($i == 5) || ($i == 8)) {
                            $mr = "";
                        } else {
                            $mr = "mr";
                        }
                        echo '<div class="boxgiay ' . $mr . '">
                                <div class="row img">
                                <a href="' . $linksp . '">  <img src="' . $hinh . '" alt=""></a>
                                </div>
                                <p>' . $price . ' $</p>
                                <a href="' . $linksp . '">' . $title . '</a>
                            </div>';
                        $i += 1;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="boxright">
        <?php
        include "boxright.php";
        ?>
    </div>
</form>
</div>