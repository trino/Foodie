var path = window.location.pathname;
if(path.replace('Foodie','')!=path)
var base_url = 'http://localhost/Foodie/';
else
var base_url = 'http://didyoueat.ca/';
function add_additional(id=0)
{
    $('.additional'+id).show();
    $('.newaction').each(function(){
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