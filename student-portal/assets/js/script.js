// $(function () {
//     const active = document.querySelectorAll('.inactive');

//     active.forEach(item => {
//         item.addEventListener('click', () => {
//             document.querySelector('.active')?.classList.remove('active');
//             item.classList.add('active');
//         });
//     });
// });

  $(function() {  
    $("#activeBtn").click(function() {
        document.getElementById('mobilesidebar').style.display = 'flex';
    })

    $("#closeBtn").click(function() {
      document.getElementById('mobilesidebar').style.display = 'none';
  })

    $("#btcBtn").click(function() {
        document.getElementById('btc').style.display = 'block';
        document.getElementById('cards').style.display = 'none';
        document.getElementById('biller').style.display = 'none';

        document.getElementById('btcBtn').classList.add('active');
        document.getElementById('cardsBtn').classList.remove('active');
        document.getElementById('billBtn').classList.remove('active');
    })

    $("#cardsBtn").click(function() {
        document.getElementById('btc').style.display = 'none';
        document.getElementById('cards').style.display = 'block';
        document.getElementById('biller').style.display = 'none';

        document.getElementById('btcBtn').classList.remove('active');
        document.getElementById('cardsBtn').classList.add('active');
        document.getElementById('billBtn').classList.remove('active');
    })

    $("#billBtn").click(function() {
        document.getElementById('btc').style.display = 'none';
        document.getElementById('cards').style.display = 'none';
        document.getElementById('biller').style.display = 'block';

        document.getElementById('btcBtn').classList.remove('active');
        document.getElementById('cardsBtn').classList.remove('active');
        document.getElementById('billBtn').classList.add('active');
    })

    $('.theInput').attr('disabled', 'disabled')

    $("#makeChanges").click(function() {
        $(".theInput").prop('disabled', false);
        document.getElementById('saveBtn').style.display = 'block';
        document.getElementById('makeChanges').style.display = 'none';
    })

    // setTimeout(function(){
    //     document.getElementById('fade').classList.add('hidden');
    // },4000);

    function delay() {
        window.onload = function() {
          setTimeout(function() {
            document.getElementById("fade").style.display = "block";
          }, 1000);
        }
      }
      
    delay();

    $("#status-off").click(function() {
        document.getElementById('status-on').style.display = 'block';
        document.getElementById('status-off').style.display = 'none';
        document.getElementById('status').value = 'Hide';
    })

    $("#status-on").click(function() {
        document.getElementById('status-on').style.display = 'none';
        document.getElementById('status-off').style.display = 'block';
        document.getElementById('status').value = 'Show';
    })

    $("#closeModal").click(function() {
        document.getElementById('modalContainer').style.display = 'none';
    }) 

    $("#uploadProofofPaymentModal").click(function() {
        document.getElementById('modalContainer').style.display = 'flex';
    }) 

    $(".createUnit").click(function(e) {
      e.preventDefault();

        var unit_name = document.getElementById('unit_name').value;
        var unit_desc = document.getElementById('unit_desc').value;
        var status = document.getElementById('status').value;

        var path = window.location.pathname; // path only

        // window.location = url+"units";

        $.ajax({
          method: "POST",
          url: "../functions/adminfunc.php",
          data: {
              'create_unit': true,
              'unit_name': unit_name,
              'unit_desc': unit_desc,
              'status': status,
          },
          success: function (response) {
            location.reload()
          }
        });
    })

    // $("#generateotp").click(function(e) {
    //   e.preventDefault();

    //     var email = document.getElementById('email').value;

    //     $.ajax({
    //       method: "POST",
    //       url: "../functions/studentfunc.php",
    //       data: {
    //           'generateotp': true,
    //           'email': email,
    //       },
    //       success: function (response) {
            
    //           if(response == '200')
    //           {
    //               document.getElementById("message_div").style.display="block";
    //               document.getElementById("alert").innerHTML= "<i class='fa fa-warning'> User Not Found</i>";
    //           }
    //           else
    //           {
    //               document.getElementById("otpfield").style.display="flex";
    //               document.getElementById("verify").style.display="block";
    //               document.getElementById("generateotp").style.display="none";
    //               document.getElementById("message_div").style.display="none";
    //           }
    //       }
    //     });
    // })

    $("#verify").click(function(e) {
      e.preventDefault();

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var cpassword = document.getElementById('cpassword').value;

        $.ajax({
          method: "POST",
          url: "../functions/studentfunc.php",
          data: {
              'verify': true,
              'email': email,
              'password': password,
              'cpassword': cpassword,
          },
          success: function (response) {
            
              if(response == '200')
              {
                  document.getElementById("message_div").style.display="block";
                  document.getElementById("alert").innerHTML= "<i class='fa fa-warning'> Invalid OTP</i>";
              }
              else
              {
                  document.getElementById("message_div").style.display="none";
                  window.location.href = 'index.php';
                  // alert (response);
              }
          }
        });
    })
});