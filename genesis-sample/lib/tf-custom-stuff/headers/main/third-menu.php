<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($secondLevelItem['thirdLevel'] as $thirdLevelItem) { ?>
        <li class="my-headerMobile-dropdown-subnav-li-three">
            <?php if(!empty($thirdLevelItem['forthLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($thirdLevelItem['object'] == 'product_cat'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-three" href="<?php echo get_category_link( (int)$thirdLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$thirdLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($thirdLevelItem['object'] == 'custom'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-three" href="<?php echo $thirdLevelItem['url']; ?>">
                                    <?php echo $thirdLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>">
                                    <i class="fas fa-plus my-headerMobile-dropdown-icons"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-three">

                    <?php
                    require('four-menu.php');
                    ?>

                </div>
            <?php }else{ ?>
                <?php if($thirdLevelItem['object'] == 'product_cat'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-three" href="<?php echo get_category_link( (int)$thirdLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$thirdLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($thirdLevelItem['object'] == 'custom'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-three" href="<?php echo $thirdLevelItem['url']; ?>">
                         <?php echo $thirdLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>