var path = window.location.pathname;
if(path.replace('Foodie','')!=path)
var base_url = 'http://localhost/Foodie/';
else
var base_url = 'http://didyoueat.ca/';
function add_additional(id=0)
{
    $('.additional'+id).show();
    var c=0;
    $('.newaction').each(function(){
        c++;
        if(c!=1)
       $(this).html('<a href="javascript:void(0)" class="btn btn-danger removenormal" onclick="removemenu($(this))">Remove</a>'); 
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
    })
    //$('.additional'+id).load(base_url+'menus/additional?menu_id='+id);
}

function removemenu($_this)
{
    if(confirm('Are you sure you want to delete this item?'))
   $_this.closest('.menuwrapper').remove();
    
}
function removelast($_this)
{
    
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
            $(this).html('<a class="btn btn-info" onclick="add_additional(0);" href="javascript:void(0)">Add Additional Item</a>'+
                '<br>'+
                'OR'+
                '<br>'+
                '<a class="btn btn-info" href="javascript:void(0)">Save</a>');
                else
                $(this).html('<a class="btn btn-info" onclick="add_additional(0);" href="javascript:void(0)">Add Additional Item</a>'+
                '<br>'+
                'OR'+
                '<br>'+
                '<a class="btn btn-info" href="javascript:void(0)">Save</a><br/>'+
                
            'OR<br />'+
            '<a href="javascript:void(0)" class="btn btn-danger removelast" onclick="removelast($(this))">Remove</a>');
                
            $(this).show();
        }
        
    })
    
    }
    
}

