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

    // $(document).ready(function() {
    //     $('a[href*=\\#]').on('click', function(e){
    //         e.preventDefault();
    //         $('html, body').animate({
    //             scrollTop : $(this.hash).offset().top
    //         }, 500);
    //     });
    // });
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

$("#like").click(function() {

    var url = "like.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#idForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
                var elem = document.getElementById('heart');
                elem.classList.remove('fa-heart-o');
                elem.classList.add('fa-heart');
           }
         });

    return false; // avoid to execute the actual submit of the form.
});

$("#nextBtn1").click(function () { 
    // e.preventDefault();

    var fullname = document.getElementById('fullname').value;

    if(fullname=="")
    {
        document.getElementById('redtext').style.display = 'block';
    }
    else
    {
        document.getElementById('stage2').style.display = 'block';
        document.getElementById('stage1').style.display = 'none';
    }
});

$("#nextBtn2").click(function () { 
    // e.preventDefault();
    var email = document.getElementById('email').value;
    if(email=="")
    {
        document.getElementById('redtext2').style.display = 'block';
    }
    else
    {
        document.getElementById('stage3').style.display = 'block';
        document.getElementById('stage2').style.display = 'none';
        document.getElementById('stage1').style.display = 'none';
    }
});

$("#nextBtn3").click(function () { 
    // e.preventDefault();
    var interest = document.getElementById('interest').value;
    var email = document.getElementById('email').value;
    var fullname = document.getElementById('fullname').value;

    if(interest=="")
    {
        document.getElementById('redtext3').style.display = 'block';
    }
    else
    {
        $.ajax({
            method: "POST",
            url: "functions/userfunc.php",
            data: {
                'freeBtn': true,
                'interest': interest,
                'email': email,
                'fullname': fullname,
            },
            success: function (response) {
                if(response=="Success")
                {
                    document.getElementById('stage3').style.display = 'none';
                    document.getElementById('stage2').style.display = 'none';
                    document.getElementById('stage1').style.display = 'none';
                    document.getElementById('success').style.display = 'flex';
                }
                else if(response=="Fail")
                {
                    document.getElementById('stage3').style.display = 'none';
                    document.getElementById('stage2').style.display = 'none';
                    document.getElementById('stage1').style.display = 'none';
                    document.getElementById('failed').style.display = 'flex';
                }
                else
                {
                    document.getElementById('stage3').style.display = 'none';
                    document.getElementById('stage2').style.display = 'none';
                    document.getElementById('stage1').style.display = 'none';
                    document.getElementById('failed').style.display = 'flex';
                }
            }
        });
    }
});