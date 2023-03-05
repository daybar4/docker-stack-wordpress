# MAINTAINER
- Name: David Aybar
- Email: daybar4@gmail.com
- Web: https://www.davidaybar.com/

## Proceso de instalación
Se expondrán los siguientes puertos:
- 80: HAProxy TCP HTTP
- 443: HAProxy TCP HTTPS
- 3306: MySQL TCP
- 8080: PHPMyAdmin TCP HTTP
- 2222: SFTP TCP

## Sudo no pass
Reemplaza MY_USERNAME por tu nombre de usuario
```
sudo nano /etc/sudoers.d/MY_USERNAME
```
Añade dentro, reemplazando el mismo nombre:
```
MY_USERNAME ALL=(ALL) NOPASSWD:ALL
```
Volver a salir y entrar.

### Clonemos el proyecto git al directorio actual
```
git clone <url-to-git-project>
```

### Cambiamos directorio a la ruta del proyecto
```
cd <to-project-directory>
```

### Generamos archivos docker-compose.yml, .env
```
cp docker-compose.yml.dist docker-compose.yml
cp .env.dist .env
```

### Customizar credenciales y volumen paths si es necesario
```
vim .env
```

### Creamos por primera vez directorios persistidos para docker
- Ver docker-compose.yml.dist para lista completa de volúmenes persistidos
```
#mkdir -p ./volumes/wordpress/wp-content/plugins
mkdir -p ./volumes/wordpress/apache2/log
mkdir -p ./volumes/wordpress/wp-content/cache
mkdir -p ./volumes/wordpress/wp-content/languages
mkdir -p ./volumes/wordpress/wp-content/uploads
mkdir -p ./volumes/proxy/etc/ssl/
mkdir -p ./volumes/mysql/log
mkdir -p ./volumes/mysql/data
mkdir -p ./volumes/mysql/dumps
```

### Cambiar permisos www-data en directorios persistidos de WordPress
```
#chown www-data:www-data ./volumes/wordpress/wp-content/plugins
sudo chown www-data:www-data ./volumes/wordpress/apache2/log
sudo chown www-data:www-data ./volumes/wordpress/wp-content/cache
sudo chown www-data:www-data ./volumes/wordpress/wp-content/languages
sudo chown www-data:www-data ./volumes/wordpress/wp-content/uploads
```

### Cambiar permisos mysql para que pueda generar archivos con sus propios permisos
```
chmod -R 777 ./volumes/mysql
```
### Copiar certificados SSL PEM autosignados al volumen persistido de Docker
```
cp ./proxy/etc/ssl/localhost.pem ./volumes/proxy/etc/ssl
```

### O generar nuestrops propios certificados autosignados para localhost
```
cd <haproxy-ssl-filepath>
openssl req -x509 -newkey rsa:2048 -keyout key.pem -out cert.pem -nodes -days 365 -subj '/CN=localhost' && cat key.pem cert.pem > localhost.pem
```

### Levantamos infraestructura y creamos todas las imágenes
```
docker-compose up -d --build
```
### En caso de error de proxy 502
Al generar por primera vez es posible que salga un 502 al conectar al backend, ya que wordpress se inicia antes que el proxy y no conecta.
En este caso recreamos el contenedor del HaProxy
```
docker-compose stop proxy && docker-compose up -d
```
No solo aplica para el primer build, es posible que en algún momento al tocar Wordpress o reiniciar el contenedor, puede que se tenga que recrear el contenedor proxy para que vuelva a coger el backend.

Si tenemos el compose.yml del proxy en un directorio separado sería suficiente con:
```
docker-compose up -d --force-recreate
```

## Accedemos localmente a la web y añadimos "not trusted certificate exception" si es necesario
- https://localhost (or any domain name aliased inside /etc/hosts)

Docker está pensado para ser un sistema cerrado de seguridad, solo exponemos los puertos externos 80/443 para acceder a través del proxy, nuestra puerta de entrada.
Proxy se conecta internamente a WordPress mediante la variable $PROXY_BACKEND_HOST, ya que están en la misma red interna de docker y se pueden ver con el nombre del servicio.

## Activar Worpress HTTPS con un certificado válido, una vez configurado:
Cambiar de false a true:
```
/** Force SSL in login & admin */
define('FORCE_SSL_LOGIN', false);
define('FORCE_SSL_ADMIN', false);
```
Descomentar del wp-config.php:
```
/*if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}*/
```
# Post instalación

## Notas
El directorio del código de instalación de WordPress se puede encontrar en el directorio **./wordpress/src**
Este directorio es copiado en **/var/www/html** dentro del contenedor de docker de WordPress que es construido y creado.

### Solución error "Too many authentication failures" SFTP Filezilla
```
SSH_AUTH_SOCK=null filezilla &
```

### Solución 'Permission denied' SFTP Filezilla
```
sudo chown www-data:www-data /path/to/uploads
```

## Links
`https://hub.docker.com/_/mysql/tags`
`https://hub.docker.com/_/haproxy/tags`
`https://hub.docker.com/_/debian/tags`
