function showHide(id) {
    var el = document.getElementById(id);
    if( el && el.style.display == 'none')    
        el.style.display = 'block';
    else 
        el.style.display = 'none';
}