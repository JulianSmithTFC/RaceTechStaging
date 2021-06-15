<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($sixthLevelItem['seventhLevel'] as $seventhLevelItem) { ?>
        <li class="nav-item my-headerMobile-dropdown-subnav-li-seven">
            <?php if(!empty($seventhLevelItem['seventhLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($seventhLevelItem['object'] == 'product_cat'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-seven" href="<?php echo get_category_link( (int)$seventhLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$seventhLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($seventhLevelItem['object'] == 'custom'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-seven" href="<?php echo $seventhLevelItem['url']; ?>">
                                    <?php echo $seventhLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $seventhLevelItem['ID'] ?>">
                                    <i class="fas fa-plus my-headerMobile-dropdown-icons"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }else{ ?>
                <?php if($seventhLevelItem['object'] == 'product_cat'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-seven" href="<?php echo get_category_link( (int)$seventhLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$seventhLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($seventhLevelItem['object'] == 'custom'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-seven" href="<?php echo $seventhLevelItem['url']; ?>">
                        <?php echo $seventhLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>