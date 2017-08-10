<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><!-- written by Rexy -->
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include 'locale.php';
$dirconf="/etc/CTparental";
$bl_dir=$dirconf."/dnsfilter-available/";
$l_title                      = gettext("Blacklist categories");
$l_error_open_file            = gettext("Error opening the file");
$l_close                      = gettext("Close");
$l_unknown_cat                = gettext("This category isn't describe");
$l_nb_domains                 = gettext("Number of filtered domain names :");
$l_nb_urls                    = gettext("Number of filtered URL :");
$l_explain_adult              = gettext("Some adult site from erotic to hard pornography.");
$l_explain_agressif           = gettext("Sites extremist, racist, anti-Semitic or hate");
$l_explain_audio_video        = gettext("Sites for downloading audio and video");
$l_explain_blog               = gettext("Sites hosting blogs");
$l_explain_cleaning           = gettext("Sites related to software update or antiviral");
$l_explain_dangerous_material = gettext("Sites related to the creation of dangerous goods (explosives, poison, etc.)");
$l_explain_download           = gettext("Sites which propose to download software");
$l_explain_drogue             = gettext("Sites related to narcotic");
$l_explain_financial          = gettext("Sites of financial information");
$l_explain_forums             = gettext("Sites hosting discussion forums");
$l_explain_gambling           = gettext("Online gambling sites (casino, virtual scratching, etc.)");
$l_explain_hacking            = gettext("Hacking sites.");
$l_explain_liste_bu           = gettext("A french list for educational sites. VERY locally oriented. May help libraries.");
$l_explain_mobile_phone       = gettext("Sites related to GSM mobile (ringtones, logos, etc.)");
$l_explain_phishing           = gettext("Phishing sites (traps banking, redirect, etc..)");
$l_explain_publicite          = gettext("Advertising sites");
$l_explain_radio              = gettext("Online radio podcast sites");
$l_explain_redirector         = gettext("redirects, anonymization or bypass sites");
$l_explain_strict_redirector  = gettext("Intentionally malformed URL");
$l_explain_strong_redirector  = gettext("Malformed URL in a 'google' query");
$l_explain_tricheur           = gettext("Sites related to cheating (tests, examinations, etc.)");
$l_explain_warez              = gettext("Sites related to cracked softwares");
$l_explain_webmail            = gettext("Web sites for e-mail consultation");
$l_explain_games              = gettext("Online games sites");
$l_explain_educational_games  = gettext("educational games sites (flash and online games )"); 
$l_explain_mixed_adult        = gettext("Adult sites (shock, gore, war, etc.).");
$l_explain_filehosting        = gettext("Warehouses of files (video, images, sound, software, etc.)");
$l_explain_reaffected         = gettext("Sites that have changed ownership (and therefore content)");
$l_explain_sexual_education   = gettext("Sites related to sex education");
$l_explain_shopping           = gettext("Shopping sites and online shopping");
$l_explain_dating             = gettext("Online dating sites");
$l_explain_marketingware      = gettext("Doubtful commercial sites");
$l_explain_astrology          = gettext("Sites related to astrology");
$l_explain_sect               = gettext("Sectarian sites");
$l_explain_celebrity          = gettext("Sites « people », stars, etc.");
$l_explain_manga              = gettext("Manga site");
$l_explain_child              = gettext("Sites for children");
$l_explain_malware            = gettext("Malware sites (viruses, worms, trojans, etc.).");
$l_explain_press              = gettext("News sites");
$l_explain_chat               = gettext("Online chat sites");
$l_explain_remote_control     = gettext("Sites for making remote control");
$l_explain_social_networks    = gettext("Social networks sites");
$l_explain_jobsearch          = gettext("Job search sites");
$l_explain_sport              = gettext("Sport sites");
$l_explain_bank               = gettext("Online bank sites");
$l_explain_arjel              = gettext("Online gambling sites allowed by the french authority 'ARJEL' (Autorité de Régulation des Jeux En Ligne)");
$l_explain_cooking            = gettext("Sites for cooking"); 
$l_explain_lingerie           = gettext("Sites for lingerie"); 
$l_explain_translation        = gettext("Sites for translation"); 
$l_explain_bitcoin            = gettext("Sites for bitcoin mining");
$l_explain_dialer             = gettext("Sites for dialer");
$l_explain_ddos               = gettext("distributed denial of service attack sites");
$l_explain_update             = gettext("Sites of update");
$l_explain_associations_religieuses = gettext("Sites of Religious Associations");
$l_explain_shortener          = gettext("URLs shortening sites");
$l_explain_ossi               = gettext("Domain names and URLs you add to the blacklist (see below)");
$l_explain_ctparental         = gettext("Site related to as pop up advertising or pornography not present in the Toulouse blacklist.");
if (isset($_GET['cat']))
{
    $categorie = $_GET['cat'];
}

$bl_categorie_domain_file = $bl_dir.$categorie.".conf";

if (file_exists($bl_categorie_domain_file))
{
    $nb_domains = exec ("wc -w $bl_categorie_domain_file|cut -d' ' -f1");
}
else
{
    $nb_domains = $l_error_openfilei." ".$bl_categorie_domain_file;
}

if (file_exists($bl_categorie_url_file))
{
    $nb_urls = exec ("wc -w $bl_categorie_url_file|cut -d' ' -f1");
}
else
{
    $nb_urls = $l_error_openfile." ".$bl_categorie_url_file;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $l_title; ?></title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/main.css" type="text/css">
        
        <script src="js/jquery-1.12.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
   <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li class="active" role="<?php echo "$l_close"; ?>">
                            <a href="javascript:window.close();"><?php echo "$l_close"; ?></a></li>
                    </ul>
                </nav>
                <h3 class="text-muted"><?php echo $categorie ;?></h3>
            </div>
            
            <div class="alert alert-info" role="alert">
            <?php
            $compat_categorie = strtr($categorie, "-", "_");
            
            if (!empty(${'l_explain_'.$compat_categorie}))
            {
                echo "${'l_explain_'.$compat_categorie}";
            }
            else
            {
                echo "$l_unknown_cat";
            }
            ?>
            </div>

            <footer class="footer">
                <span><?php echo "$l_nb_domains $nb_domains"; ?></span>
                <span class="pull-right">CTparental</span>
            </footer>
        </div>
    </body>
</html>
