<?php
$apiKey = "c6c392094e20cc3529492dce4f650f39"; //You will need to add in the 
$cityId = "5046997"; //5046997 Shakopee City Id
$units = "imperial"; //metric-Celcius  imperial-Farhenheit

if ($units == 'metric') { //Changes the $temp varaible to match 
    $temp = "C";
} else {
    $temp = "F";
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=" . $units . "&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<!DOCTYPE html>
<html lang="en">
<!--Version 5.0
    Name:
    Date Completed:
-->

<head>
    <title>JavaScript</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SHS WebDev JavaScript Practice">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- JavaScript -->
    <!-- These are needed to get the responsive menu to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="JS/script.js"></script>

    <!--↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Put your .js files here ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑-->

    <!-- Custom styles for this template -->
    <style type="text/css">
        .menu {
            margin: 0px;
        }

        .wideMargin {
            margin: 15px;
        }

        #footer {
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!---------------------------------- Begin the nav-bar ------------->
    <div class="menu">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="http://shakonet.isd720.com/WebDev" class="navbar-brand">WebDev</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <!--↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Edit These Items in your Menu ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓-->
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="#" class="nav-item nav-link">About Me</a>
                    <a href="#" class="nav-item nav-link disabled" tabindex="-1">Music</a>
                    <a href="#" class="nav-item nav-link disabled" tabindex="-1">Lists</a>
                    <a href="#" class="nav-item nav-link disabled" tabindex="-1">Games</a>
                    <a href="script.html" class="nav-item nav-link active" tabindex="-1">JavaScript</a>
                    <a href="mailto:sample@gmail.com?Subject=Hello" class="nav-item nav-link disabled" tabindex="-1">Contact</a>
                    <!--↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Edit These Items in your Menu ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑-->
                </div>
                <div class="navbar-nav ml-auto">
                    <a href="#" class="nav-item nav-link disabled">Login</a>
                </div>
            </div>
        </nav>
    </div>
    <!---------------------------------- End the nav-bar ------------->

    <main class="wideMargin" id="content">
        <h1 class="text-left my-3">My JavaScript Examples</h1><!-- Edit this line for the title of your page -->
        <!--↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Put your content below this line ↓↓↓↓↓↓↓↓↓↓↓↓↓↓-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-lg-12" style="background-color:yellow;">
                    <center>
                        <p id="textChange"> My name is Mr. M</p>
                    </center>
                </div>
                <div class="col-sm-4" style="background-color:orange;">
                    <center><button type="button" onclick="changeText()">Click if you like</button></center>
                </div>
                <div class="col-sm-4" style="background-color:yellow;">PUT YOUR CODE HERE</div>
            </div>
            <div class="row">
                <div class="col-sm-4" style="background-color:orange;">

                    <div class="report-container">
                        <h2><?php echo $data->name; ?> Weather Status</h2>
                        <div class="time">
                            <div><?php echo date("l g:i a", $currentTime); ?></div>
                            <div><?php echo date("F jS, Y", $currentTime); ?></div>
                            <div><?php echo ucwords($data->weather[0]->description); ?></div>
                        </div>
                        <div class="weather-forecast">
                            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;<?php echo $temp; ?>

                            <?php
                            if ($data->main->temp_max > "55") {
                                echo ("<style> .report-container{ background-color: blue;}</style>");
                            }
                            ?>
                        </div>
                        <div class="time">
                            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
                            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4" style="background-color:yellow;">PUT YOUR CODE HERE</div>
                <div class="col-sm-4" style="background-color:orange;">PUT YOUR CODE HERE</div>
            </div>
        </div>
    </main>
    <!--↑↑↑↑↑↑↑↑↑↑ Make sure all your content is above this line ↑↑↑↑↑↑↑↑↑↑-->


    <!---------------------------------- Begin the footer ------------->
    <div class="wideMargin" id="footer">
        <p>
            Webpage made by <a href="index.html" target="_blank">[your name]</a>
        </p>
    </div>
    <!---------------------------------- End the footer ------------->
</body>

</html>