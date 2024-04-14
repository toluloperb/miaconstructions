$(function() {
    $('#menuBtn').click(function() {
        document.getElementById('mobile_menu_container').style.display = 'flex';
        document.getElementById('menuBtnClose').style.display = 'block';
        document.getElementById('menuBtn').style.display = 'none';
    })

    $('#menuBtnClose').click(function() {
        document.getElementById('mobile_menu_container').style.display = 'none';
        document.getElementById('menuBtnClose').style.display = 'none';
        document.getElementById('menuBtn').style.display = 'block';
    })
});