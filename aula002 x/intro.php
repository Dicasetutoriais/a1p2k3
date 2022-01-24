<?php 
$folder_name = "";
$intro_img = $folder_name . "intro.mp4";
if( isset($_POST["images"]) ) 
{
    $errors = array(  );
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $file_type = $_FILES["image"]["type"];
    $file_ext = strtolower(end(explode(".", $_FILES["image"]["name"])));
    $extensions = array( "jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF", "mp4", "MP4" );
    if( in_array($file_ext, $extensions) === false ) 
    {
        $errors[] = "extension not allowed, please choose a JPEG or PNG or GIF or MP4 file.";
    }

    if( 11242880 < $file_size ) 
    {
        $errors[] = "File size must not exceed 5 MB";
    }

    if( empty($errors) == true ) 
    {
        if( $_POST["image"] == "intro" ) 
        {
            $file_name1 = "intro.mp4";
        }

        move_uploaded_file($file_tmp, $folder_name . $file_name1);
        header("Location: " . $_SERVER["PHP_SELF"]);
    }
    else
    {
        print_r($errors);
    }

}

$message = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>Items Updated!</h4></div>";
include("includes/header.php");
print " <!-- Begin Page Content -->\n";
print "        <div class=\"container-fluid\">\n";
print "\n";
if( isset($_GET["message"]) ) 
{
    echo $_GET["message"];
}
print "        <div class=\"col-md-8 mx-auto\">\n";
print "            <div class=\"card-body\">\n";
print "                <div class=\"card bg-black text-white\">\n";
print "                    <div class=\"card-header\">\n";
print "                        <center>\n";
print "                            <h2><i class=\"fa fa-film\"></i> Intro Video</h2>\n";
print "                        </center>\n";
print "                    </div>\n";
print "         \n";
print "          <!-- Content Row -->\n";
print "          <div class=\"row\">\n";
print "\n";
print "            <!-- First Column -->\n";
print "            <div class=\"col-lg-12\">\n";
print "\n";
print "              <!-- Custom codes -->\n";
print "                <div class=\"card-body\">\n";
print "\t\t\t\t\t\t\t<div class=\"form-group\">\n";
print "\t\t\t\t\t\t<form method=\"post\" enctype=\"multipart/form-data\">";
print "                            <label class=\"control-label \" for=\"intro\">\n";
print "                                <strong> Upload Intro Video File</strong>\n";
print "                            </label>\n";
print "<div class=\"input-group\">\n";
print "\t\t\t\t\t\t\t\t<div class=\"custom-file\">\n";
print "\t\t\t\t\t\t\t\t\t<input type=\"file\" class=\"custom-file-input\" name=\"image\" id=\"intro\" placeholder=\"Choose Intro\" onchange=\"uploadintro(this)\" aria-describedby=\"intro\">\n";
print "\t\t\t\t\t\t\t\t\t<label class=\"custom-file-label\" for=\"intro\" placeholder=\"Choose Intro\"><span id=\"image-intro\"></span></label>\n";
print "\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"image\" value=\"intro\">\n";
print "\t\t\t\t\t\t\t\t</div>\n";
print "\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"images\" class=\"btn btn-info\">Upload</button>\n";
print "\t\t\t\t\t\t\t</div>\n";
print "\t\t\t\t\t\t</form>\n";
print "\t\t\t\t\t\t<br>\n";
print "\t\t\t\t\t\t\n";
print "\t\t\t\t\t</div>\n";
print "\t\t\t\t</div>\n";
print "            <!-- Theme -->\n";
print "                  <div class=\"align-items-center\">\n";
print "                        <center>\n";
print "                      <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Current Intro</div>\n";
time();
print "                      <div class=\"h5 mb-0 font-weight-bold text-gray-800\"><video width=\"500\" autoplay=\"true\" muted preload=\"auto\" controls>  <source src=\"" . $intro_img . "?t=" . time() . "\" type=\"video/mp4\"></video></div>\n";
print "                    </div>\n";
print "                  </div>\n";
print "                </div>\n";
print "              </div>\n";
print "            </div>\n";
print "          </div>\n";
print "            \n";
print "<br><br>\n";
print "<br><br>\n";
print "<footer>\n";
print "</footer>\n";
print "    </body>\n";
print "</html>";
echo "\n";
include ('includes/footer.php');
echo "\n";
echo "</body>\n";
echo "</html>\n";

