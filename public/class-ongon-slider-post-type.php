<?php


class slider_post_type{

    public function __construct(){
		
        add_action( 'init', array($this, 'ongon_slider_main'), 0 );
        add_shortcode('ongon-slider-shortcode', array($this, 'main_area_shortcode'));
    }

    public function main_area_shortcode(){
        ?>
        <div class="div" >
            <div class="owl-carousel owl-theme">

            <?php $query = new WP_Query( array(
                'post_type' => 'ongon_slider_main',
            ) ); ?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


			<div class="item">
				<div class="testimonial-item">
					<div class="quote">
						<i class="fas fa-quote-left"></i>
					</div>
					<div class="testimonial-img">
						<?php the_post_thumbnail(); ?>
					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta consequatur,
					optio dolores aliquid </p>
					<div class="rating">
						<i class="fas fa-3x fa-star"></i>
						<i class="fas fa-3x fa-star"></i>
						<i class="fas fa-3x fa-star"></i>
						<i class="fas fa-3x fa-star"></i>
						<i class="fas fa-3x fa-star"></i>
					</div>
				</div>
			</div>

<?php endwhile; 
 wp_reset_postdata();
 else : ?>
 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
                
            </div>
        </div>
        <?php
    }


    // Register Custom Post Type
public function ongon_slider_main() {

	$labels = array(
		'name'                  => _x( 'Ongon Slider', 'Post Type General Name', 'ongon_slider' ),
		'singular_name'         => _x( 'Ongon Slider', 'Post Type Singular Name', 'ongon_slider' ),
		'menu_name'             => __( 'Ongon Sliders', 'ongon_slider' ),
		'name_admin_bar'        => __( 'Ongon Slider', 'ongon_slider' ),
		'archives'              => __( 'Item Archives', 'ongon_slider' ),
		'attributes'            => __( 'Item Attributes', 'ongon_slider' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ongon_slider' ),
		'all_items'             => __( 'All Items', 'ongon_slider' ),
		'add_new_item'          => __( 'Add New Item', 'ongon_slider' ),
		'add_new'               => __( 'Add New', 'ongon_slider' ),
		'new_item'              => __( 'New Item', 'ongon_slider' ),
		'edit_item'             => __( 'Edit Item', 'ongon_slider' ),
		'update_item'           => __( 'Update Item', 'ongon_slider' ),
		'view_item'             => __( 'View Item', 'ongon_slider' ),
		'view_items'            => __( 'View Items', 'ongon_slider' ),
		'search_items'          => __( 'Search Item', 'ongon_slider' ),
		'not_found'             => __( 'Not found', 'ongon_slider' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ongon_slider' ),
		'featured_image'        => __( 'Featured Image', 'ongon_slider' ),
		'set_featured_image'    => __( 'Set featured image', 'ongon_slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'ongon_slider' ),
		'use_featured_image'    => __( 'Use as featured image', 'ongon_slider' ),
		'insert_into_item'      => __( 'Insert into item', 'ongon_slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ongon_slider' ),
		'items_list'            => __( 'Items list', 'ongon_slider' ),
		'items_list_navigation' => __( 'Items list navigation', 'ongon_slider' ),
		'filter_items_list'     => __( 'Filter items list', 'ongon_slider' ),
	);
	$args = array(
		'label'                 => __( 'Ongon Slider', 'ongon_slider' ),
		'description'           => __( 'Post Type Description', 'ongon_slider' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ongon_slider_main', $args );

}


}