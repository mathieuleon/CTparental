<?php

function echo_file ($filename)
{
    if (file_exists($filename))
    {
        if (filesize($filename) != 0)
        {
            $pointeur = fopen($filename, "r");
            $tampon   = fread($pointeur, filesize($filename));
            
            fclose($pointeur);
            echo $tampon;
        }
    }
    else
    {
        echo "$l_error_openfile $filename";
    }
}

echo "<h1 class='page-header'>".gettext('WhiteList Filtering')."</h1>";

require("update.php");

echo "<div class='col-md-12'>";
echo "<hr />";
echo "<h3>".gettext('Choice of authorized categories')."</h3>";
echo "<form action='$_SERVER[PHP_SELF]?dgfile=WhiteList Filtering' method=POST>";
echo "<input type='hidden' name='choix' value='MAJ_cat'>";
echo "<div class='row'>";

//on lit et on interprète le fichier de catégories
$count = 5;
$cols  = 1; 
$str = file_get_contents($bl_categories_enabled);
if (file_exists($bl_categories))
{
    $pointeur = fopen($bl_categories, "r");
    
    while (!feof ($pointeur))
    {
        $ligne = fgets($pointeur, 4096);
        
        if ($ligne)
        {
            if ($cols == 1) { echo "<div class='col-md-3'>"; }
            
            $categorie = trim(basename($ligne));
            
            echo "<div class='checkbox'>";
            echo "<label>";
            echo "<input type='checkbox' name='chk-$categorie'";
            
            // la catégorie existe pas dans le fichier de catégorie activé -> categorie selectionnée
            
            $a= preg_match('/\n'.$categorie.'\n/', $str);
            $b= preg_match('/^'.$categorie.'\n/', $str);
            if ( $a or $b  )  { echo "checked>";   }
            else { echo ">"; }
            
            echo "<a href='bl_categories_help.php?cat=$categorie' target='cat_help' onclick=window.open('bl_categories_help.php','cat_help','width=600,height=300,toolbar=no,scrollbars=no,resizable=yes') title='categories help page'>$categorie</a>";
            echo "</label>";
            echo "</div>";

            $cols++;
            if ($cols > $count)
            {
                echo "</div>";
                $cols = 1;
            }
        }
    }
    
    if ($cols > 1 and $cols < $count + 1)
    {
        echo "</div>";
    }

    fclose($pointeur);
}
else
{
    echo gettext('Error opening the file')." $bl_categories";
}

echo "</div>";
echo "<hr />";
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<h3>".gettext('Rehabilitated domain names')."</h3>".gettext('2-Enter the domain names permitted in addition to the Toulouse white list.')." ".gettext('Enter one domain name per row (example : .domain.org)');
echo "<br /><br />";
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<textarea class='form-control' name='OSSI_wl_domains' rows=5 cols=40>";
echo_file ($wl_domains);
echo "</textarea>";
echo "</div>";

echo "<div class='col-md-12'>";
echo "<br /><br />";
echo "<button class='btn btn-info'>";
echo "<span class='glyphicon glyphicon-save' aria-hidden='true'></span>&nbsp;";
echo gettext('Save changes');
echo "</button>";
echo "&nbsp;<span class='text-muted'>".gettext('Once validated, 30 seconds are necessary to compute your modifications')."</span>";
echo "</form>";
echo "</div>";
echo "</div>";
