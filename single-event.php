<?php get_header("riseup-single-event"); ?>

    <section id="rise-up-single-event-header" style="background: url('https://reformimmigrationforamerica.org/wp-content/uploads/2017/03/ladylibertybanner.png'); background-size:cover;">
        <div class="container rise-up-single-event-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header-content">
                        <div class="header-content-inner">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                            
                            <div class="entry-content">
                                <h1 class="all-events-header"><?php the_title()?></h1>
                                <!-- Get event information, see template: event-meta-event-single.php 
                                    Update: the code below under the eventorganiser-event-meta div was commetted out and taken directly from event-meta-event-single.php tempate
                                -->
        
                                <div class="eventorganiser-event-meta">                           
                                    <div class="img-responsive">
                                        <?php
                                        //If it has one, display the thumbnail
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'thumbnail', array( 'class' => 'attachment-thumbnail eo-event-thumbnail' ) );
                                        } 
                                        ?>
                                    </div>
                                    <!-- Event details -->
                                    <ul class="eo-event-meta">
                                        <?php if ( ! eo_recurs() ) { ?>
                                            <!-- Single event -->
                                            <li><strong><?php esc_html_e( 'Date', 'eventorganiser' );?>:</strong> <?php echo eo_format_event_occurrence();?></li>
                                        <?php } ?>

                                        <!-- Choose a different date format depending on whether we want to include time -->
                                        <?php if( eo_is_all_day() ){ ?>
                                            <?php $date_format = 'j F Y'; ?>
                                            <li> Time: <?php echo $date_format; ?></li>
                                        <?php }else{ ?>
                                            <?php $date_format = 'j F Y ' . get_option('time_format'); ?>
                                            <li> Time: <?php echo $date_format; ?></li>
                                        } ?>

                                        <?php if ( eo_get_venue()) : ?> 
                                            <?php $tax = get_taxonomy( 'event-venue' ); ?>
                                            <li><strong>Location: </strong><?php eo_venue_name(); ?></li>
                                        <?php endif; ?>

                                        <?php if ( get_post_meta( get_the_ID(), 'eo_city_state', true )) { ?> 
                                            <li><strong>City, State: </strong><?php echo esc_html( get_post_meta( get_the_ID(), 'eo_city_state', true) ); ?></li>
                                        <?php } ?>

                                        <?php if ( get_the_terms( get_the_ID(), 'event-category' ) ) { ?>
                                            <li><strong><?php esc_html_e( 'Categories', 'eventorganiser' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></li>
                                        <?php } ?>

                                        <?php if ( get_post_meta( get_the_ID(), 'eo_host_org', true )) { ?> 
                                            <li><strong>Host Organization: </strong><?php echo esc_html( get_post_meta( get_the_ID(), 'eo_host_org', true) ); ?></li>
                                        <?php } ?>

                                        <?php if ( get_the_terms( get_the_ID(), 'event-tag' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-tag' ) ) ) { ?>
                                            <li><strong><?php esc_html_e( 'Tags', 'eventorganiser' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(), 'event-tag', '', ', ', '' ); ?>
                                            </li>
                                        <?php } ?>

                                        <br>

                                        <!-- The content or the description of the event-->
                                        <?php the_content(); ?>

                                        <!-- Point Person -->
                                        <hr>
                                        <h4><strong> CONTACT INFO </strong></h4>
                                        <li style="font-size:0.8em;">
                                            <?php $first_name = eo_fes_get_submitted_event_meta( get_the_ID(), 'submitter_first_name' ); ?>
                                            <?php $last_name = eo_fes_get_submitted_event_meta( get_the_ID(), 'submitter_last_name' ); ?>

                                            <strong>Point Person:</strong> 
                                            <?php echo $first_name; ?> <?php echo $last_name;?> 
                                            <?php if ( get_post_meta( get_the_ID(), 'eo_point_person_email', true )) { ?> 
                                                - <?php echo esc_html( get_post_meta( get_the_ID(), 'eo_point_person_email', true) ); ?>
                                             <?php } ?> <br>

                                             <?php if ( get_post_meta( get_the_ID(), 'eo_pt_person_phone', true )) { ?>
                                               <strong>Phone:</strong> <?php echo esc_html( get_post_meta( get_the_ID(), 'eo_pt_person_phone', true) ); ?>
                                             <?php } ?>

                                        </li>
                                        <!-- <?php do_action( /*'eventorganiser_additional_event_meta'*/ ) ?> -->
                                        <?php do_shortcode('[event_booking_form')?>
                                    </ul>

                                     <!-- Does the event have a venue? -->
                                    <?php if ( eo_get_venue()) : ?>
                                    <!-- Display map -->
                                        <div class="eo-event-map">
                                            <?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
                                        </div>
                                    <?php endif; ?>

                                    <p style="font-size:16px; text-decoration:none;"><a href="https://reformimmigrationforamerica.org/rise-up-all-events/"> <<< <strong>BACK</strong></a></p>

                                    <div style="clear:both"></div>
                                    <hr>
                                </div><!-- .entry-meta -->   
                            </div><!-- .entry-content -->
                        </div>                       
                    </div>
                </div>
            </div><!-- end row -->
        </div>
    </section>
    <div id="riseup-event-single-container" class="container interiorpage">
<!--     <div class="row maincontent"><div class="col-sm-12"><?php the_breadcrumb(); ?></div></div> -->
        <div id="single-events-container">
            <div id="content" role="main">
                        </article><!-- #post-<?php the_ID(); ?> -->
                    <!-- If comments are enabled, show them -->
                    <div class="comments-template">
                        <?php comments_template(); ?>
                    </div>              
                <?php endwhile; // end of the loop. ?>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div> <!-- row -->
<?php get_footer("riseup"); ?>
