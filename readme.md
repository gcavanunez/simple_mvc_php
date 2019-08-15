Para correr en local usando Xampp
1- clona el repositorio 
2- abre C:\Windows\System32\drivers\etc 
3- modifica el a archivo hosts como administrador
    incluyendo 
    127.0.0.1 localhost
    127.0.0.1 mvc.mango

4- editar archivo httpd-vhosts.conf -> C:\xampp\apache\conf\extra

<VirtualHost *:80>
    	DocumentRoot C:/xampp/htdocs/mvc_prod_r
    	ServerName mvc.mango
	    ServerAlias mvc.mango
</VirtualHost>
<VirtualHost *:80>
    	DocumentRoot C:/xampp/htdocs/
    	ServerName localhost
	ServerAlias localhost
</VirtualHost>

5-> base de datos crear una dentro de phpmyadmin -> importar modelodb.sql -> incluir detalles dentro de config.php

6-> modificar constante URLROOT