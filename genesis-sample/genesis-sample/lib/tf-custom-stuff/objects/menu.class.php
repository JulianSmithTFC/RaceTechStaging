<?php
class RTMenuclass{
    function getCatMenuArray($menu_id){


        $parentArray = array();
        $arrayCount = 0;
        $IntParentArray = array();

        $menuNav = wp_get_nav_menu_items($menu_id);

//echo json_encode($menuNav);

        foreach ($menuNav as $item) {
            if ($item->menu_item_parent == 0) {
                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object,
                    'menu_id' => $menuID
                );
                array_push($parentArray, $itemArray);
            }
        }

        $SecondDownArray = array();
        foreach ($menuNav as $item) {
            if ($item->menu_item_parent == $parentArray[$arrayCount]['ID']) {
                array_push($SecondDownArray, $item->ID);
            }
        }

        foreach ($menuNav as $item) {
            $itemArray = array(
                'ID' => $item->ID,
                'name' => $item->title,
                'url' => $item->url,
                'object_id' => $item->object_id,
                'object' => $item->object
            );
            if ($item->menu_item_parent == $parentArray[$arrayCount]['ID']) {
                $parentArray[$arrayCount]['secondLevel'][$item->ID] = $itemArray;
            }
        }

        $thirdIDArrray = array();
        $thirdArray = array();
        foreach ($menuNav as $item) {
            if (in_array($item->menu_item_parent, $SecondDownArray)) {
                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object
                );

                $thirdItemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'parentID' => $item->menu_item_parent
                );

