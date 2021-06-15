<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($item['thirdLevel'] as $secondLevelItem) { ?>
        <li class="my-headerMobile-dropdown-subnav-li-two">
            <?php if(!empty($secondLevelItem['forthLevel'])){ ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($secondLevelItem['object'] == 'product_cat'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-two" href="<?php echo get_category_link( (int)$secondLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$secondLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($secondLevelItem['object'] == 'custom'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-two" href="<?php echo $secondLevelItem['url']; ?>">
                                    <?php echo $secondLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <?php if(($secondLevelItem['object'] == 'product_cat') && (in_array($secondLevelItem['object_id'], $ancestor_cats)) && ($secondLevelItem['type'] != 'full-menu')){ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>" role="button" aria-expanded="true" aria-controls="ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>">
                                        <i class="fas fa-minus my-headerMobile-dropdown-icons" id="icon-<?php echo $secondLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php }else{ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>">
                                        <i class="fas fa-plus my-headerMobile-dropdown-icons" id="icon-<?php echo $secondLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(($secondLevelItem['object'] == 'product_cat') && (in_array($secondLevelItem['object_id'], $ancestor_cats)) && ($secondLevelItem['type'] != 'full-menu')){ ?>
                    <div id="ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>" class="collapse show my-headerMobile-dropdown-subnav-container-two">
                        <?php require('third-menu.php'); ?>
                    </div>
                <?php }else{ ?>
                    <div id="ham-nav-dropdown-<?php echo $secondLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-two">
                        <?php require('third-menu.php'); ?>
                    </div>
                <?php } ?>

            <?php }else{ ?>
                <?php if($secondLevelItem['object'] == 'product_cat'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-two" href="<?php echo get_category_link( (int)$secondLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$secondLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($secondLevelItem['object'] == 'custom'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-two" href="<?php echo $secondLevelItem['url']; ?>">
                        <?php echo $secondLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>