<?php
require_once '../SessionController.php';
require_once '../RequestController.php';
session_start();
$sessionInstance = new Session();
$requestInstance = new Request();
$sessionKey1 = $requestInstance->get('key1');
$sessionValue1 = $requestInstance->get('value1');
$sessionKey2 = $requestInstance->get('key2');
$sessionValue2 = $requestInstance->get('value2');
$sessionKey3 = $requestInstance->get('key3');
$sessionValue3 = $requestInstance->get('value3');
$sessionRemove = $requestInstance->get('removesessionvalue');
$sessClear = $requestInstance->get('sessionclear');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session methods demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../styles/style.css">
</head>
<body id="sestestpage">
<h2 class="display-4 ml-2 mt-2">Session methods</h2>
<div class="container-fluid shadow bg-white rounded my-4 py-3">
<div class="container-fluid">
<h6 class="display-6 font-weight-bold mb-3">Add data to session</h6>
<form action="" method="GET">
    <div class="form-row">
    <label>Session set1
        <input type="text" name="key1" placeholder="Input session key1">
        <input type="text" name="value1" placeholder="Input session value1"></label>
    </div>
    <div class="form-row">
    <label>Session set2
        <input type="text" name="key2" placeholder="Input session key2">
        <input type="text" name="value2" placeholder="Input session value2"></label>
    </div>
    <div class="form-row">
    <label>Session set3
        <input type="text" name="key3" placeholder="Input session key3">
        <input type="text" name="value3" placeholder="Input session value3"></label>
    </div>
    <div class="form-row">
    <button type="submit" class="btn btn-primary" style="margin-left:34.6%;">Submit session sets</button>
    </div>
</form>
</div>
<div class="container-fluid pt-3">
<h6 class="display-6 font-weight-bold">Remove session</h6>
    <div class="form-group">
<form action="" method="GET">
    <div class="font-row">
    <label>Remove session value
        <input type="text" name="removesessionvalue" placeholder="Remove session value"></label>
    </div>
    <div class="font-row">
    <button type="submit" class="btn btn-primary btn-sm" style="margin-left:33.3%;">Remove value from session</button>
    </div>
</form>
    </div>
</div>
<?php
if (isset($sessionRemove)) {
    $sessionInstance->remove($sessionRemove);
}
?>
</div>
<div class="container-fluid shadow-sm bg-white rounded mt-4 mb-2 py-3">
<div class="container-fluid">
    <span data-toggle="tooltip" data-placement="top" title="Returns $_SESSION value by key and $default if key does not exist">get</span>
</div>
<div class="container-fluid">
<?php
if (isset($sessionKey1) && isset($sessionValue1)) {
    $sessionInstance->set($sessionKey1, $sessionValue1);
    echo 'Value for key1: ' . $sessionInstance->get($sessionKey1);
    echo "<br>";
}
if (isset($sessionKey2) && isset($sessionValue2)) {
    $sessionInstance->set($sessionKey2, $sessionValue2);
    echo 'Value for key2: ' . $sessionInstance->get($sessionKey2);
    echo "<br>";
}
if (isset($sessionKey3) && isset($sessionValue3)) {
    $sessionInstance->set($sessionKey3, $sessionValue3);
    echo 'Value for key3: ' . $sessionInstance->get($sessionKey3);
    echo "<br>";
}
?>
</div>
<div class="container-fluid mt-3">
    <span data-toggle="tooltip" data-placement="top" title="Returns all $_SESSION in the associative array">all</span>
</div>
<div class="container-fluid">
<?php
echo "<pre>";
print_r($sessionInstance->all());
echo "</pre>";
?>
</div>
<div class="container-fluid">
    <span data-toggle="tooltip" data-placement="top" title="Returns true if $key exists in $_SESSION">has</span>
</div>
<div class="container-fluid">
<?php
if (!empty($sessionKey1) && $sessionInstance->has($sessionKey1)) {
    echo 'True for key1';
    echo "<br>";
} else {
    echo 'False for key1';
    echo "<br>";
}
if (!empty($sessionKey2) && $sessionInstance->has($sessionKey2)) {
    echo 'True for key2';
    echo "<br>";
} else {
    echo 'False for key2';
    echo "<br>";
}
if (!empty($sessionKey3) && $sessionInstance->has($sessionKey3)) {
    echo 'True for key3';
    echo "<br>";
} else {
    echo 'False for key3';
    echo "<br>";
}
?>
<p class="mt-3">Destroy session</p>
<form action="" method="GET">
    <button type="submit" name="sessionclear" class="btn btn-primary btn-sm" style="margin-left:39.3%;">Clear session</button>
</form>
</div>
<?php
if (isset($sessClear)) {
    $sessionInstance->clear();
    header ('Location: sessiontest.php');
    exit;
}
?>
</div>
<a class="btn btn-light btn-sm mb-5" style="margin-left:60%;" href="../index.php">Return to main menu</a>
<script>
    $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>