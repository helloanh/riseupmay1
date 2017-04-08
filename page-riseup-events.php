<?php 
/**
 *
 * Template name: Rise Up All Events
 *
 */

get_header('riseupallevents'); ?>

<section id="list-events" class="about bg-primary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 list-all-event-container">
                    <!-- <h2 class="section-heading">About</h2> -->
                    <?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(); ?>
                                    <h1 class="events-list-heading"><?php the_title(); ?></h1>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    
               
                    </div>
                </div>
            </div>
        </div>
</section>

<script>
    document.getElementsByClassName('show')[0].innerHTML = '"<label for="event-search">Search</label><p><input type="text" name="eo_search[s]" id="event-search" value=""></p>"';
    
</script>
<?php get_footer('riseup'); ?>
