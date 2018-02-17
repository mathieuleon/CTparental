%define	name ctparental
%define version	4.21.06e
%define release	1

Summary: Parental Controls
Name: %{name}
Version: %{version}
Release: %{release}
BuildArch: noarch
License: GPL
Group: Amusements/Graphics
BuildRoot: %{_builddir}/%{name}-%{version}-root
URL: https://github.com/marsat/CTparental
Provides: %{name}
Requires: dnsmasq , lighttpd , lighttpd-mod_auth , lighttpd-mod_magnet , perl , sudo , wget , php-cgi , libnotify , notification-daemon , rsyslog , e2guardian , privoxy , newt , shorewall , shorewall-ipv6 , shorewall-core , /usr/bin/certutil

%description
CTparental est un Contrôle parental
basé sur dnsmasq , e2guardian , privoxy , shorewall(iptables et iptable6)
et la blackliste de l’université de Toulouse.

%prep
exit 0

%build
exit 0

%install
rm -rf $RPM_BUILD_ROOT
mkdir -p $RPM_BUILD_ROOT/usr/bin
mkdir -p $RPM_BUILD_ROOT/etc/CTparental
mkdir -p $RPM_BUILD_ROOT/usr/share/locale/fr/LC_MESSAGES
mkdir -p $RPM_BUILD_ROOT/usr/share/locale/es/LC_MESSAGES
mkdir -p $RPM_BUILD_ROOT/usr/share/CTparental
mkdir -p $RPM_BUILD_ROOT/usr/share/man/man1
install -m755 $RPM_BUILD_DIR/CTparental $RPM_BUILD_ROOT/usr/bin
install -m755 $RPM_BUILD_DIR/CTparental-bl-infos $RPM_BUILD_ROOT/usr/bin
install -m644 $RPM_BUILD_DIR/debian/CTparental.conf $RPM_BUILD_ROOT/etc/CTparental
install -m644 $RPM_BUILD_DIR/mageia/dist.conf $RPM_BUILD_ROOT/etc/CTparental
install -m644 $RPM_BUILD_DIR/locale/fr/LC_MESSAGES/ctparental.mo $RPM_BUILD_ROOT/usr/share/locale/fr/LC_MESSAGES/
install -m644 $RPM_BUILD_DIR/locale/es/LC_MESSAGES/ctparental.mo $RPM_BUILD_ROOT/usr/share/locale/es/LC_MESSAGES/
cp -r $RPM_BUILD_DIR/www $RPM_BUILD_ROOT/usr/share/CTparental
cp -r $RPM_BUILD_DIR/confe2guardian $RPM_BUILD_ROOT/usr/share/CTparental
install -m644 $RPM_BUILD_DIR/man/CTparental.1.gz $RPM_BUILD_ROOT/usr/share/man/man1

exit 0

%clean
exit 0

%files
%defattr(-,root,root)
/etc/CTparental/CTparental.conf
/etc/CTparental/dist.conf
/usr/bin/CTparental
/usr/bin/CTparental-bl-infos
/usr/share/CTparental/confe2guardian/template-es.html
/usr/share/CTparental/confe2guardian/template-fr.html
/usr/share/CTparental/confe2guardian/template.html
/usr/share/CTparental/www/CTadmin/bl_categories_help.php
/usr/share/CTparental/www/CTadmin/bl_dns.php
/usr/share/CTparental/www/CTadmin/body.php
/usr/share/CTparental/www/CTadmin/css/bootstrap-theme.min.css
/usr/share/CTparental/www/CTadmin/css/bootstrap-theme.min.css.map
/usr/share/CTparental/www/CTadmin/css/bootstrap.min.css
/usr/share/CTparental/www/CTadmin/css/bootstrap.min.css.map
/usr/share/CTparental/www/CTadmin/css/dashboard.css
/usr/share/CTparental/www/CTadmin/css/main.css
/usr/share/CTparental/www/CTadmin/css/sticky-footer.css
/usr/share/CTparental/www/CTadmin/dg_extensions.php
/usr/share/CTparental/www/CTadmin/dg_mimetype.php
/usr/share/CTparental/www/CTadmin/dg_sitelist.php
/usr/share/CTparental/www/CTadmin/fonts/glyphicons-halflings-regular.eot
/usr/share/CTparental/www/CTadmin/fonts/glyphicons-halflings-regular.svg
/usr/share/CTparental/www/CTadmin/fonts/glyphicons-halflings-regular.ttf
/usr/share/CTparental/www/CTadmin/fonts/glyphicons-halflings-regular.woff
/usr/share/CTparental/www/CTadmin/fonts/glyphicons-halflings-regular.woff2
/usr/share/CTparental/www/CTadmin/gctoff.php
/usr/share/CTparental/www/CTadmin/hours.php
/usr/share/CTparental/www/CTadmin/index.php
/usr/share/CTparental/www/CTadmin/js/bootstrap.min.js
/usr/share/CTparental/www/CTadmin/js/jquery-1.12.3.min.js
/usr/share/CTparental/www/CTadmin/js/npm.js
/usr/share/CTparental/www/CTadmin/locale.php
/usr/share/CTparental/www/CTadmin/safesearch.php
/usr/share/CTparental/www/CTadmin/update.php
/usr/share/CTparental/www/CTadmin/wl_dns.php
/usr/share/CTparental/www/CTparental/css/bootstrap-theme.min.css
/usr/share/CTparental/www/CTparental/css/bootstrap-theme.min.css.map
/usr/share/CTparental/www/CTparental/css/bootstrap.min.css
/usr/share/CTparental/www/CTparental/css/bootstrap.min.css.map
/usr/share/CTparental/www/CTparental/css/main.css
/usr/share/CTparental/www/CTparental/fonts/glyphicons-halflings-regular.eot
/usr/share/CTparental/www/CTparental/fonts/glyphicons-halflings-regular.svg
/usr/share/CTparental/www/CTparental/fonts/glyphicons-halflings-regular.ttf
/usr/share/CTparental/www/CTparental/fonts/glyphicons-halflings-regular.woff
/usr/share/CTparental/www/CTparental/fonts/glyphicons-halflings-regular.woff2
/usr/share/CTparental/www/CTparental/images/2518388623_1.png
/usr/share/CTparental/www/CTparental/images/X32px.png
/usr/share/CTparental/www/CTparental/index.php
/usr/share/CTparental/www/CTparental/index2.php
/usr/share/CTparental/www/CTparental/js/bootstrap.min.js
/usr/share/CTparental/www/CTparental/js/jquery-1.12.3.min.js
/usr/share/CTparental/www/CTparental/js/npm.js
/usr/share/CTparental/www/CTparental/locale.php
/usr/share/locale/fr/LC_MESSAGES/ctparental.mo
/usr/share/locale/es/LC_MESSAGES/ctparental.mo
/usr/share/man/man1/CTparental.1.gz


%post
ping -c3 www.google.fr > /dev/null
test="$?"
if [ "$test" -eq 0 ];then
	/usr/bin/CTparental -i -nodep -nomanuel  1>&2
else
echo "problême de conection internet veuiller lancer la commande suivant quant celui-ci reviendras."
echo '/usr/bin/CTparental -i -nodep -nomanuel  1>&2'
fi
exit 0

%preun
pkill -15 CTparental
rm -f /var/run/CTparental.pid
CTparental -u -nodep -nomanuel  1>&2
exit 0
