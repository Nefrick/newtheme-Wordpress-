<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" class="form-inline md-form mr-auto">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="s" id="search" aria-label="Search"
           value="<?php the_search_query(); ?>">
    <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit">Search</button>
</form>