<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($sixthLevelItem['eightLevel'] as $seventhLevelItem) { ?>
        <li class="nav-item my-headerMobile-dropdown-subnav-li-seven">
            <?php if(!empty($seventhLevelItem['ninthLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($seventhLevelItem['object'] == 'product_cat'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-seven" href="<?php echo get_category_link( (int)$seventhLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$seventhLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($seventhLevelItem['object'] == 'custom'){ ?>
                                <a class="my-headerMobile-dropdown-subnav-li-seven" href="<?php echo $seventhLevelItem['url']; ?>">
                                    <?php echo $seventhLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <?php if(($seventhLevelItem['object'] == 'product_cat') && (in_array($seventhLevelItem['object_id'], $ancestor_cats)) && ($seventhLevelItem['type'] != 'full-menu')){ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>" role="button" aria-expanded="true" aria-controls="ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>">
                                        <i class="fas fa-minus my-headerMobile-dropdown-icons" id="icon-<?php echo $seventhLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php }else{ ?>
                                    <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>">
                                        <i class="fas fa-plus my-headerMobile-dropdown-icons" id="icon-<?php echo $seventhLevelItem['ID'] ?>"></i>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php if(($seventhLevelItem['object'] == 'product_cat') && (in_array($seventhLevelItem['object_id'], $ancestor_cats)) && ($seventhLevelItem['type'] != 'full-menu')){ ?>
                    <div id="ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>" class="collapse show my-headerMobile-dropdown-subnav-container-seven">

                    </div>
                <?php }else{ ?>
                    <div id="ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-seven">

                    </div>
                <?php } ?>

            <?php }else{ ?>
                <?php if($seventhLevelItem['object'] == 'product_cat'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-seven" href="<?php echo get_category_link( (int)$seventhLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$seventhLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($seventhLevelItem['object'] == 'custom'){ ?>
                    <a class="my-headerMobile-dropdown-subnav-li-seven" href="<?php echo $seventhLevelItem['url']; ?>">
                        <?php echo $seventhLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>