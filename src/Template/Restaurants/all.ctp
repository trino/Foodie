<div class="main">
<div class="col-md-8 col-sm-4">
    <?php
        if(!isset($restaurant)){
            $restaurant="";
        }
        $doHR=false;
    ?>
    <h2 class="col-md-12"><a href="#"><?php echo ucfirst(str_replace('-',' ',$restaurant));?></a> Menus</h2>
</div>
<div class="col-md-9 col-sm-9 blog-posts">
    <?php foreach($Restaurants as $Restaurant) {
        if($doHR){
            echo '<hr class="blog-post-sep">';
        }
        $doHR=true;
        ?>
    
        <div class="row" >
        <div class="col-md-4 col-sm-4">
            <img class="img-responsive" alt = "" src = "<?php echo $this->request->webroot;?>/img/works/img4.jpg">
        </div>
        <div class="col-md-8 col-sm-8">
            <h2><a href="<?php echo $this->request->webroot;?>restaurants/<?php echo $Restaurant->Slug;?>"><?= $Restaurant->Name; ?></a></h2>
            <ul class="blog-info">
                <li><i class="fa fa-calendar"></i> 25 / 07 / 2013</li>
                <li><i class="fa fa-comments"></i> 17</li>
                <li><i class="fa fa-tags"></i> Metronic, Keenthemes, UI Design </li>
            </ul>
            <p><?= $Restaurant->Description; ?></p>
            <a href = "blog-item.html" class="more"> Read more <i class="icon-angle-right"></i></a>
        </div>
    </div>
    <?php } ?>

    <hr class="blog-post-sep">
    <ul class="pagination">
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li class="active"><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>
</div>