var path = window.location.pathname;
if(path.replace('Foodie','')!=path)
var base_url = 'http://localhost/Foodie/';
else
var base_url = 'http://didyoueat.ca/';
$('.add_additional').live('click',function(){
    
    var id = $(this).attr('id').replace('add_additional','').replace(';','');
    alert(id);
    $('.additional'+id).show();
    var c=0;
    $('.newaction').each(function(){
        c++;
        if(c!=1)
       $(this).html('<a href="javascript:void(0)" class="btn btn-danger removenormal">Remove</a>'); 
       else
       $(this).hide();
    });
    var ajax_load = '';
    $.ajax({
        url:base_url+'menus/additional?menu_id='+id,
        success:function(res)
        {
            $('.additional'+id).append(res);
        }
    });
})

$('.removenormal').live('click',function(){
    $_this = $(this);
     if(confirm('Are you sure you want to delete this item?'))
   $_this.closest('.menuwrapper').remove();
})

$('.removelast').live('click',function(){
  $_this= $(this);  
 var tot = $_this.closest('.newmenu').find('.newaction').length;
    var newmenu = $_this.closest('.newmenu').attr('id');
    //alert(tot);
    if(confirm('Are you sure you want to delete this item?')){
        $_this.closest('.menuwrapper').remove();
    var i=0;
    $('#'+newmenu+' .newaction').each(function(){
        i++;
        if(i==tot-1)
        {
            if(i==1)
            $(this).html('<a class="btn btn-info add_additional" id="add_additional0" href="javascript:void(0)">Add Additional Item</a>'+
                '<br>'+
                'OR'+
                '<br>'+
                '<a class="btn btn-info" href="javascript:void(0)">Save</a>');
                else
                $(this).html('<a class="btn btn-info add_additional" id="add_additional0" href="javascript:void(0)">Add Additional Item</a>'+
                '<br>'+
                'OR'+
                '<br>'+
                '<a class="btn btn-info" href="javascript:void(0)">Save</a><br/>'+
                
            'OR<br />'+
            '<a href="javascript:void(0)" class="btn btn-danger removelast">Remove</a>');
                
            $(this).show();
        }
        
    })
    
    }
    
});

