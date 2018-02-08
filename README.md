Controle parental.
 Filtrage web basé sur iptables dnsmasq dansguardian privoxy lighttpd cron et la blacklist de l'université de Toulouse.
 une gestion des horaires de connection est aussi intégrée et
 une interface web (https://admin.ct.local) permettant de paramétrer tous ça.
 Le couple login mot de passe doit être saisi à l'install, mais peut être
 modifié par la suite grâce à la commande CTparental -uhtml.
 
 Filtrage par Blackliste ou par Whiteliste .
 
 Filtre par Catégories.
 
 Filtre personnalisé de sites.
 
 Filtre Personnalisé de sites à laisser accessibles même s'ils sont présents dans une des catégories que l'on veut bloquer.
 
 Réglages des heures de connexions autorisées par utilisateur.
 
 Réglage du temps max de navigation des utilisateurs.
 
 Nombres de minutes de connexions max par jours autorisées.
 
 Groupe de personnes privilégiées ne subissant pas de filtrage web.
 
 Notifications des Utilisateurs toutes les minutes durant les 5 dernières minutes avant déconnexion.
 
 Dansguardian (extentions + type mime paramétrable via l'interface.)
 
 Privoxy (paramètre non disponible via l'interface.)
 
 Force SafeSearch google
 
 Force safesearch youtube.com ( très restrictifs conviens au jeune enfants , pas a des adolescents.)
 
 Force SafeSearch duckduckgo
 
 Force SafeSearch bing (en http seulement)
 
 Blocage de moteurs de recherches jugés non sûr comme bing en https et search.yahoo.com.
 
 Ajout du mot de passe grub2 , le mot de passe est persistants, après un update-grub ou une mise a jour grub2. le clavier bascule en qwerty pour le paramétrage du login mots de passe grub2 cela évite les problèmes de caractère impossible a faire avec le clavier qwerty du menu grub2.
 
 Fonctionne avec firefox,midori,chromium …
 
 Gestion de règles personnalisées pour iptables. Activé avec CTparental -ipton
 


