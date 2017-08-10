<?php

echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<p>";
echo gettext('Current version: ')." $LASTUPDATE";
echo "</p>";

echo "<div class='pull-left' style='margin-right: 10px;'>";
echo "<form class='form-inline' action='".$_SERVER["PHP_SELF"]."?dgfile=Blacklist filtering' method='post'>";
echo "<input type='hidden' name='choix' value='Download_bl'>";        
echo "<button class='btn btn-primary'>";
echo "<span class='glyphicon glyphicon-download' aria-hidden='true'></span>&nbsp;";
echo gettext('Download the last version');
echo "</button>";
echo "</form>";
echo "</div>";

echo "<div class='pull-left'>";
echo "<form class='form-inline' action='".$_SERVER["PHP_SELF"]."?dgfile=Blacklist filtering' method='post'>";
echo "<input type='hidden' name='choix' value='INIT_BL'>";
echo "<button class='btn btn-primary'>";
echo "<span class='glyphicon glyphicon-grain' aria-hidden='true'></span>&nbsp;";
echo gettext('Init Categories');
echo "</button>";
echo "</form>";
echo "</div>";
echo "</div>";

echo "<div class='clearfix col-md-6'>";

if ($AUTOUPDATE == "ON")
{
    echo "<p><br /><br />";
    echo gettext('The update of the Toulouse blacklist every 7 days is activated');
    echo "&nbsp;<span class='glyphicon glyphicon-ok' style='color: green;' aria-hidden='true'></span>";
    echo "</p>";
    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Blacklist filtering' method='post'>";
    echo "<input type=hidden name='choix' value=\"AUP_Off\">";
    echo "<input class='btn btn-success' type=submit value=".gettext('Disable Auto Shift').">";
}
else
{
    echo "<p><br /><br />";
    echo gettext('The update of the Toulouse blacklist every 7 days is disabled');
    echo "&nbsp;<span class='glyphicon glyphicon-remove' style='color: red;' aria-hidden='true'></span>";
    echo "</p>";
    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Blacklist filtering' method='post'>";
    echo "<input type=hidden name='choix' value=\"AUP_On\">";
    echo "<input class='btn btn-warning' type=submit value=".gettext('Enable Auto Shift').">";
}

echo "</form>";

if ($PRIVOXYDF == "ON")
{ 
	echo "<p>";
    echo gettext('Default filter Privoxy is activated');
    echo "&nbsp;<span class='glyphicon glyphicon-ok' style='color: green;' aria-hidden='true'></span>";
    echo "</p>";
    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Blacklist filtering' method='post'>";
    echo "<input type=hidden name='choix' value=\"ProxyDF_Off\">";
    echo "<input class='btn btn-success' type=submit value=".gettext('Disable').">";
}
else
{
	echo "<p>";
    echo gettext('Default filter Privoxy is disabled');
    echo "&nbsp;<span class='glyphicon glyphicon-remove' style='color: red;' aria-hidden='true'></span>";
    echo "</p>";
    echo "<form action='".$_SERVER["PHP_SELF"]."?dgfile=Blacklist filtering' method='post'>";
    echo "<input type=hidden name='choix' value=\"ProxyDF_On\">";
    echo "<input class='btn btn-warning' type=submit value=".gettext('Enable').">";
}
echo "</FORM>";

echo "</div>";
