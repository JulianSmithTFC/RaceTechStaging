<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($forthLevelItem['sixthLevel'] as $fifthLevelItem) { ?>
        <li class="nav-item my-headerMobile-dropdown-subnav-li-five">
            <?php if(!empty($fifthLevelItem['seventhLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($fifthLevelItem['object'] == 'product_cat'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-five" href="<?php echo get_category_link( (int)$fifthLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$fifthLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($fifthLevelItem['object'] == 'custom'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-five" href="<?php echo $fifthLevelItem['url']; ?>">
                                    <?php echo $fifthLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <?php if(($fifthLevelItem['object'] == 'product_cat') && (in_array($fifthLevelItem['object_id'], $ancestor_cats)) && ($fifthLevelItem['type'] != 'full-menu')){ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>" role="button" aria-expanded="true" aria-controls="ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>">
                                        <i class="fas fa-minus my-headerMobile-dropdown-icons" id="icon-<?php echo $fifthLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php }else{ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>">
                                        <i class="fas fa-plus my-headerMobile-dropdown-icons" id="icon-<?php echo $fifthLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php if(($fifthLevelItem['object'] == 'product_cat') && (in_array($fifthLevelItem['object_id'], $ancestor_cats)) && ($fifthLevelItem['type'] != 'full-menu')){ ?>
                    <div id="ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>" class="collapse show my-headerMobile-dropdown-subnav-container-five">
                        <?php require('sixth-menu.php'); ?>
                    </div>
                <?php }else{ ?>
                    <div id="ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-five">
                        <?php require('sixth-menu.php'); ?>
                    </div>
                <?php } ?>


            <?php }else{ ?>
                <?php if($fifthLevelItem['object'] == 'product_cat'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-five" href="<?php echo get_category_link( (int)$fifthLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$fifthLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($fifthLevelItem['object'] == 'custom'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-five" href="<?php echo $fifthLevelItem['url']; ?>">
                        <?php echo $fifthLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>