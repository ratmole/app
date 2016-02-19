<?php
    global $path, $session, $user; 
    if (isset($_GET['readkey'])) {
        $apikey = $_GET['readkey'];
    } elseif (isset($_GET['apikey'])) {
        $apikey = $_GET['apikey'];
    }
    
    if (isset($session['write']) && $session['write']) $apikey = $user->get_apikey_write($session['userid']);
?>

<script>
    var path = "<?php print $path; ?>";
    var apikey = "<?php print $apikey; ?>";
    
    apikeystr = ""; 
    if (apikey!="") apikeystr = "&apikey="+apikey;
</script>

<link href="<?php echo $path; ?>Modules/app/style.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $path; ?>Modules/app/app.js"></script>
        
<div id="content"></div>

<script>

console.log(path);

var config = app.getconfig();
var nodes = {};
  
var appname = "myelectric";
req = parse_location_hash(window.location.hash)

appname = req[0];
if (appname=="") appname = "myelectric";

app.show(appname);

$(window).on('hashchange', function() {
    app.hide(appname);
    req = parse_location_hash(window.location.hash)
    appname = req[0];
    app.load(appname);
    app.show(appname);
});

$(document).ready(function(){

});

function parse_location_hash(hash)
{
    hash = hash.substring(1);
    hash = hash.replace("?","/");
    hash = hash.replace("&","/");
    hash = hash.split("/");
    return hash;
}

</script>