                $parentArray[$arrayCount]['secondLevel'][$item->menu_item_parent]['thirdLevel'][$item->ID] = $itemArray;
                array_push($thirdIDArrray, $item->ID);
                array_push($thirdArray, $thirdItemArray);
            }
        }

        $forthIDArrray = array();
        $forthArray = array();
        foreach ($menuNav as $item) {
            if (in_array($item->menu_item_parent, $thirdIDArrray)) {
                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object
                );

                foreach ($thirdArray as $child) {
                    if ($child['ID'] == $item->menu_item_parent) {
                        $parentID = $child['parentID'];

                        $forthItemArray = array(
                            'ID' => $item->ID,
                            'secondID' => $parentID,
                            'thirdID' => $item->menu_item_parent
                        );

                        $parentArray[$arrayCount]['secondLevel'][$parentID]['thirdLevel'][$item->menu_item_parent]['forthLevel'][$item->ID] = $itemArray;
                        array_push($forthIDArrray, $item->ID);
                        array_push($forthArray, $forthItemArray);

                    }
                }
            }
        }

        $fithIDArrray = array();
        $fithArray = array();
        foreach ($menuNav as $item) {
            if (in_array($item->menu_item_parent, $forthIDArrray)) {

                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object
                );

                foreach ($forthArray as $child) {
                    if ($child['ID'] == $item->menu_item_parent) {
                        $secondID = $child['secondID'];
                        $thirdID = $child['thirdID'];

                        $fithItemArray = array(
                            'ID' => $item->ID,
                            'secondID' => $secondID,
                            'thirdID' => $thirdID,
                            'forthID' => $item->menu_item_parent
                        );

                        $parentArray[$arrayCount]['secondLevel'][$secondID]['thirdLevel'][$thirdID]['forthLevel'][$item->menu_item_parent]['fifthLevel'][$item->ID] = $itemArray;
                        array_push($fithIDArrray, $item->ID);
                        array_push($fithArray, $fithItemArray);
                    }
                }

            }
        }

        $sixthIDArrray = array();
        $sixthArray = array();
        foreach ($menuNav as $item) {
            if (in_array($item->menu_item_parent, $fithIDArrray)) {

                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object
                );

                foreach ($fithArray as $child) {
                    if ($child['ID'] == $item->menu_item_parent) {
                        $secondID = $child['secondID'];
                        $thirdID = $child['thirdID'];
                        $forthID = $child['forthID'];

                        $sixthItemArray = array(
                            'ID' => $item->ID,
                            'secondID' => $secondID,
                            'thirdID' => $thirdID,
                            'forthID' => $forthID,
                            'fifthID' => $item->menu_item_parent
                        );

                        $parentArray[$arrayCount]['secondLevel'][$secondID]['thirdLevel'][$thirdID]['forthLevel'][$forthID]['fifthLevel'][$item->menu_item_parent]['sixthLevel'][$item->ID] = $itemArray;
                        array_push($sixthIDArrray, $item->ID);
                        array_push($sixthArray, $sixthItemArray);
                    }
                }

            }
        }

        $seventhIDArrray = array();
        $seventhArray = array();
        foreach ($menuNav as $item) {
            if (in_array($item->menu_item_parent, $sixthIDArrray)) {

                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object
                );

                foreach ($sixthArray as $child) {
                    if ($child['ID'] == $item->menu_item_parent) {
                        $secondID = $child['secondID'];
                        $thirdID = $child['thirdID'];
                        $forthID = $child['forthID'];
                        $fifthID = $child['fifthID'];

                        $seventhItemArray = array(
                            'ID' => $item->ID,
                            'secondID' => $secondID,
                            'thirdID' => $thirdID,
                            'forthID' => $forthID,
                            'fifthID' => $fifthID,
                            'sixthID' => $item->menu_item_parent
                        );

                        $parentArray[$arrayCount]['secondLevel'][$secondID]['thirdLevel'][$thirdID]['forthLevel'][$forthID]['fifthLevel'][$fifthID]['sixthLevel'][$item->menu_item_parent]['seventhLevel'][$item->ID] = $itemArray;
                        array_push($seventhIDArrray, $item->ID);
                        array_push($seventhArray, $seventhItemArray);
                    }
                }

            }
        }


        $eightIDArrray = array();
        $eightArray = array();
        foreach ($menuNav as $item) {
            if (in_array($item->menu_item_parent, $seventhIDArrray)) {

                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object
                );

                foreach ($seventhArray as $child) {
                    if ($child['ID'] == $item->menu_item_parent) {
                        $secondID = $child['secondID'];
                        $thirdID = $child['thirdID'];
                        $forthID = $child['forthID'];
                        $fifthID = $child['fifthID'];
                        $sixthID = $child['sixthID'];

                        $eightItemArray = array(
                            'ID' => $item->ID,
                            'secondID' => $secondID,
                            'thirdID' => $thirdID,
                            'forthID' => $forthID,
                            'fifthID' => $fifthID,
                            'sixthID' => $sixthID,
                            'seventhID' => $item->menu_item_parent
                        );

                        $parentArray[$arrayCount]['secondLevel'][$secondID]['thirdLevel'][$thirdID]['forthLevel'][$forthID]['fifthLevel'][$fifthID]['sixthLevel'][$sixthID]['seventhLevel'][$item->menu_item_parent]['eightLevel'][$item->ID] = $itemArray;
                        array_push($eightIDArrray, $item->ID);
                        array_push($eightArray, $eightItemArray);
                    }
                }

            }
        }


        /*   Adds Full Menu to Sub Menu    */


        $apparelMenuArray = $this->getMenuBasedOnID(1790);
        $clearanceMenuArray = $this->getMenuBasedOnID(1789);
        $fullMenuArray = $this->getMainMenuCat();


        if (isset($apparelMenuArray)) {
            $menyItemArray = array(
                'ID' => 'cat-apparel-menu',
                'name' => 'APPAREL',
                'url' => '/product-category/apparel/',
                'object_id' => 'null',
                'object' => 'custom',
                'menu_id' => '1790',
                'thirdLevel' => $apparelMenuArray
            );
            $parentArray[$arrayCount]['secondLevel']['apparel-menu'] = $menyItemArray;
        }

        if (isset($clearanceMenuArray)) {
            $menyItemArray = array(
                'ID' => 'cat-clearance-menu',
                'name' => 'CLEARANCE',
                'url' => '/product-category/clearance/',
                'object_id' => 'null',
                'object' => 'custom',
                'menu_id' => '1789',
                'thirdLevel' => $clearanceMenuArray
            );
            $parentArray[$arrayCount]['secondLevel']['clearance-menu'] = $menyItemArray;
        }

        if (isset($fullMenuArray)) {
            $menyItemArray = array(
                'ID' => 'cat-full-menu',
                'name' => 'Full Menu',
                'url' => 'https://racetechtitanium.com/',
                'object_id' => 'null',
                'object' => 'custom',
                'menu_id' => 'null',
                'thirdLevel' => $fullMenuArray
            );
            $parentArray[$arrayCount]['secondLevel']['full-menu'] = $menyItemArray;
        }

        return $parentArray;

    }

    function getMainMenuCat(){

        $ParentArray = array();
        $arrayCount = 0;

        $menuIDArray = array(
            'MOTOCROSS' => 1812,
            'SXS/UTV' => 2193,
            'QUADS/ATV' => 1813,
            'DRAG RACING' => 1788,
            'MISC. VEHICLES' => 1802,
            'FASTENERS' => 2970,
            'MATERIAL' => 1815,
            'APPAREL' => 1790,
            'CLEARANCE' => 1789
        );
		
        foreach ($menuIDArray as $menuID) {

            $menuNav = wp_get_nav_menu_items($menuID);

            //echo json_encode($menuNav);

            foreach ($menuNav as $item) {
                if ($item->menu_item_parent == 0) {
                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu',
                        'menu_id' => $menuID
                    );
                    array_push($ParentArray, $itemArray);
                }
            }

            $SecondDownArray = array();
            foreach ($menuNav as $item) {
                if ('cat-' . $item->menu_item_parent == $ParentArray[$arrayCount]['ID']) {
                    array_push($SecondDownArray, ('cat-' . $item->ID));
                }
            }

            foreach ($menuNav as $item) {
                $itemArray = array(
                    'ID' => 'cat-' . $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object,
                    'type' => 'full-menu'
                );
                if ('cat-' . $item->menu_item_parent == $ParentArray[$arrayCount]['ID']) {
                    $ParentArray[$arrayCount]['forthLevel']['cat-' . $item->ID] = $itemArray;
                }
            }

            $thirdIDArrray = array();
            $thirdArray = array();
            foreach ($menuNav as $item) {
                if (in_array('cat-' . $item->menu_item_parent, $SecondDownArray)) {
                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu'
                    );

                    $thirdItemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'parentID' => 'cat-' . $item->menu_item_parent
                    );

                    $ParentArray[$arrayCount]['forthLevel']['cat-' . $item->menu_item_parent]['fifthLevel']['cat-' . $item->ID] = $itemArray;
                    array_push($thirdIDArrray, 'cat-' . $item->ID);
                    array_push($thirdArray, $thirdItemArray);
                }
            }

            $forthIDArrray = array();
            $forthArray = array();
            foreach ($menuNav as $item) {
                if (in_array('cat-' . $item->menu_item_parent, $thirdIDArrray)) {
                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu'
                    );

                    foreach ($thirdArray as $child) {
                        if ($child['ID'] == 'cat-' . $item->menu_item_parent) {
                            $parentID = $child['parentID'];

                            $forthItemArray = array(
                                'ID' => 'cat-' . $item->ID,
                                'secondID' => $parentID,
                                'thirdID' => 'cat-' . $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['forthLevel'][$parentID]['fifthLevel']['cat-' . $item->menu_item_parent]['sixthLevel']['cat-' . $item->ID] = $itemArray;
                            array_push($forthIDArrray, 'cat-' . $item->ID);
                            array_push($forthArray, $forthItemArray);

                        }
                    }
                }
            }

            $fithIDArrray = array();
            $fithArray = array();
            foreach ($menuNav as $item) {
                if (in_array('cat-' . $item->menu_item_parent, $forthIDArrray)) {

                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu'
                    );

                    foreach ($forthArray as $child) {
                        if ($child['ID'] == 'cat-' . $item->menu_item_parent) {
                            $secondID = $child['secondID'];
                            $thirdID = $child['thirdID'];

                            $fithItemArray = array(
                                'ID' => 'cat-' . $item->ID,
                                'secondID' => $secondID,
                                'thirdID' => $thirdID,
                                'forthID' => 'cat-' . $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['forthLevel'][$secondID]['fifthLevel'][$thirdID]['sixthLevel']['cat-' . $item->menu_item_parent]['seventhLevel']['cat-' . $item->ID] = $itemArray;
                            array_push($fithIDArrray, 'cat-' . $item->ID);
                            array_push($fithArray, $fithItemArray);
                        }
                    }

                }
            }
			
			$sixthIDArrray = array();
			$sixthArray = array();
			foreach ($menuNav as $item) {
    			if (in_array('cat-' . $item->menu_item_parent, $fithIDArrray)) {

					$itemArray = array(
						'ID' => 'cat-' . $item->ID,
						'name' => $item->title,
						'url' => $item->url,
						'object_id' => $item->object_id,
						'object' => $item->object,
						'type' => 'full-menu'
					);

					foreach ($fithArray as $child) {
						if ($child['ID'] == 'cat-' . $item->menu_item_parent) {
							$secondID = $child['secondID'];
							$thirdID = $child['thirdID'];
							$fourthID = $child['fourthID'];

						$sixthItemArray = array(
							'ID' => 'cat-' . $item->ID,
							'secondID' => $secondID,
							'thirdID' => $thirdID,
							'fourthID' => $fourthID,
							'fifthID' => 'cat-' . $item->menu_item_parent
						);

							$ParentArray[$arrayCount]['forthLevel'][$secondID]['fifthLevel'][$thirdID]['sixthLevel'][$fourthID]['seventhLevel']['cat-' . $item->menu_item_parent]['eightLevel']['cat-' . $item->ID] = $itemArray;
							array_push($sixthIDArrray, 'cat-' . $item->ID);
							array_push($sixthArray, $sixthItemArray);
						}
					}

}
}


