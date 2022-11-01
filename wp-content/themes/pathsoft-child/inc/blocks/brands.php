<?php get_template_part( 'inc/section/section', 'top' ); ?>
            
<?php $brands = get_sub_field('brands'); 

if($brands['style'] == 'style1') {
foreach ($brands['list'] as $brand) { 
?>
<div class="col-lg-3 col-md-4 col-sm-4 col-6 item">
	<div class="brands-item item-style">
		<img data-src="<?php echo esc_url( $brand['logo']['url'] ); ?>" class="lazy" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="<?php echo esc_attr( $brand['logo']['alt'] ); ?>">
	</div>
</div>
<?php } } else if($brands['style'] == 'style2')  { ?>
<div class="col-12 item">
<div class="brands-carusel" data-flickity='{ "imagesLoaded": true, "lazyLoad": true, "autoPlay": 5000, "groupCells": true, "contain": true, "prevNextButtons": false }'>
    <?php foreach ($brands['list'] as $brand) {  ?>
	<div class="brands-col">
		<div class="brands-item item-style">
			<img data-flickity-lazyload="<?php echo esc_url( $brand['logo']['url'] ); ?>" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="<?php echo esc_attr( $brand['logo']['alt'] ); ?>">
		</div>
    </div>
    <?php } ?>
</div>
<?php } ?>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>