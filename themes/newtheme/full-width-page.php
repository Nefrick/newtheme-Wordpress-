<?php
/**
 *  Template name: Full Width Page
 */

get_header(); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <h1 class="my-4">Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php

                if( have_posts() ){
                    while( have_posts() ){
                        the_post();
                        ?>
                        <!-- Blog Post -->
                        <div class="card mb-4">

                            <div class="card-body">
                                <?php the_title('<h2 class="card-title">', '</h2>'); ?>
                                <span>Posted at <?php the_time( 'g:i a' ); ?></span><br>
                                <p class="card-text"><?php the_content(); ?></p>
                                <?php
                                $defaults = array(
                                    'before'           => '<p class="text-center">' . __( 'Pages:', 'newtheme' ),

                                );

                                wp_link_pages( $defaults );
                                ?>
                            </div>

                        </div>

                        <?php
                    }
                }

                ?>



            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

<?php get_footer(); ?>
