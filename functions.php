<?php 
global $post;
$related = get_posts( 
  array( 
  'category__in' => wp_get_post_categories( $post->ID ), 
  'numberposts'  => 4, 
  'post__not_in' => array( $post->ID ),
  'post_type'    => 'product'
  ) 
);
if( $related ) { ?>
  <ul>
    <?php 
      foreach( $related as $post ) {
        setup_postdata($post); 
        $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' );
        $product = wc_get_product( get_the_ID() );?>
        <li class="post-<?php echo get_the_ID();?> product type-product">
          <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
          <img src="<?php echo $url; ?>">
          <h2><?php echo get_the_title(); ?></h2>
          <span class="price">$ <?php echo $product->get_price(); ?></span>
          </a>
          <a href="<?php echo get_the_permalink(get_the_ID()); ?>">Buy Now</a>
        </li>
      <?php
      /*whatever you want to output*/
      }
    wp_reset_postdata(); ?>
  </ul>
<?php } ?>