//            if ($arrayCount == 3) {
//                $itemArray = array(
//                    'ID' => 'null',
//                    'name' => 'Exotics',
//                    'url' => get_site_url() . '/product-category/exotics/?selected_menu_page_id=52976',
//                    'object_id' => 'null',
//                    'object' => 'custom',
//                    'type' => 'full-menu',
//                    'menu_id' => 'null'
//                );
//                array_push($ParentArray, $itemArray);
//                $arrayCount++;
//            }
            $arrayCount++;
        }


        return $ParentArray;

    }

    function getMenuBasedOnID($menuID){

        $ParentArray = array();
        $arrayCount = 0;

            $menuNav = wp_get_nav_menu_items($menuID);

            //echo json_encode($menuNav);

            foreach ($menuNav as $item) {
                if ($item->menu_item_parent == 0) {
                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu',
                        'menu_id' => $menuID
                    );
                    array_push($ParentArray, $itemArray);
                }
            }

            $SecondDownArray = array();
            foreach ($menuNav as $item) {
                if ('cat-' . $item->menu_item_parent == $ParentArray[$arrayCount]['ID']) {
                    array_push($SecondDownArray, ('cat-' . $item->ID));
                }
            }

            foreach ($menuNav as $item) {
                $itemArray = array(
                    'ID' => 'cat-' . $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object,
                    'type' => 'full-menu'
                );
                if ('cat-' . $item->menu_item_parent == $ParentArray[$arrayCount]['ID']) {
                    $ParentArray[$arrayCount]['forthLevel']['cat-' . $item->ID] = $itemArray;
                }
            }

            $thirdIDArrray = array();
            $thirdArray = array();
            foreach ($menuNav as $item) {
                if (in_array('cat-' . $item->menu_item_parent, $SecondDownArray)) {
                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu'
                    );

                    $thirdItemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'parentID' => 'cat-' . $item->menu_item_parent
                    );

                    $ParentArray[$arrayCount]['forthLevel']['cat-' . $item->menu_item_parent]['fifthLevel']['cat-' . $item->ID] = $itemArray;
                    array_push($thirdIDArrray, 'cat-' . $item->ID);
                    array_push($thirdArray, $thirdItemArray);
                }
            }

            $forthIDArrray = array();
            $forthArray = array();
            foreach ($menuNav as $item) {
                if (in_array('cat-' . $item->menu_item_parent, $thirdIDArrray)) {
                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu'
                    );

                    foreach ($thirdArray as $child) {
                        if ($child['ID'] == 'cat-' . $item->menu_item_parent) {
                            $parentID = $child['parentID'];

                            $forthItemArray = array(
                                'ID' => 'cat-' . $item->ID,
                                'secondID' => $parentID,
                                'thirdID' => 'cat-' . $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['forthLevel'][$parentID]['fifthLevel']['cat-' . $item->menu_item_parent]['sixthLevel']['cat-' . $item->ID] = $itemArray;
                            array_push($forthIDArrray, 'cat-' . $item->ID);
                            array_push($forthArray, $forthItemArray);

                        }
                    }
                }
            }

            $fithIDArrray = array();
            $fithArray = array();
            foreach ($menuNav as $item) {
                if (in_array('cat-' . $item->menu_item_parent, $forthIDArrray)) {

                    $itemArray = array(
                        'ID' => 'cat-' . $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'type' => 'full-menu'
                    );

                    foreach ($forthArray as $child) {
                        if ($child['ID'] == 'cat-' . $item->menu_item_parent) {
                            $secondID = $child['secondID'];
                            $thirdID = $child['thirdID'];

                            $fithItemArray = array(
                                'ID' => 'cat-' . $item->ID,
                                'secondID' => $secondID,
                                'thirdID' => $thirdID,
                                'forthID' => 'cat-' . $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['forthLevel'][$secondID]['fifthLevel'][$thirdID]['sixthLevel']['cat-' . $item->menu_item_parent]['seventhLevel']['cat-' . $item->ID] = $itemArray;
                            array_push($fithIDArrray, 'cat-' . $item->ID);
                            array_push($fithArray, $fithItemArray);
                        }
                    }

                }
            }


//            if ($arrayCount == 3) {
//                $itemArray = array(
//                    'ID' => 'null',
//                    'name' => 'Exotics',
//                    'url' => get_site_url() . '/product-category/exotics/?selected_menu_page_id=52976',
//                    'object_id' => 'null',
//                    'object' => 'custom',
//                    'type' => 'full-menu',
//                    'menu_id' => 'null'
//                );
//                array_push($ParentArray, $itemArray);
//                $arrayCount++;
//            }


        return $ParentArray;

    }

    function getMainMenu(){
        $ParentArray = array();
        $arrayCount = 0;

        $menuIDArray = array(
            'MOTOCROSS' => 1812,
            'SXS/UTV' => 2193,
            'QUADS/ATV' => 1813,
            'DRAG RACING' => 1788,
            'MISC. VEHICLES' => 1802,
            'FASTENERS' => 2970,
            'MATERIAL' => 1815,
            'APPAREL' => 1790,
            'CLEARANCE' => 1789
        );

        foreach ($menuIDArray as $menuID){

            $menuNav = wp_get_nav_menu_items($menuID);

            //echo json_encode($menuNav);

            foreach ($menuNav as $item){

                $url = $item->url;
                $string = "landing_pages";
                if (strpos($url,$string) !== false) {
                    if (strpos($url,'?') !== false) {
                        $url = $url . '&cache_id=' . rand();
                    }else{
                        $url = $url . '?cache_id=' . rand();
                    }
                }

                if($item->menu_item_parent == 0){
                    $itemArray = array(
                        'ID' => $item->ID,
                        'name' => $item->title,
                        'url' => $url,
                        'object_id' => $item->object_id,
                        'object' => $item->object,
                        'menu_id' => $menuID
                    );
                    array_push($ParentArray, $itemArray);
                }
            }

            $SecondDownArray = array();
            foreach ($menuNav as $item){
                if($item->menu_item_parent == $ParentArray[$arrayCount]['ID']){
                    array_push($SecondDownArray, $item->ID);
                }
            }

            foreach ($menuNav as $item){
                $itemArray = array(
                    'ID' => $item->ID,
                    'name' => $item->title,
                    'url' => $item->url,
                    'object_id' => $item->object_id,
                    'object' => $item->object
                );
                if($item->menu_item_parent == $ParentArray[$arrayCount]['ID']){
                    $ParentArray[$arrayCount]['secondLevel'][$item->ID] = $itemArray;
                }
            }

            $thirdIDArrray = array();
            $thirdArray = array();
            foreach ($menuNav as $item){
                if( in_array($item->menu_item_parent, $SecondDownArray)){
                    $itemArray = array(
                        'ID' => $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object
                    );

                    $thirdItemArray = array(
                        'ID' => $item->ID,
                        'name' => $item->title,
                        'parentID' => $item->menu_item_parent
                    );

                    $ParentArray[$arrayCount]['secondLevel'][$item->menu_item_parent]['thirdLevel'][$item->ID] = $itemArray;
                    array_push($thirdIDArrray, $item->ID);
                    array_push($thirdArray, $thirdItemArray);
                }
            }

            $forthIDArrray = array();
            $forthArray = array();
            foreach ($menuNav as $item){
                if( in_array($item->menu_item_parent, $thirdIDArrray)){
                    $itemArray = array(
                        'ID' => $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object
                    );

                    foreach ($thirdArray as $child){
                        if ($child['ID'] == $item->menu_item_parent){
                            $parentID = $child['parentID'];

                            $forthItemArray = array(
                                'ID' => $item->ID,
                                'secondID' => $parentID,
                                'thirdID' => $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['secondLevel'][$parentID]['thirdLevel'][$item->menu_item_parent]['forthLevel'][$item->ID] = $itemArray;
                            array_push($forthIDArrray, $item->ID);
                            array_push($forthArray, $forthItemArray);

                        }
                    }
                }
            }

            $fithIDArrray = array();
            $fithArray = array();
            foreach ($menuNav as $item){
                if( in_array($item->menu_item_parent, $forthIDArrray)){

                    $itemArray = array(
                        'ID' => $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object
                    );

                    foreach ($forthArray as $child){
                        if ($child['ID'] == $item->menu_item_parent){
                            $secondID = $child['secondID'];
                            $thirdID = $child['thirdID'];

                            $fithItemArray = array(
                                'ID' => $item->ID,
                                'secondID' => $secondID,
                                'thirdID' => $thirdID,
                                'forthID' => $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['secondLevel'][$secondID]['thirdLevel'][$thirdID]['forthLevel'][$item->menu_item_parent]['fifthLevel'][$item->ID] = $itemArray;
                            array_push($fithIDArrray, $item->ID);
                            array_push($fithArray, $fithItemArray);
                        }
                    }

                }
            }

            $sixthIDArrray = array();
            $sixthArray = array();
            foreach ($menuNav as $item){
                if( in_array($item->menu_item_parent, $fithIDArrray)){

                    $itemArray = array(
                        'ID' => $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object
                    );

                    foreach ($fithArray as $child){
                        if ($child['ID'] == $item->menu_item_parent){
                            $secondID = $child['secondID'];
                            $thirdID = $child['thirdID'];
                            $forthID = $child['forthID'];

                            $sixthItemArray = array(
                                'ID' => $item->ID,
                                'secondID' => $secondID,
                                'thirdID' => $thirdID,
                                'forthID' => $forthID,
                                'fifthID' => $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['secondLevel'][$secondID]['thirdLevel'][$thirdID]['forthLevel'][$forthID]['fifthLevel'][$item->menu_item_parent]['sixthLevel'][$item->ID] = $itemArray;
                            array_push($sixthIDArrray, $item->ID);
                            array_push($sixthArray, $sixthItemArray);
                        }
                    }

                }
            }

            $seventhIDArrray = array();
            $seventhArray = array();
            foreach ($menuNav as $item){
                if( in_array($item->menu_item_parent, $sixthIDArrray)){

                    $itemArray = array(
                        'ID' => $item->ID,
                        'name' => $item->title,
                        'url' => $item->url,
                        'object_id' => $item->object_id,
                        'object' => $item->object
                    );

                    foreach ($sixthArray as $child){
                        if ($child['ID'] == $item->menu_item_parent){
                            $secondID = $child['secondID'];
                            $thirdID = $child['thirdID'];
                            $forthID = $child['forthID'];
                            $fifthID = $child['fifthID'];

                            $seventhItemArray = array(
                                'ID' => $item->ID,
                                'secondID' => $secondID,
                                'thirdID' => $thirdID,
                                'forthID' => $forthID,
                                'fifthID' => $fifthID,
                                'sixthID' => $item->menu_item_parent
                            );

                            $ParentArray[$arrayCount]['secondLevel'][$secondID]['thirdLevel'][$thirdID]['forthLevel'][$forthID]['fifthLevel'][$fifthID]['sixthLevel'][$item->menu_item_parent]['seventhLevel'][$item->ID] = $itemArray;
                            array_push($seventhIDArrray, $item->ID);
                            array_push($seventhArray, $seventhItemArray);
                        }
                    }

                }
            }

//            if($arrayCount == 3){
//                $itemArray = array(
//                    'ID' => 'null',
//                    'name' => 'Exotics',
//                    'url' => get_site_url() . '/product-category/exotics/?selected_menu_page_id=52976',
//                    'object_id' => 'null',
//                    'object' => 'custom',
//                    'menu_id' => 'null'
//                );
//                array_push($ParentArray, $itemArray);
//                $arrayCount++;
//            }
            $arrayCount++;
        }

        return $ParentArray;
    }


    function getMenuID($term_id){

        $catMenuArray = array();

        if ( have_rows( 'header_cats_and_menu', 'option' ) ) {
            while (have_rows('header_cats_and_menu', 'option')) : the_row();
                $category = get_sub_field('category');
                if ($category) {
                    array_push($catMenuArray, array('slug' => $category->slug, 'term_id' => $category->term_id, 'name' => $category->name, 'menuID' => get_sub_field('menu_id')));
                }
            endwhile;
        }

        $count = 0;

        foreach ($term_id as $term){
            foreach ($catMenuArray as $cats){
                if ($count <= 0){
                    if(term_is_ancestor_of( $cats['term_id'], $term, 'product_cat' ) || ($cats['term_id'] == $term)){
                        $termCat = $cats['menuID'];
                        $count ++;
                    }else{
                        $termCat = false;
                    }
                }
            }
        }

        return $termCat;

    }

    function getMenuIDWithPrimary($term_id, $primaryTermID){

        $catMenuArray = array();

        if ( have_rows( 'header_cats_and_menu', 'option' ) ) {
            while (have_rows('header_cats_and_menu', 'option')) : the_row();
                $category = get_sub_field('category');
                if ($category) {
                    array_push($catMenuArray, array('slug' => $category->slug, 'term_id' => $category->term_id, 'name' => $category->name, 'menuID' => get_sub_field('menu_id')));
                }
            endwhile;
        }

        $count = 0;

        if (($primaryTermID != '') && (isset($primaryTermID))){
            foreach ($catMenuArray as $cats){
                if ($count <= 0){
                    if(term_is_ancestor_of( $cats['term_id'], $primaryTermID, 'product_cat' ) || ($cats['term_id'] == $primaryTermID)){
                        $termCat = $cats['menuID'];
                        $count ++;
                    }else{
                        $termCat = false;
                    }
                }
            }
        }else{
            foreach ($term_id as $term){
                foreach ($catMenuArray as $cats){
                    if ($count <= 0){
                        if(term_is_ancestor_of( $cats['term_id'], $term, 'product_cat' ) || ($cats['term_id'] == $term)){
                            $termCat = $cats['menuID'];
                            $count ++;
                        }else{
                            $termCat = false;
                        }
                    }
                }
            }
        }

        return $termCat;

    }

}