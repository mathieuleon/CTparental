<?php
// Privileged groups

echo "<h1 class='page-header'>".gettext('privileged group')."</h1>";

if ($GCTOFF == "ON")
{
    echo "<div class='row'>";
    echo "<div class='col-md-4'>";
    
    echo "<p>";
    echo gettext('The preferred Group is currently enabled');
    echo "&nbsp;<span class='glyphicon glyphicon-ok' style='color: green;' aria-hidden='true'></span>";
    echo "</p>";

    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=privileged group' method='post'>";
    echo "<input type=hidden name='choix' value=\"gct_Off\">";
    echo "<input class='btn btn-success' type=submit value=".gettext('Disable privileged group.').">";
    echo "</form>";

    echo "</div>";
    echo "<div class='col-md-8'>";

    echo "<p>";
    echo gettext('Select users who should not undergo filtering');
    echo "</p>";

    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=privileged group' method='post'>";
    //echo gettext('Username');
    
    // Read the "CTOFF.conf" file
    exec ("sudo /usr/local/bin/CTparental.sh -gctulist");
    $tab = file($conf_ctoff_file);
    if ($tab)  # the file isn't empty
    {
		$chknum=1;
        foreach ($tab as $line)
        {
			
            if (trim($line) != '') # the line isn't empty
            {
                $user_lignes = explode(" ", $line);
                $userx       = trim($user_lignes[0], "#+");
                
                echo "<div class='checkbox'>";
                echo "<label>";
                echo "<input type='checkbox' name='chk-$chknum'";
                if (preg_match('/^\+/',$line, $r)) 
                {
				    echo " disabled='disabled' ";
			    }
                if (preg_match('/^#/', $line, $r))
                {
                    echo ">";
                }
                else
                {
                    echo "checked>";
                }
                
                echo "$userx";
                if (preg_match('/^\+/',$line, $r)) 
                {
					echo gettext('Is Administrator.');
			    }
                echo "</label>";
                echo "</div>";
               
            }
            $chknum=$chknum+1;
        }
    }
    
    echo "<br />";
    echo "<div class='row'>";
    echo "<div class='col-md-12'>";
    echo "<input type='hidden' name='choix' value='change_user'>";
    echo "<button class='btn btn-info'>";
    echo "<span class='glyphicon glyphicon-save' aria-hidden='true'></span>&nbsp;";
    echo gettext('Save changes');
    echo "</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
}
else
{
    echo "<div class='row'>";
    echo "<div class='col-md-4'>";
    
    echo "<p>";
    echo gettext('The preferred Group is currently disabled');
    echo "&nbsp;<span class='glyphicon glyphicon-remove' style='color: red;' aria-hidden='true'></span>";
    echo "</p>";
    
    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=privileged group' method='post'>";
    echo "<input type=hidden name='choix' value=\"gct_On\">";
    echo "<input class='btn btn-warning' type=submit value=".gettext('Enable privileged group.').">";
    echo "</form>";

    echo "</div>";
    echo "</div>";
}
