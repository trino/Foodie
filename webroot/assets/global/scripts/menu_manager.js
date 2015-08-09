var path = window.location.pathname;
if(path.replace('Foodie','')!=path)
var base_url = 'http://localhost/Foodie/';
else
var base_url = 'http://didyoueat.ca/';
function add_item()
{
    
    $('.addnew').show();
    $('.addnew').load(base_url+'menus/menu_form?menu_id=0');
}
