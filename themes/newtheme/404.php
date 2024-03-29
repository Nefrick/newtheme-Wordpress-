<?php
get_header();
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <article class="card">
                    <div class="card-content"  style="padding: 100px;">
                        <h1 class="text-center text-danger">
                            <svg height="64" class="octicon octicon-issue-opened" viewBox="0 0 14 16" version="1.1" width="56" aria-hidden="true"><path fill-rule="evenodd" d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg>
                            <?php _e( '404! Page not found!', 'newtheme'); ?>
                        </h1>
                    </div>
                </article>

            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

<?php
get_footer();

