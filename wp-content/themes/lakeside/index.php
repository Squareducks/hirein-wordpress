<?php get_header(); ?>
 
    <div id="blog">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <div class="post">
            <div class="entry">   
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
            </div>
        </div>
		<?php endwhile; ?>
        <?php endif; ?>
    </div>
	
</div><!-- END CONTENT-->
<?php get_sidebar(); ?>   
</div><!-- END CONTAINER-->
</div><!-- END MAIN-->
<?php get_footer(); ?>