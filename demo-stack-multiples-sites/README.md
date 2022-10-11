## Linux
Ejecutar en Linux:
```
sudo rm -f /etc/resolv.conf
```
```
sudo bash -c 'echo "nameserver 8.8.8.8" > /etc/resolv.conf'
```
```
sudo chattr +i /etc/resolv.conf
```
## END OF Linux
## WSL2
Ejecutar en WSL2:
```
sudo rm /etc/resolv.conf
sudo bash -c 'echo "nameserver 8.8.8.8" > /etc/resolv.conf'
sudo bash -c 'echo "[network]" > /etc/wsl.conf'
sudo bash -c 'echo "generateResolvConf = false" >> /etc/wsl.conf'
sudo chattr +i /etc/resolv.conf
```
## END OF WSL2

Crear network para conectar todos los proyectos internamente:
```
docker network create net_front
```
```
docker network ls
```
Añadir dominios en nuestros DNS locales:
```
sudo bash -c 'echo "# Docker local projects" >> /etc/hosts'
sudo bash -c 'echo "127.0.0.1       wordpress1.demo-stack.com wordpress2.demo-stack.com" >> /etc/hosts'
sudo bash -c 'echo "127.0.0.1       pma-wordpress1.demo-stack.com pma-wordpress2.demo-stack.com" >> /etc/hosts'
```
En caso de Windows, añadir al fichero hosts de windows también.
