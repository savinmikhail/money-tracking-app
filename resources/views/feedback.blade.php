<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>feedback</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
        <div class="container">
            <h1>Feedback</h1>
            <form id="mailForm">
                @csrf

                <input type="email" id="email" name="email" placeholder="email" class="form-control"><br>
                <input type="text" id="name" name="name" placeholder="name" class="form-control"><br>
                <input type="phone" id="phone" name="phone" placeholder="phone" class="form-control"><br>
                <textarea name="message" id="message" placeholder="message" class="form-control"></textarea><br>
                <button type="button" id="sendMail" class="btn btn-success">Send</button>
            </form>
            <div id="errorMessage"></div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#sendMail").on('click', function (){
            var email = $("#email").val().trim();
            var name = $("#name").val().trim();
            var phone = $("#phone").val().trim();
            var message = $("#message").val().trim();

            if(email === ""){
                $('#errorMessage').text('Enter email');
                return false;
            }else if(name === ""){
                $('#errorMessage').text('Enter name');
                return false;
            }else if(phone === ""){
                $('#errorMessage').text('Enter phone');
                return false;
            }else  if(message.length < 5){
                $('#errorMessage').text('Enter valid message');
                return false;
            }

            $('#errorMessage').text("");

            $.ajax({
                // url: '/resources/views/mail.php',
                // url: './mail.php',
                url: 'mail',
                type: 'get',
                cache: false,
                data: {'name': name, 'email': email, 'phone': phone, 'message':message},
                datatype: 'html',
                beforeSend: function () {
                  $('#sendMail').prop('disabled', true);
                },
                succes: function (data){
                    if(!data)
                        alert('message hasnt been sent');
                    else
                        $('#mailForm').trigger('reset');

                    $('#sendMail').prop('disabled', false);
                }
            })
        });
    </script>
</body>
</html>
