<?php
// affichage des formulaires

echo "<h1 class='page-header'>".gettext('Safesearch configuration')."</h1>";
echo "<h3>".gettext('Select the safesearch to be enabled')."</h3>";

echo "<FORM action='$_SERVER[PHP_SELF]?dgfile=Safesearch configuration' method='POST'>";

echo "<p class='text-muted'>".$dg_file_edit."</p>";
echo "<div class='row'>";

// Read the bannedextensionlist file
$tab = file($dg_file_edit);
$count = 5;
$cols  = 1;
if ($tab)  # the file isn't empty
{
    $chknum = 1;
    
    foreach ($tab as $ligne)
    {
        if (trim($ligne) != '') # the line isn't empty
        {
            if ($cols == 1) { echo "<div class='col-md-6'>"; }
            
            echo "<div class='checkbox'>";
            echo "<label>";

            echo "<input type='checkbox' name='chk-$chknum'";
            
            if (preg_match('/^#/', $ligne))
            {
                echo ">";
            }
            else
            {
                echo "checked>";
            }

            if(preg_match('/^#/', $ligne))
            {
                $s     = substr($ligne, 1);
                $ligne = trim($s);
            }

            echo $ligne;
            echo "</label>";
            echo "</div>";

            $cols++;
            if ($cols > $count)
            {
                echo "</div>";
                $cols = 1;
            }
        }
        
        $chknum = $chknum + 1;
    }
    
    if ($cols > 1 and $cols < $count + 1)
    {
        echo "</div>";
    }
}

echo "</div>";

echo "<br />";
echo "<input type='hidden' name='choix' value='change_safesearch'>";
echo "<button class='btn btn-info'>";
echo "<span class='glyphicon glyphicon-save' aria-hidden='true'></span>&nbsp;";
echo gettext('Save changes');
echo "</button>";
echo "</form>";
