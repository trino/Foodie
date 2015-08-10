<div class="sidebar col-md-2 col-sm-4 col-sm-4 col-xs-5">
    <h2>Find us on social media</h2>
    <div class="fb-page" data-href="https://www.facebook.com/testrestaurant1255" data-width="292" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
        <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/testrestaurant1255">
                <a href="https://www.facebook.com/testrestaurant1255">Test Restaurant</a>
            </blockquote>
        </div>
    </div>
    <?php
    $showgenres = false;
    if ($showgenres) {
        echo '<ul class="list-group margin-bottom-25 sidebar-menu">';
        foreach ($genres as $genre) {
            echo '<li class="list-group-item clearfix"><a href="' . $this->request->webroot . 'cuisine/';
            echo strtolower(str_replace(" ", "-", $genre));
            echo '"><i class="fa fa-angle-right"></i> ' . $genre . '</a></li>';
        }
        echo '</ul>';
    }
    ?>
</div>
          
          