<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css"/>
    <title>Document</title>
</head>
<body>
    <p class="back-to-top"><img src="img/back_top.png" alt=""></p>
    <script>
        $(window).scroll(function(){
		if($(this).scrollTop()>100){
			$(".back-to-top").fadeIn();
		}else{
			$(".back-to-top").fadeOut();
		}
        });
        $(".back-to-top").click(function(){
            $("html, body").animate({scrollTop:0},1000)
        })
    </script>
</body>
</html>