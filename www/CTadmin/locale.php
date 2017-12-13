<?php
$dirconf               = "/etc/CTparental/";
$conf_file             = $dirconf."CTparental.conf";
if (is_file ($conf_file))
{
    $tab = file($conf_file);
    
    if ($tab)
    {
        foreach ($tab as $line)
        {
            $field = explode("=", $line);        
            if ($field[0] == "LANG")         { $LANG      = trim($field[1]); }    // on détecte la langue parramétrée dans le fichier de conf
        }
    }
}
else
{
    echo gettext('Error opening the file')." ".$conf_file;
}
// $LANG toujour pas parramétrée on récupaire la valeur du système.
if(! isset($LANG)) { 
	// on détecte la langue system
	$LANG=getenv('LANG'); 
}

if(isset($LANG)) {
$tab=explode(".",getenv('LANG'));
$domain="ctparental";
	
// set the locale into the instance of gettext 
setlocale(LC_ALL,$LANG); // change by language, directory name fr_FR, not fr_FR.UTF-8 

// Spécifie la localisation des tables de traduction
// ce qui donne pour une variable $LANG='fr_FR.UTF-8' une répertoir ci dessous.
// ./locale/fr_FR/LC_MESSAGES/
bindtextdomain($domain, "/usr/share/locale");

// Choisit le domaine
// ce qui nous donne un nom de fichier pour $LANG='fr_FR.UTF-8' de fr.mo
textdomain($domain);
// La traduction est cherché dans ./locale/fr_FR/LC_MESSAGES/fr.mo
}
?>
