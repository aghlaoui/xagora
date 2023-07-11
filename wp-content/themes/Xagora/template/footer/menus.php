 <div class="col-12 col-lg-9 p-0 footer-right">
     <div class="row items">
         <div class="col-12 col-lg-4 item">
             <div class="card">
                 <?php
                    /**
                     * Left Footer
                     */
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['footer_left_menu']);
                    echo '<h4>' . $menu->name . '</h4>';
                    $leftMenu = wp_nav_menu(
                        array(
                            'theme_location' => 'footer_left_menu',
                            'container' => false,
                            'echo' => false,
                            'items_wrap'  => '%3$s',
                            'depth' => 0,
                            'link_before' => '<i class="icon-arrow-right"></i>'
                        )
                    );
                    echo strip_tags($leftMenu, '<a><i>');
                    ?>
             </div>

         </div>
         <div class="col-12 col-lg-4 item">
             <div class="card">
                 <?php
                    /**
                     * Center Footer
                     */
                    $locations = get_nav_menu_locations();
                    $menu = ($locations) ? wp_get_nav_menu_object($locations['footer_center_menu']) : '';
                    echo '<h4>' . $menu->name . '</h4>';
                    $leftMenu = wp_nav_menu(
                        array(
                            'theme_location' => 'footer_center_menu',
                            'container' => false,
                            'echo' => false,
                            'items_wrap'  => '%3$s',
                            'depth' => 0,
                            'link_before' => '<i class="icon-arrow-right"></i>'
                        )
                    );
                    echo strip_tags($leftMenu, '<a><i>');
                    ?>
             </div>
         </div>
         <div class="col-12 col-lg-4 item">
             <div class="card">
                 <?php
                    /**
                     * Right Footer
                     */
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['footer_right_menu']);
                    echo '<h4>' . $menu->name . '</h4>';
                    $leftMenu = wp_nav_menu(
                        array(
                            'theme_location' => 'footer_right_menu',
                            'container' => false,
                            'echo' => false,
                            'items_wrap'  => '%3$s',
                            'depth' => 0,
                            'link_before' => '<i class="icon-arrow-right"></i>'
                        )
                    );
                    echo strip_tags($leftMenu, '<a><i>');
                    ?>
             </div>
         </div>
     </div>
 </div>