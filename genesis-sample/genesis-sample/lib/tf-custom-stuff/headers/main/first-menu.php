<ul class="nav flex-column my-headerMobile-dropdown-nav">
    <?php foreach ($parentArray as $item){ ?>
        <?php if (!empty($item['secondLevel'])){ ?>
            <li class="nav-item my-headerMobile-dropdown-li">

                <div class="container-fluid my-headerMobile-dropdown-containers">
                    <div class="row my-headerMobile-dropdown-rows">
                        <div class=" col-9">
                            <div class="my-headerMobile-dropdown-innerContainers">
                                <?php if($item['object'] == 'product_cat'){ ?>
                                    <a class="nav-link text-uppercase my-headerMobile-dropdown-links" href="<?php echo get_category_link( (int)$item['object_id'] ); ?>"><?php echo get_term( (int)$item['object_id'] )->name; ?></a>
                                <?php }elseif ($item['object'] == 'custom'){ ?>
                                    <a class="nav-link text-uppercase my-headerMobile-dropdown-links" href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class=" col-3">
                            <div class="my-headerMobile-dropdown-innerContainers" align="right">
                                <a class="btn my-headerMobile-dropdown-iconLinks" onclick="topLevelMenuDrop(this)" type="button" data-toggle="collapse" href="#ham-nav-dropdown-<?php echo $item['ID'] ?>" role="button" aria-expanded="false" aria-controls="ham-nav-dropdown-<?php echo $item['ID'] ?>">
                                    <i class="fas fa-plus my-headerMobile-dropdown-icons" id="icon-<?php echo $item['ID'] ?>"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ham-nav-dropdown-<?php echo $item['ID'] ?>" class="collapse my-headerMobile-dropdown-subnav-container">

                    <?php
                    require('second-menu.php');
                    ?>

                </div>
            </li>
        <?php }else{ ?>
            <li class="nav-item my-headerMobile-dropdown-li">
                <?php if($item['object'] == 'product_cat'){ ?>
                    <a class="nav-link text-uppercase my-headerMobile-dropdown-links" href="<?php echo get_category_link( (int)$item['object_id'] ); ?>"><?php echo get_term( (int)$item['object_id'] )->name; ?></a>
                <?php }elseif ($item['object'] == 'custom'){ ?>
                    <a class="nav-link text-uppercase my-headerMobile-dropdown-links"  href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
                <?php } ?>
            </li>
        <?php } ?>
    <?php } ?>
</ul>


<script>
    function topLevelMenuDrop(toggleButton){
        $(toggleButton).find('i').toggleClass('fa-plus fa-minus');
    }

    function subcatIconChange(toggleButton){
        $(toggleButton).find('i').toggleClass('fa-plus fa-minus');
    }
</script>