<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($thirdLevelItem['fifthLevel'] as $forthLevelItem) { ?>
        <li class="nav-item my-headerMobile-dropdown-subnav-li-four">
            <?php if(!empty($forthLevelItem['sixthLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($forthLevelItem['object'] == 'product_cat'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-four" href="<?php echo get_category_link( (int)$forthLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$forthLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($forthLevelItem['object'] == 'custom'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-four" href="<?php echo $forthLevelItem['url']; ?>">
                                    <?php echo $forthLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <?php if(($forthLevelItem['object'] == 'product_cat') && (in_array($forthLevelItem['object_id'], $ancestor_cats)) && ($forthLevelItem['type'] != 'full-menu')){ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>" role="button" aria-expanded="true" aria-controls="ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>">
                                        <i class="fas fa-minus my-headerMobile-dropdown-icons" id="icon-<?php echo $forthLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php }else{ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>">
                                        <i class="fas fa-plus my-headerMobile-dropdown-icons" id="icon-<?php echo $forthLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php if(($forthLevelItem['object'] == 'product_cat') && (in_array($forthLevelItem['object_id'], $ancestor_cats)) && ($forthLevelItem['type'] != 'full-menu')){ ?>
                    <div id="ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>" class="collapse show my-headerMobile-dropdown-subnav-container-four">
                        <?php require('fifth-menu.php'); ?>
                    </div>
                <?php }else{ ?>
                    <div id="ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-four">
                        <?php require('fifth-menu.php'); ?>
                    </div>
                <?php } ?>


            <?php }else{ ?>
                <?php if($forthLevelItem['object'] == 'product_cat'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-four" href="<?php echo get_category_link( (int)$forthLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$forthLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($forthLevelItem['object'] == 'custom'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-four" href="<?php echo $forthLevelItem['url']; ?>">
                        <?php echo $forthLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>