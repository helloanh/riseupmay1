<?php
/**
 * A single event in a events loop. Used by eo-loop-single-event.php
 *
 ***************** NOTICE: *****************
 * This template file is from Event Organiser eo-loop-single-event.php template.
 *
 * The original copy is the in the plugin folder in this path:
 * /home/ri4a/public_html/wp-content/plugins/event-organiser/templates
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://data-vocabulary.org/Event">
					
	<header class="eo-event-header entry-header">

		<h2 class="eo-event-title entry-title">
			<a href="<?php echo eo_get_permalink(); ?>" itemprop="url">
				<span itemprop="summary"><?php the_title() ?></span>
			</a>
		</h2>

		<div class="eo-event-date"> 
			<?php
				//Formats the start & end date of the event
				echo eo_format_event_occurrence();
			?>
		</div>

	</header><!-- .entry-header -->
	
	<div class="eo-event-details event-entry-meta">
			
		<?php
		//If it has one, display the thumbnail
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'thumbnail', array( 'class' => 'attachment-thumbnail eo-event-thumbnail' ) );
		}

		//A list of event details: venue, categories, tags.
		// echo eo_get_event_meta_list();
		?>

		<div class="eo-event-other-meta">

		<?php if ( eo_get_venue() ) {
		    $tax = get_taxonomy( 'event-venue' ); ?>
		    <strong>Location: </strong><?php eo_venue_name(); ?>
		<?php } ?>

		<?php if ( get_the_terms( get_the_ID(), 'event-category' ) ) { ?>
		    <strong><?php esc_html_e( 'Categories', 'eventorganiser' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?>
		<?php } ?>
		
		<?php if ( get_post_meta( get_the_ID(), 'eo_host_org', true )) { ?> 
		    <strong>Host Organization: </strong><?php echo esc_html( get_post_meta( get_the_ID(), 'eo_host_org', true) ); ?>
		<?php } ?>

		<?php if ( get_the_terms( get_the_ID(), 'event-tag' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-tag' ) ) ) { ?>
		    <li><strong><?php esc_html_e( 'Tags', 'eventorganiser' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(), 'event-tag', '', ', ', '' ); ?>
		    </li>
		<?php } ?>
		</div>
			
			
	</div><!-- .event-entry-meta -->

	<!-- Show Event text as 'the_excerpt' or 'the_content' -->
	<div class="eo-event-content" itemprop="description"><?php the_excerpt(); ?></div>
			
	<div style="clear:both;"></div>

</article>
