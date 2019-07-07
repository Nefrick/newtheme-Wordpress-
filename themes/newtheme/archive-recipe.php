<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Recipes</h1>
                <?php

                $query               =   new WP_Query(array(
                    'post_type'      => 'recipe',
                    'posts_per_page' => 3,
                    'orderby'        => 'rand'

                ));

                if( $query->have_posts() ){
                    while( $query->have_posts() ){
                        $query->the_post();
                        ?>


                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
                        <?php

                        wp_reset_postdata();
                    }
                }

                ?>

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <?php previous_posts_link( '<svg height="32" class="octicon octicon-arrow-left" viewBox="0 0 10 16" version="1.1" width="20" aria-hidden="true"><path fill-rule="evenodd" d="M6 3L0 8l6 5v-3h4V6H6V3z"></path></svg>' ); ?>
                    </li>
                    <li class="page-item disabled">
                        <?php next_posts_link( '<svg height="32" class="octicon octicon-arrow-right" viewBox="0 0 10 16" version="1.1" width="20" aria-hidden="true"><path fill-rule="evenodd" d="M10 8L4 3v3H0v4h4v3l6-5z"></path></svg>' ); ?>
                    </li>
                </ul>

            </div>

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer(); ?>
