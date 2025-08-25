<?php
$menu_items = wp_get_nav_menu_items('1'); 
if ( $menu_items ) {
  foreach ( $menu_items as $item ) {
    echo '<a href="' . esc_url( $item->url ) . '" class="navb">' . esc_html( $item->title ) . '</a>';
  }
}
?>