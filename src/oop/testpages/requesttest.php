<?php
session_start();
require_once '../RequestController.php';
require_once '../CookiesController.php';
require_once '../SessionController.php';
$requestInstance = new Request();
$cookiesInstance = new Cookies();
$sessionInstance = new Session();
$cookKey = $requestInstance->get('cookiekey');
$cookValue = $requestInstance->get('cookievalue');
$sessKey = $requestInstance->get('sessionkey');
$sessValue = $requestInstance->get('sessionvalue');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request methods demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../styles/style.css">
</head>
<body id="reqtestpage">
<h2 class="display-4 ml-2 mt-2">Request methods</h2>
<div id="reqmain" class="container-fluid shadow bg-white rounded">
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-5">
<form action="" method="GET">
    <label for="nameInput" id="gValue">Value for GET request</label>
        <input type="text" name="getInput" placeholder="enter Get value">
    <button type="submit" class="btn btn-primary btn-sm gp-sub-btn">Submit</button>
</form>
        </div>
        <div class="form-group col-md-7">
    <?php
    echo $query = $requestInstance->query('getInput');
    ?>
    </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-5">
<form action="" method="POST">
    <label for="postInput">Value for POST request</label>
        <input type="text" name="postInput" placeholder="enter Post value">
    <button type="submit" class="btn btn-primary btn-sm gp-sub-btn">Submit</button>
</form>
        </div>
        <div class="col-md-7">
    <?php
    echo $request = $requestInstance->post("postInput"); ?>
</div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
<span data-toggle="tooltip" data-placement="top" title="Returns $_GET or $_POST parameter by $key. If both are present - return $_POST. If both are empty - return $default">get and post</span>
        </div>
        <div class="col-md-7">
<?php
if (isset($query) && isset($request) || isset($request)) {
    $key = "postInput";
} elseif (isset($query)) {
    $key = "getInput";
} else {
    $key = null;
}
echo $requestInstance->get($key);
?>
        </div>
    </div>
</div>
<div class="container-fluid">
<span data-toggle="tooltip" data-placement="top" title="Returns all $_GET + $_POST parameters in the associative array">all</span>
<?php
if (isset($key)) {
    echo "<pre>";
    print_r($requestInstance->all());
    echo "</pre>";
}
?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
<span data-toggle="tooltip" data-placement="top" title="Returns true if $key exists in $_GET or $_POST">has</span>
        </div>
        <div class="col-md-7">
<?php
if (isset($key) && $requestInstance->has($key)) {
    echo 'True';
} else {
    echo 'False';
}
?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
<span data-toggle="tooltip" data-placement="top" title="returns users IP">ip</span>
        </div>
        <div class="col-md-7">
<?php echo $requestInstance->ip(); ?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
<span data-toggle="tooltip" data-placement="top" title="Returns users browser User Agent">User Agent</span>
        </div>
        <div class="col-md-7">
<?php echo $requestInstance->userAgent(); ?>
        </div>
    </div>
</div>
<a class="btn btn-primary btn-sm" style="margin-left:78%;" href="<?php $requestInstance->clearQuery(); $requestInstance->clearPost();  echo "requesttest.php" ?>">Clear GET/POST data</a>
</div>
<div class="container-fluid shadow bg-white rounded my-3 py-2">
<h4 class="display-6">Cookies object</h4>
    <p class="py-2">Add cookies</p>
<form action="" method="GET">
    <div class="form-row">
        <div class="col-auto">
    <label>Add cookie key</label>
        <input type="text" name="cookiekey" placeholder="Cookie key">
        </div>
        <div class="col-auto">
    <label>Add cookie value</label>
        <input type="text" name="cookievalue" placeholder="Cookie value">
        </div>
            <div class="col-auto">
    <button type="submit" class="btn btn-primary btn-sm">Submit cookie</button>
    </div>
    </div>
</form>
<?php
if (isset($cookKey) && isset($cookValue)) {
    $cookiesInstance->set($cookKey, $cookValue);
}
?>
    <div class="container-fluid pt-3">
        <?php
        echo "<pre>";
        var_dump($requestInstance->cookies());
        echo "</pre>";
        ?>
    </div>
</div>
<div class="container-fluid shadow-sm bg-white rounded my-3 py-2">
    <h4 class="display-6">Session object</h4>
    <p class="py-2">Add session data</p>
<form action="" method="GET">
    <div class="form-row">
        <div class="col-auto">
    <label>Add session key</label>
        <input type="text" name="sessionkey" placeholder="Input session key">
        </div>
        <div class="col-auto">
    <label> Add session value</label>
    <input type="text" name="sessionvalue" placeholder="Input session value">
        </div>
        <div class="col-auto">
    <button type="submit" class="btn btn-primary btn-sm">Submit session data</button>
        </div>
</form>
<?php
if (isset($sessKey) && isset($sessValue)) {
$requestInstance->sessionSet($sessKey, $sessValue);
}
?>
<div class="container-fluid pt-3">
<?php
echo "<pre>";
var_dump($requestInstance->session());
echo "</pre>";
?>
</div>
<a class="btn btn-primary btn-sm" style="margin-left:79.2%;" href="<?php $sessionInstance->clear(); echo 'requesttest.php'; ?>">Clear session data</a>
</div>
<a class="btn btn-light btn-sm mt-5" style="margin-left:78.3%;" href="../index.php">Return to main menu</a>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>