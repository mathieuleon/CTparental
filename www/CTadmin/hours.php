<?php

echo "<h1 class='page-header'>".gettext('Hours of allowed connections')."</h1>";

if ($HOURSCONNECT == "ON")
{
    echo "<div class='row'>";
#    echo "<div class='col-md-4'>";
    
    echo "<p>";
    echo gettext('Connection schedules are currently enabled');
    echo "&nbsp;<span class='glyphicon glyphicon-ok' style='color: green;' aria-hidden='true'></span>";
    echo "</p>";

    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Hours of allowed connections' method=POST>";
    echo "<input type=hidden name='choix' value=\"H_Off\">";
    echo "<input class='btn btn-success' type=submit value=".gettext('Disable logon hours').">";
    echo "</form>";

    if (isset($_POST['selectuser'])){ $selectuser=$_POST['selectuser']; }


    ### on lit est on interprète le fichier CTparental.conf
    WaitForTheFileToDisappear ($pidfilecmdCT);
    exec ($cmdCT."-listusers 2> /dev/null",$USERSPC); # récupération des utilisateurs du poste.(UID >= 1000)
    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Hours of allowed connections' method=POST>";
            echo "<select name=\"selectuser\">";
            if (isset($selectuser)){echo "<option value=\"$selectuser\">$selectuser\n"; }
                    else {echo "<option value=\"\">\n"; }
            foreach ($USERSPC as $USERSELECT){echo "<option value=\"$USERSELECT\">$USERSELECT\n";}
            echo " </select>";
    echo "<input type=\"submit\" value=".gettext('Select').">";
    echo "</form>";
    if (!empty($selectuser))
    {
        echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Hours of allowed connections' method=POST>";
        echo "<CENTER><H3>".gettext("the selected user is: ")." $selectuser</H3></CENTER>";
        
        if (is_file ($hconf_file))
        {
            $tab=file($hconf_file);
            if ($tab)
            {
				if (is_file ($hcompteur_file))
				{
					$tab2=file($hcompteur_file);
			    }
			    else 
				{
					echo gettext('Error opening the file')." $hcompteur_file";
				}
				
                foreach ($tab as $line)
                {
                    $field=explode("=", $line);
                            if ( $field[0] == $selectuser ){
                            $field2=explode(":", $field[2]);
                    $numday=$field[1];
                    $isconfigured=1;
                    
                    if ( $numday == "admin") { echo gettext('24/7')." : <input type='checkbox' name='isadmin' checked>";}
                    elseif ( $numday == "user") {echo gettext('24/7')." : <input type='checkbox' name='isadmin' >";
                                            if ( intval ($field[2]) == 0 ) { $field[2]="1440"; }
                                            foreach ($tab2 as $line2)
                                            {
												$field2=explode("=", $line2);
												if ($field2[0] == $selectuser)
												{
													$countConect=$field2[1]
													$countWeb=$field2[2]
												}
											}
                                            echo "<br /> ";
                                            echo gettext('time max pc connection')." ".gettext('(minutes for 24 hours)')."<input type=\"text\" size=4 maxlength=4 value=\"$field[2]\"  name=\"tmax\">/1440 .";
                                            echo "<br /> ";
                                            echo $countConect." ".gettext('are already used');
                                            echo "<br /> ";
                                            echo gettext('maximum time for web surfing')." ".gettext('(minutes for 24 hours)')."<input type=\"text\" size=4 maxlength=4 value=\"$field[3]\"  name=\"tmax2\">/".$field[2].".";
                                            echo "<br /> ";
                                            echo $countWeb." ".gettext('are already used');	
                                            echo "<br /> ";
                                            }
                                            
                    else {
						 if ( $numday == "0") { echo "<table>";}
							echo "<tr>";
                            if ( isset ($field2[0]) ) {
                                    echo "<td> $week[$numday]: </td> <td> <input type=\"text\" size=5 maxlength=5 value=\"$field2[0]\"  name=\"h1$numday\">";
                                    echo gettext(' to ')." <input type=\"text\" size=5 maxlength=5 value=\"$field2[1]\" name=\"h2$numday\">";
                                    }
                            else {
                                    echo "<td> $week[$numday]: </td> <td> <input type=\"text\" size=5 maxlength=5 value=\"\"  name=\"h1$numday\">";
                                    echo gettext(' to ')." <input type=\"text\" size=5 maxlength=5 value=\"\" name=\"h2$numday\">";
                                    
                            }
                            if ( isset ($field2[2]) ) {
                                            echo gettext(' and ')." <input type=\"text\" size=5 maxlength=5 value=\"$field2[2]\" name=\"h3$numday\">";	
                                            echo gettext(' to ')." <input type=\"text\" size=5 maxlength=5 value=\"$field2[3]\" name=\"h4$numday\"></td>";
                                    }
                            else {
                                            echo gettext(' and ')." <input type=\"text\" size=5 maxlength=5 value=\"\" name=\"h3$numday\">";	
                                            echo gettext(' to ')." <input type=\"text\" size=5 maxlength=5 value=\"\" name=\"h4$numday\"></td>";	
                            }
                            
                           echo "</tr>";
                           if ( $numday == "6") { echo "</table>";}
                        }
                    }
                }
            }
        }
        else 
        {
            echo gettext('Error opening the file')." $hconf_file";
        }

        if (isset($isconfigured)==0)
        {
            echo gettext('24/7')." : <input type='checkbox' name='isadmin' checked=\"checked\">";
        }

        echo "<input type=hidden name='selectuser' value=\"$selectuser\">";
        echo "<input type=hidden name='choix' value=\"MAJ_H\">";
        echo "<input type=\"submit\" value=".gettext('Record').">";
        echo "</form>";
    }
    else
    {
        echo "<CENTER><H3>".gettext("Please select a user.")."</H3></CENTER>";
    }

#    echo "</div>";
    echo "</div>";

}
else
{
    echo "<div class='row'>";
#    echo "<div class='col-md-4'>";
    
    echo "<p>";
    echo gettext('Connection schedules are currently disabled');
    echo "&nbsp;<span class='glyphicon glyphicon-remove' style='color: red;' aria-hidden='true'></span>";
    echo "</p>";

    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Hours of allowed connections' method='post'>";
    echo "<input type=hidden name='choix' value=\"H_On\">";
    echo "<input class='btn btn-warning' type=submit value=".gettext('Enable logon hours').">";
    echo "</form>";

#    echo "</div>";
    echo "</div>";
}
