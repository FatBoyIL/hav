<div>
    <div class="row mb">
        <div class="boxleft mr">
            <div class="row mb">
                <div class="boxtitle">
                  <?=$tendm?>
                
                </div>
                <div class="row boxcontent">
                <div class="row">
                    <?php
                        $i=0;
                        foreach ($dssp as $sp) {
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
                                    <p>' . $price . ' $</p>
                                    <a href="'.$linksp.'">' . $title . '</a>
                                </div>';
                                $i += 1;
                                # code...
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
    </div>
</div>