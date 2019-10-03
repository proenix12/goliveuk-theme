<?php
	
	
	class My_Walker_Nav_Menu extends Walker_Nav_Menu {
		/**
		 * @param string $output
		 * @param WP_Post $item
		 * @param int $depth
		 * @param array $args
		 * @param int $id
		 */
		public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ): void {
			$class = $item->current ? 'active' : '';
			if ( isset( $args->has_children ) ) {
				$output .= sprintf( '<li class="item has_child %s"><a href="#" class="" data-toggle="dropdown" >' . $item->title . '</a>', $class, $item->url, $item->title );
			} else {
				$output .= sprintf( '<li class="item menu__item %s"><a href="%s">%s</a>', $class, $item->url, $item->title );
			}
		}
		
		/**
		 * @param string $output
		 * @param int $depth
		 * @param array $args
		 */
		public function start_lvl( &$output, $depth = 0, $args = [] ): void {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"dropdown\" role=\"menu\">\n";
			
		}
		
		/**
		 * @param string $output
		 * @param int $depth
		 * @param array $args
		 */
		public function end_lvl( &$output, $depth = 0, $args = [] ): void {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent</ul>\n";
		}
	}