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

    $('#cate_button').click(function() {
        document.getElementById('projectsmenus').style.display = 'flex';
        document.getElementById('cate_button_close').style.display = 'flex';
        document.getElementById('cate_button').style.display = 'none';
    })

    $('#cate_button_close').click(function() {
        document.getElementById('projectsmenus').style.display = 'none';
        document.getElementById('cate_button_close').style.display = 'none';
        document.getElementById('cate_button').style.display = 'flex';
    })
});

$("input").change(function (){
    var value = this.value;
    if(value=="")
    {
        $(this).css("border", "2px solid red");
    }
    else
    {
        $(this).css("border",'2px solid green');
    }
}).trigger("change");

$("textarea").change(function (){
    var value = this.value;
    if(value=="")
    {
        $(this).css("border", "2px solid red");
    }
    else
    {
        $(this).css("border",'2px solid green');
    }
}).trigger("change");

$("select").change(function (){
    var value = this.value;
    if(value=="")
    {
        $(this).css("border", "2px solid red");
    }
    else
    {
        $(this).css("border",'2px solid green');
    }
}).trigger("change");