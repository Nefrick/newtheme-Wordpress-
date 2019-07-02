<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Search page
                <small>Secondary Text</small>
            </h1>

            <div class="card">
                <div class="card-content">
                    <h3><?php _e('Search', 'newtheme' ); ?></h3>
                    <?php get_search_form(); ?>
                    <hr>
                    <h4>
                        <?php _e('Search Results for', 'newtheme' ); ?>:
                        <span class="text-info"> <?php the_search_query(); ?></span>
                    </h4>
                </div>
            </div>

            <?php

            if( have_posts() ){
                while( have_posts() ){
                    the_post();
                    ?>
                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <?php
                        if( has_post_thumbnail() ) {
                            the_post_thumbnail( 'medium_large', ['class' => 'img-thumbnail'] );
                        }
                        ?>
                        <div class="card-body">
                            <?php the_title('<h2 class="card-title">', '</h2>'); ?>
                            <span>Posted at <?php the_time( 'g:i a' ); ?></span><br>
                            <span>Category: <?php the_category(','); ?></span>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php the_time('M d, Y'); ?> by
                            <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a>
                        </div>
                    </div>
                    <?php
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
