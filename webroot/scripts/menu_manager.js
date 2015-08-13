var path = window.location.pathname;
if(path.replace('Foodie','')!=path)
var base_url = 'http://localhost/Foodie/';
else
var base_url = 'http://didyoueat.ca/';
function add_item()
{
    
    $('.addnew').show();
    $('.addnew').load(base_url+'menus/menu_form?menu_id=0',function(){
        ajaxuploadbtn('newbrowse0_1');
    });
    
    
}

function ajaxuploadbtn(button_id, doc) {
            var button = $('#' + button_id), interval;
            act = base_url+'menus/uploadimg';
            new AjaxUpload(button, {
                action: act,
                name: 'myfile',
                onSubmit: function (file, ext) {
                    button.text('Uploading...');
                    this.disable();
                    interval = window.setInterval(function () {
                        var text = button.text();
                        if (text.length < 13) {
                            button.text(text + '.');
                        } else {
                            button.text('Uploading...');
                        }
                    }, 200);
                },
                onComplete: function (file, response) {
                        //alert(response);
                        button.html('Browse');
                    
                    window.clearInterval(interval);
                    this.enable();
                    
                        $("."+button_id.replace('newbrowse','menuimg')).html('<img src="'+response+'" />');
                        //$('#client_img').val(response);
                    
//$('.flashimg').show();
                }
            });
        }
