<div class="sidebar col-md-2 col-sm-4">
    <ul class="list-group margin-bottom-25 sidebar-menu">
        <?php foreach($genres as $genre){
            echo '<li class="list-group-item clearfix"><a href="' . $this->request->webroot . 'cuisine/';
            echo strtolower(str_replace(" ", "-", $genre));
            echo '"><i class="fa fa-angle-right"></i> ' . $genre . '</a></li>';
        } ?>
    </ul>
    <h2>Find Us in Facebook</h2>
    <div class="fb-page" data-href="https://www.facebook.com/testrestaurant1255" data-width="292" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
        <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/testrestaurant1255">
                <a href="https://www.facebook.com/testrestaurant1255">Test Restaurant</a>
            </blockquote>
        </div>
    </div>
</div>
          
          