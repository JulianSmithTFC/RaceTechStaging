<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($fifthLevelItem['sixthLevel'] as $sixthLevelItem) { ?>
        <li class="nav-item my-headerMobile-dropdown-subnav-li-six">
            <?php if(!empty($sixthLevelItem['seventhLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($sixthLevelItem['object'] == 'product_cat'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-six" href="<?php echo get_category_link( (int)$sixthLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$sixthLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($sixthLevelItem['object'] == 'custom'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-six" href="<?php echo $sixthLevelItem['url']; ?>">
                                    <?php echo $sixthLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $sixthLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $sixthLevelItem['ID'] ?>">
                                    <i class="fas fa-plus my-headerMobile-dropdown-icons"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ham-nav-dropdown-<?php echo $sixthLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-six">

                    <?php
                    require('seventh-menu.php');
                    ?>

                </div>


            <?php }else{ ?>
                <?php if($sixthLevelItem['object'] == 'product_cat'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-six" href="<?php echo get_category_link( (int)$sixthLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$sixthLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($sixthLevelItem['object'] == 'custom'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-six" href="<?php echo $sixthLevelItem['url']; ?>">
                        <?php echo $sixthLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>