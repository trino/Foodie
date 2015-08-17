<div class="col-md-12">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-10  col-sm-9">
            <h3 class="sidebar__title">Newsletter</h3>
            <hr class="shop__divider">
            There are <?= count($Subscribers); ?> subscriber(s).
            <?php if(count($Subscribers)){ ?>
            <FORM METHOD="POST">
                <INPUT TYPE="hidden" name="action" value="newsletter.bypass">
                <INPUT TYPE="text" name="subject" placeholder="Subject" style="width:100%;">
                <textarea class="ckeditor form-control" name="newsletter" rows="6" placeholder="Type your newsletter here"></textarea>
                <INPUT TYPE="submit" style="float: right;">
            </FORM>
            <div class="clearfix  hidden-xs"></div>
            <?php } else {
                echo "<BR>Unable to send a newsletter without subscribers";
            }?>
        <hr class="shop__divider">
    </div>
</div>