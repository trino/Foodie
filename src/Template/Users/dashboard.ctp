
    <!-- Big banner -->
    <div class="col-md-12 col-xs-12">
    <div class="row content-page">
        <div class="col-xs-12">
            <div class="">

            </div>
        </div>
 
  <div class="col-md-12 no-padding">
    <?php echo $this->element('user_menu');?>

    <div class="col-xs-12 col-md-9  col-sm-8 no-padding">
      <div class="deleteme">
        <!--<ul class="pagination  shop__amount-filter">
          <li>
            <a class="shop__amount-filter__link  hidden-xs" href="shop.html"><span class="glyphicon glyphicon-th"></span></a>
          </li>
          <li>
              <a class="shop__amount-filter__link  hidden-xs" href="shop-list-view.html"><span class="glyphicon glyphicon-th-list"></span></a>
          </li>
        </ul>-->
        <?php /*
        <div class="shop__sort-filter">
          <select class="js--isotope-sorting  btn  btn-shop">
              <option value='{"sortBy":"price", "sortAscending":"true"}'>By Price (Low to High) &uarr;</option>
              <option value='{"sortBy":"price", "sortAscending":"false"}'>By Price (High to Low) &darr;</option>
              <option value='{"sortBy":"name", "sortAscending":"true"}'>By Name (Low to High) &uarr;</option>
              <option value='{"sortBy":"name", "sortAscending":"false"}'>By Name (High to Low) &darr;</option>
              <option value='{"sortBy":"rating", "sortAscending":"true"}'>By Rating (Low to High) &uarr;</option>
              <option value='{"sortBy":"rating", "sortAscending":"false"}'>By Rating (High to Low) &darr;</option>
          </select>
        </div>
        <?php */?>
        <h3 class="sidebar__title">User Manager</h3>
        <hr class="shop__divider">
        <div class="dashboard">
            <?php echo $this->element('user_info');?>       
        </div>
            
          
          <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
        <div class="row margin-bottom-30">
            <div class="col-md-5">
                <img class="img-responsive" alt="" src="<?php echo $this->request->webroot; ?>/img/works/img4.jpg">
            </div>
            <div class="col-md-7">
                <h2>Our Money For Your Meal!</h2>
                <p>
                    Receive a $5 credit just for uploading a photo of your meal to our site! Remember, the meal has to be from one of our prestigious restaurants listed
                </p>
                <?= $this->Html->link(
                    'Upload Image',
                    '/users/images',
                    ['class' => 'btn btn-success']
                );?>
            </div>
        </div>
        <?php /*<div class="shop__pagination">
          <ul class="pagination">
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
          </ul>
        </div><?php */?>
      </div>
    </div>
</div>
</div>