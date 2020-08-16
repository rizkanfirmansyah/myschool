
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>500 Internal Server Error</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One:900" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<style type="text/css">
    * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 750px;
  width: 100%;
  padding-left: 170px;
  line-height: 1.4;
}

.notfound .notfound-500 {
  position: absolute;
  left: 0;
  top: 0;
  width: 150px;
  height: 150px;
}

.notfound .notfound-500 h1 {
  font-family: 'Passion One', cursive;
  color: #00DFC1;
  font-size: 100px;
  letter-spacing: 12.5px;
  margin: 0px;
  font-weight: 900;
  position: absolute;
  left: 50%;
  right: -20%;
  top: 300%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound h2 {
  font-family: 'Raleway', sans-serif;
  color: #292929;
  font-size: 28px;
    font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  margin-top: 0;
}

.notfound p {
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  font-weight: 400;
  margin-top: 0;
  margin-bottom: 15px;
  color: #333;
}

.notfound a {
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  text-decoration: none;
  text-transform: uppercase;
  background: #fff;
  display: inline-block;
  padding: 15px 30px;
  border-radius: 40px;
  color: #292929;
  font-weight: 700;
  -webkit-box-shadow: 0px 4px 15px -5px rgba(0, 0, 0, 0.3);
          box-shadow: 0px 4px 15px -5px rgba(0, 0, 0, 0.3);
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound a:hover {
  color: #fff;
  background-color: #00DFC1;
}

.img-notfound{
    width: 70%;
}

@media only screen and (max-width: 480px) {
  .notfound {
    text-align: center;
  }
  .notfound .notfound-500 {
    position: relative;
    width: 100%;
    margin-bottom: 15px;
  }
  .notfound {
    padding-left: 15px;
    padding-right: 15px;
  }
  

}
@media only screen and (max-width: 900px) {
    .notfound .notfound-500 h1 {
          top: 180%;
        }
  }

</style>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="text-center">
                <img src="<?= base_url('assets/img/img-logo/internal-server-error.jpg') ?>" class="img-notfound">                
            </div>
            <div class="notfound-500">
                <h1>:(</h1>
            </div>
            <h2>500 - Internal Server Error</h2>
            <p>Maaf atas ketidaknyamanan pengguna, halaman sedang diperbaiki silahkan kembali ke halaman sebelumnya atau hubungi admin segera.</p>
            <a href="<?= base_url(''); ?>">home page</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
