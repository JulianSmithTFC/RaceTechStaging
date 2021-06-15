<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($secondLevelItem['forthLevel'] as $thirdLevelItem) { ?>
        <li class="my-headerMobile-dropdown-subnav-li-three">
            <?php if(!empty($thirdLevelItem['fifthLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($thirdLevelItem['object'] == 'product_cat'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-three" href="<?php echo get_category_link( (int)$thirdLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$thirdLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($thirdLevelItem['object'] == 'custom'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-three" href="<?php echo $thirdLevelItem['url']; ?>">
                                    <?php echo $thirdLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <?php if(($thirdLevelItem['object'] == 'product_cat') && (in_array($thirdLevelItem['object_id'], $ancestor_cats)) && ($thirdLevelItem['type'] != 'full-menu')){ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>" role="button" aria-expanded="true" aria-controls="ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>">
                                        <i class="fas fa-minus my-headerMobile-dropdown-icons" id="icon-<?php echo $thirdLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php }else{ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>">
                                        <i class="fas fa-plus my-headerMobile-dropdown-icons" id="icon-<?php echo $thirdLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php if(($thirdLevelItem['object'] == 'product_cat') && (in_array($thirdLevelItem['object_id'], $ancestor_cats)) && ($thirdLevelItem['type'] != 'full-menu')){ ?>
                    <div id="ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>" class="collapse show my-headerMobile-dropdown-subnav-container-three">
                        <?php require('four-menu.php'); ?>
                    </div>
                <?php }else{ ?>
                    <div id="ham-nav-dropdown-<?php echo $thirdLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-three">
                        <?php require('four-menu.php'); ?>
                    </div>
                <?php } ?>

            <?php }else{ ?>
                <?php if($thirdLevelItem['object'] == 'product_cat'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-three" href="<?php echo get_category_link( (int)$thirdLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$thirdLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($thirdLevelItem['object'] == 'custom'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-three" href="<?php echo $thirdLevelItem['url']; ?>">
                         <?php echo $thirdLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>