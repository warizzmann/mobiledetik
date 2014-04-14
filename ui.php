<?php 
 
function head($pageid) { ?>
 
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/jquery.mobile-1.3.2.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.3.2.min.js"></script>
</head>
 
<body>
 
<div data-role="page" id="<?php echo $pageid?>" data-theme="a">
    <div data-role="header">
        <h1>Berita Online</h1>
        <a href='#'  data-icon="back" data-iconpos="notext" onclick="history.back(); return false">Back</a>
        <a href="index.php" data-iconpos="notext" data-icon="home">Home</a> 
    </div>   
    <div data-role="content" >
 
<?php
}
 
function foot() { ?>
    </div>
</div>
 
</body>
</html>
 
<?php
}
?>