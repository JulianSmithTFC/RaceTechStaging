<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($forthLevelItem['fifthLevel'] as $fifthLevelItem) { ?>
        <li class="nav-item my-headerMobile-dropdown-subnav-li-five">
            <?php if(!empty($fifthLevelItem['sixthLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($fifthLevelItem['object'] == 'product_cat'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-five" href="<?php echo get_category_link( (int)$fifthLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$fifthLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($fifthLevelItem['object'] == 'custom'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-five" href="<?php echo $fifthLevelItem['url']; ?>">
                                    <?php echo $fifthLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>">
                                    <i class="fas fa-plus my-headerMobile-dropdown-icons"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ham-nav-dropdown-<?php echo $fifthLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-five">

                    <?php
                    require('sixth-menu.php');
                    ?>

                </div>


            <?php }else{ ?>
                <?php if($fifthLevelItem['object'] == 'product_cat'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-five" href="<?php echo get_category_link( (int)$fifthLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$fifthLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($fifthLevelItem['object'] == 'custom'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-five" href="<?php echo $fifthLevelItem['url']; ?>">
                        <?php echo $fifthLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>