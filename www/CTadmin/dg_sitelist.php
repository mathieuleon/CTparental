<?php
// affichage des formulaires

echo "<h1 class='page-header'>".gettext('Dansguardian configuration')."</h1>";
echo "<h3>".gettext('Select the type of packet filtering')."</h3>";
echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=*ip **ips ...' method='post'>";

echo "<p class='text-muted'>".$dg_file_edit."</p>";
echo "<div class='row'>";
echo "<div class='col-md-12'>";

// Read the bannedextensionlist file
$tab = file($dg_file_edit);
if ($tab) # the file isn't empty
{
    $chknum = 1;
    
    foreach ($tab as $ligne)
    {
        if (trim($ligne) != '') # the line isn't empty
        {
            if(preg_match('/^#/', $ligne))
            {
                $s = substr($ligne, 1);
                $s = trim($s);
                
                if ($s[0] != '*')
                {
                    if (strstr($s, '!'))
                    {
                        echo "<br />";
                        echo "<div class='alert alert-warning' role='alert'>";
                        echo $s;
                        echo "</div>";
                    }
                    else if (!strstr($s, ':'))
                    {
                        $s = explode(',', $s);
                        
                        echo "<span>";
                        echo $s[0]." ";
                        echo "</span>";
                    }
                    $chknum = $chknum + 1;
                    continue;
                }
            }
            
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
        }
    
        $chknum = $chknum + 1;
    }
}

echo "</div>";
echo "</div>";

echo "<input type='hidden' name='choix' value='change_file1'>";
echo "<button class='btn btn-info'>";
echo "<span class='glyphicon glyphicon-save' aria-hidden='true'></span>&nbsp;";
echo gettext('Save changes');
echo "</button>";
echo "</form>";
