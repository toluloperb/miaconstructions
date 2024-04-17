$(document).ready(function () {
    setInterval(function(){
        $('#content').load(window.location.href + " #content > *");
    }, 1000);
});

$(document).ready(function () {
    setInterval(function(){
        $('#content').load(window.location.href + " #content > *");
    }, 1000);

    $('#addnewCustomer').click(function() {
        document.getElementById('addnewForm').style.display = 'block';
        document.getElementById('closeFormBtn').style.display = 'block';
        document.getElementById('addnewCustomer').style.backgroundColor = '#55555588';
        document.getElementById('sendBulkEmailForm').style.display = 'none';
        document.getElementById('sendBulkEmail').style.backgroundColor = 'red';
    })

    $('#closeFormBtn').click(function() {
        document.getElementById('addnewForm').style.display = 'none';
        document.getElementById('closeFormBtn').style.display = 'none';
        document.getElementById('addnewCustomer').style.backgroundColor = '#960044';
    })

    $('#sendBulkEmail').click(function() {
        document.getElementById('sendBulkEmailForm').style.display = 'block';
        document.getElementById('closeEmailFormBtn').style.display = 'block';
        document.getElementById('sendBulkEmail').style.backgroundColor = '#55555588';
        document.getElementById('addnewForm').style.display = 'none';
        document.getElementById('addnewCustomer').style.backgroundColor = '#960044';
    })

    $('#closeEmailFormBtn').click(function() {
        document.getElementById('sendBulkEmailForm').style.display = 'none';
        document.getElementById('closeEmailFormBtn').style.display = 'none';
        document.getElementById('sendBulkEmail').style.backgroundColor = 'red';
    })

    $('#sendEmail').click(function() {
        document.getElementById('d').style.display = 'none';
        document.getElementById('emailBox').style.display = 'block';
    })

    $('#specialBtnSingle').click(function() {
        document.getElementById('d').style.display = 'flex';
        document.getElementById('emailBox').style.display = 'none';
    })

    $('#smsBtn').click(function() {
        document.getElementById('smsAlert').style.display = 'flex';
        $("#smsAlert").fadeOut(3000)
    })

    $('#smsSBtn').click(function() {
        document.getElementById('smsAlert').style.display = 'flex';
        $("#smsAlert").fadeOut(3000)
    })

    setTimeout(function(){
        $("#alert").fadeOut(3000)
    }, 2000)

    $('#addnewUpdate').click(function() {
        document.getElementById('newPost').style.display = 'flex';
    })

    $('#closePostFormBtn').click(function() {
        document.getElementById('newPost').style.display = 'none';
    })

    $('#editPostBtn').click(function() {
        document.getElementById('editPost').style.display = 'flex';
    })

    $('#closePostEditBtn').click(function() {
        document.getElementById('editPost').style.display = 'none';
    })
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function InsertBreak(e){
    //check for return key=13
    if (parseInt(e.keyCode)==13) {
        //get textarea object
        var objTxtArea;
        objTxtArea = document.getElementById("test");
        
        //insert the existing text with the <br>
        objTxtArea.innerText=objTxtArea.value+"<br>";
    }

}

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

