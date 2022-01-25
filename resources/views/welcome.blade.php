<html>
<style type="text/css">
    
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Raleway', sans-serif;
}
.banner{
    width: 100%;
    height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0 ,0, 0.3)),
    url(images/background2.jpg);
    background-size: cover;
    background-position: center;
}
.navbar{
    display: flex;
    padding: 2% 6%;
    justify-content: space-between;
    margin-left: 10%;
    margin-top: 30%;
}
.logo{
    width: 35px;
    height: 35px;
}
button{
    width: 180px;
    font-size: 15px;
    padding: 15px 0;
    text-align: center;
    background: transparent;
    border: 2px solid #fffaff;
    border-radius: 25px;
    margin: 20px 10px;
    color: #fffaff;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
span{
    background: #C4A484;
    height: 100%;
    width: 0;
    border-radius: 25px;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index:-1;
    transition: 0.5s;
}
button:hover span{
    width: 100%;
}
button:hover{
    border: none;
}
.nav-links{
    flex: 1;
    text-align: right;
}
.nav-links ul li{
    list-style: none;
    display: inline-block;
    padding: 8px 12px;
    position: relative;
}
.nav-links ul li a{
    color: #ffff;
    text-decoration: none;
    font-size: 15px;
}
.nav-links ul li::after{
    content: '';
    width: 0%;
    height: 2px;
    background: #fffaff;
    display: block;
    margin: auto;
    transition: 0.35s;
}
.nav-links ul li:hover::after{
    width: 100%;
}
.text-box{
    width: 100%;
    margin: 0%;
    color: #fffaff;
    text-align: justify;
    text-align: center;
    position: absolute;
    top: 25%;
    left: 65%;
    transform: translate(-65%,25%);
}
.para1{
    font-size: 25px;
    margin: 1px;
    padding: 10px;
    font-family: 'Raleway', sans-serif;
}

/*----------------------------------------End of Part 1---------------------------------------*/

.content{
    width: 50%;
    margin: auto;
    padding-top: 80px;
    text-align: center;
    justify-content: center;
}
.title{
    font-size: 50px;
    font-family: 'Helvetica', sans-serif;
    margin: 20px;
    font-weight: 800;
}
.row{
    margin-top: 5%;
    display: flex;
    justify-content: space-between;
}
.col{
    flex-basis: 31%;
    background:rgb(173, 252, 177);
    border-radius: 10px;
    margin-bottom: 5%;
    padding: 20px 12px;
    box-sizing: border-box;
    justify-content: space-between;
    cursor: pointer;
    transition: 0.5s;
    display: inline-block;
    background-size: cover;
    background-position: center;

}

body{
    background: linear-gradient(#c4a484, rgb((232,199,200)));
    background-size: cover;
    background-position: center;
}

</style>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IIUM STUDENT FORUM</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;1,200&family=Oswald:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
      <section class="banner">
       

    <div class="text-box">
            <h1 class="title"><b>IIUM STUDENT FORUM</b></h1>
            <p class="para1">Where IIUM students can discuss anything that may pique
            <br>public interest publicly and exchange messages to socialise with one another.</p>

            <a href="{{ route('login') }}" target="_blank">
              <button type="button"><span></span><b>LOG IN</b></button></a>
              
            <a href="{{ url('/forum') }}" target="_blank">
             <button type="button"><span></span><b>GUEST MODE<b></button></a>
            </section>
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/forum') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
</body>
</html>
