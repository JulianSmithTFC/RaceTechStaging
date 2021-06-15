<ul class="nav flex-column my-headerMobile-dropdown-subnav-ul">
    <?php foreach ($thirdLevelItem['forthLevel'] as $forthLevelItem) { ?>
        <li class="nav-item my-headerMobile-dropdown-subnav-li-four">
            <?php if(!empty($forthLevelItem['fifthLevel'])){ ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-9">
                            <?php if($forthLevelItem['object'] == 'product_cat'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-four" href="<?php echo get_category_link( (int)$forthLevelItem['object_id'] ); ?>">
                                    <?php echo get_term( (int)$forthLevelItem['object_id'] )->name; ?>
                                </a>
                            <?php }elseif ($forthLevelItem['object'] == 'custom'){ ?>
                                <a class="nav-link my-headerMobile-dropdown-subnav-li-four" href="<?php echo $forthLevelItem['url']; ?>">
                                    <?php echo $forthLevelItem['name']; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <a class="btn my-headerMobile-dropdown-iconLinks" onclick="subcatIconChange(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>">
                                    <i class="fas fa-plus my-headerMobile-dropdown-icons"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ham-nav-dropdown-<?php echo $forthLevelItem['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container-four">

                    <?php
                    require('fifth-menu.php');
                    ?>

                </div>


            <?php }else{ ?>
                <?php if($forthLevelItem['object'] == 'product_cat'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-four" href="<?php echo get_category_link( (int)$forthLevelItem['object_id'] ); ?>">
                        <?php echo get_term( (int)$forthLevelItem['object_id'] )->name; ?>
                    </a>
                <?php }elseif ($forthLevelItem['object'] == 'custom'){ ?>
                    <a class="nav-link my-headerMobile-dropdown-subnav-li-four" href="<?php echo $forthLevelItem['url']; ?>">
                        <?php echo $forthLevelItem['name']; ?>
                    </a>
                <?php } ?>

            <?php } ?>
        </li>
    <?php } ?>
</ul>