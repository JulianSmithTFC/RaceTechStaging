<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($item['secondLevel'] as $secondLevelItem) { ?>
        <li class="my-headerMobile-dropdown-subnav-li-two">
            <?php if(!empty($secondLevelItem['thirdLevel'])){ ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($secondLevelItem['object'] == 'product_cat'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-two" href="<?php echo get_category_link( (int)$secondLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$secondLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($secondLevelItem['object'] == 'custom'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-two" href="<?php echo $secondLevelItem['url']; ?>">
                                    <?php echo $secondLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>">
                                    <i class="fas fa-plus my-headerMobile-dropdown-icons"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-two">

                    <?php
                    require('third-menu.php');
                    ?>

                </div>


            <?php }else{ ?>
                <?php if($secondLevelItem['object'] == 'product_cat'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-two" href="<?php echo get_category_link( (int)$secondLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$secondLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($secondLevelItem['object'] == 'custom'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-two" href="<?php echo $secondLevelItem['url']; ?>">
                        <?php echo $secondLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>