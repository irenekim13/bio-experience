<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; 

$blog = get_sub_field('blog');
$col_class = 'col-lg-4 col-md-6 col-12 item';

if ( ( get_page_template_slug( $id_page ) == 'page-templates/right-sidebarpage.php' && is_active_sidebar( 'right-sidebar' ) ) || get_page_template_slug( $id_page ) == 'page-templates/left-sidebarpage.php' && is_active_sidebar( 'left-sidebar' ) || is_category() || is_tag() || is_archive() ) {
	$col_class = 'col-md-6 col-12 item';
}

?>

<?php if($blog['style'] == 'style1' || !$blog['style']) { ?>
<div <?php post_class($col_class); ?> id="post-<?php the_ID(); ?>">
	<article class="news-item item-style">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="news-item-img">
			<?php if(has_post_thumbnail()) { ?>
			<img data-src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>"
				class="lazy"
				src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
				alt="">
			<?php } ?>
		</a>
		<div class="news-item-info">
			<div class="news-item-date"><?php the_time( get_option('date_format') ); ?></div>
			<?php
			the_title(
				sprintf( '<h2 class="news-item-title item-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>
			<div class="news-item-desc">
				<p><?php the_excerpt_max_charlength(70); ?></p>
			</div>
		</div>
	</article>
</div>
<?php } if($blog['style'] == 'style2') { ?>
<div <?php post_class($col_class); ?> id="post-<?php the_ID(); ?>">
	<article class="news-item news-item-min item-style">
		<div class="news-item-header">
			<?php
				$author_id=$post->post_author;
				
				$first_name = get_the_author_meta( 'first_name' , $author_id );
				$last_name = get_the_author_meta( 'last_name' , $author_id );
				$user_nicename = get_the_author_meta( 'user_nicename' , $author_id );
				$avatar_url = get_avatar_url($author_id);
				$author_url = home_url('/').'author/'.esc_attr( $user_nicename );
			?>
			<a href="<?php echo $author_url; ?>" class="news-item-auth">
				<div class="news-item-auth-img">
					<img data-src="<?php echo esc_url( $avatar_url ); ?>"
						class="lazy"
						src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
						alt="">
				</div>
				<div class="news-item-auth-name">
					<?php if($first_name && $last_name) { 
                            echo esc_html( $first_name ).' '.esc_html( $last_name ); ?>
                        <?php } else {
                            echo esc_html( $user_nicename );
                    } ?>
				</div>
			</a>
			<div class="news-item-date2"><?php the_time( get_option('date_format') ); ?></div>
		</div>
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="news-item-img">
			<?php if(has_post_thumbnail()) { ?>
			<img data-src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>"
				class="lazy"
				src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
				alt="">
			<?php } ?>
		</a>
		<div class="news-item-info">
			<?php
			the_title(
				sprintf( '<h2 class="news-item-title item-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>
		</div>
	</article>
</div>
<?php } if($blog['style'] == 'style3') { ?>
<article class="news-wide-item item">
	<a href="blog-post.html" class="news-wide-item-img img-style">
		<?php if(has_post_thumbnail()) { ?>
		<img data-src="<?php echo get_the_post_thumbnail_url( $post->ID, 'medium' ); ?>"
			class="lazy"
			src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
			alt="">
		<?php } ?>
	</a>
	<div class="news-wide-item-info">
		<?php
			the_title(
				sprintf( '<h2 class="news-wide-item-title item-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'
			);
		?>
		<div class="news-wide-item-row">
			<div class="blog-post-meta">
				<?php understrap_posted_on(); ?>
			</div>
		</div>
		<div class="news-wide-item-desc">
			<p><?php the_excerpt_max_charlength(200); ?></p>
		</div>
		<div class="wrapp-btn-link">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-link">
				<span><?php esc_html_e( 'Read more', 'understrap' ) ?></span>
				<svg class="btn-link-ico btn-link-ico-right" viewBox="0 0 13 9" width="13px" height="9px">
					<use
						xlink:href="<?php echo esc_attr( get_template_directory_uri() . '/assets/img/sprite.svg#arrow-right' ); ?>">
					</use>
				</svg>
			</a>
		</div>
	</div>
</article>
<?php } ?>