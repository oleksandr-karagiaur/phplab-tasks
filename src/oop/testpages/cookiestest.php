<?php
session_start();
require_once '../CookiesController.php';
require_once '../RequestController.php';
$cookiesInstance = new Cookies();
$requestInstance = new Request();
$cookieKey1 = $requestInstance->get('key1');
$cookieValue1 = $requestInstance->get('value1');
$cookieKey2 = $requestInstance->get('key2');
$cookieValue2 = $requestInstance->get('value2');
$cookieKey3 = $requestInstance->get('key3');
$cookieValue3 = $requestInstance->get('value3');
$cookieRemove = $requestInstance->get('removecookie');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies methods demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../styles/style.css">
</head>
<body id="cooktestpage">
<h2 class="display-4 ml-2 mt-2">Cookie methods</h2>
<div class="container-fluid shadow bg-white rounded my-4 py-3">
<div class="container-fluid">
<h6 class="diplay-6 font-weight-bold mb-3">Add cookies data</h6>
<form action="" method="GET">
    <div class="form-row">
    <label>Cookies set1
    <input type="text" name="key1" required placeholder="Input cookies key1">
    <input type="text" name="value1" required placeholder="Input cookies value1"></label>
    </div>
    <div class="form-row">
    <label>Cookies set2
    <input type="text" name="key2" required placeholder="Input cookies key2">
    <input type="text" name="value2" required placeholder="Input cookies value2"></label>
    </div>
    <div class="form-row">
    <label>Cookies set3
        <input type="text" name="key3" required placeholder="Input cookies key3">
        <input type="text" name="value3" required placeholder="Input cookies value3"></label>
        </div>
        <div class="form-row">
    <button type="submit" class="btn btn-primary" style="margin-left:35%;" >Submit cookies sets</button>
        </div>
</form>
</div>
<div class="container-fluid pt-3">
<h6 class="display-6 font-weight-bold">Remove cookie</h6>
    <div class="form-group">
<form action="" method="GET">
    <div class="form-row">
    <label>Remove cookie by key
    <input type="text" name="removecookie" placeholder="Remove cookie"></label>
    </div>
    <div class="form-row">
    <button type="submit" class="btn btn-primary btn-sm" style="margin-left:35.4%;">Submit cookie removal</button>
    </div>
</form>
    </div>
</div>
</div>
<?php
if (isset($cookieRemove)) {
    $cookiesInstance->remove($cookieRemove);
}
?>
<div class="container-fluid shadow-sm bg-white rounded my-4 py-3">
<div class="container-fluid">
    <span data-toggle="tooltip" data-placement="top" title="Returns $_COOKIE value by key and $default if key does not exist">get</span>
</div>
<div class="container-fluid">
<?php
if (isset($cookieKey1) && isset($cookieValue1)) {
    $cookiesInstance->set($cookieKey1, $cookieValue1);
    echo 'Value for key1: ' . $cookiesInstance->get($cookieKey1);
    echo "<br>";
}
if (isset($cookieKey2) && isset($cookieValue2)) {
    $cookiesInstance->set($cookieKey2, $cookieValue2);
    echo 'Value for key2: ' . $cookiesInstance->get($cookieKey2);
    echo "<br>";
}
if (isset($cookieKey3) && isset($cookieValue3)) {
    $cookiesInstance->set($cookieKey3, $cookieValue3);
    echo 'Value for key3: ' . $cookiesInstance->get($cookieKey3);
    echo "<br>";
}
?>
</div>
<div class="container-fluid mt-3">
    <span data-toggle="tooltip" data-placement="top" title="Returns all $_COOKIES in the associative array">all</span>
</div>
<div class="container-fluid">
<?php
echo "<pre>";
print_r($cookiesInstance->all());
echo "</pre>";
?>
</div>
<div class="container-fluid">
    <span data-toggle="tooltip" data-placement="top" title="Return true if $key exists in $_COOKIES">has</span>
</div>
<div class="container-fluid">
<?php
if (isset($cookieKey1) && $cookiesInstance->has($cookieKey1)) {
    echo 'True for key1';
    echo "<br>";
} else {
    echo 'False for key1';
    echo "<br>";
}
if (isset($cookieKey2) && $cookiesInstance->has($cookieKey2)) {
    echo 'True for key2';
    echo "<br>";
} else {
    echo 'False for key2';
    echo "<br>";
}
if (isset($cookieKey3) && $cookiesInstance->has($cookieKey3)) {
    echo 'True for key3';
    echo "<br>";
} else {
    echo 'False for key3';
    echo "<br>";
}
?>
</div>
<a class="btn btn-primary btn-sm" style="margin-left:33.2%;" href="<?php $cookiesInstance->clearAllCookies(); echo 'cookiestest.php' ?>">Clear all cookies and reset URL</a>
</div>
<a class="btn btn-light btn-sm mb-5" style="margin-left:60%;" href="../index.php">Return to main menu</a>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>