<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>success</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        .container {
  position: relative;
  text-align: center;
  color: white;
}
        .centered {
            position: absolute;
            top: 100px;
            left: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
}
        img{
  display:block;
  width:100%; 
  height:100%;
  object-fit: cover;
}
html,body{
    margin:0;
    height:100%;
}
    </style>
</head>
<body >
    <div class="container">
        <div>
            
            <img src="{{ asset('avatar/success.jpg')}}"  >   
            <h1 class="centered" style="font-family:font-family: 'Open Sans', sans-serif;
            font-family: 'Roboto', sans-serif;">Амжилттай шинэчлэгдлээ</h1>
        </div>
        
    </div>
    
</body>
</html>