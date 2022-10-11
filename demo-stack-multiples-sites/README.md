## Linux
```
sudo apt install -y resolvconf
```
```
sudo touch /etc/resolvconf/resolv.conf.d/base
```
```
sudo echo "nameserver 8.8.8.8" > /etc/resolvconf/resolv.conf.d/base
```
```
sudo echo "nameserver 8.8.4.4" > /etc/resolvconf/resolv.conf.d/base
```
```
sudo resolvconf -u
```
```
sudo bash -c 'echo "nameserver 8.8.8.8" > /etc/resolv.conf'
```
```
sudo chattr +i /etc/resolv.conf
```
## END OF Linux
## WSL2
```
sudo rm /etc/resolv.conf
sudo bash -c 'echo "nameserver 8.8.8.8" > /etc/resolv.conf'
sudo bash -c 'echo "[network]" > /etc/wsl.conf'
sudo bash -c 'echo "generateResolvConf = false" >> /etc/wsl.conf'
sudo chattr +i /etc/resolv.conf
```
## END OF WSL2

```
docker network create net_front
```
```
docker network ls
```
```
sudo echo "# Docker local projects" >> /etc/hosts
sudo echo "127.0.0.1       wordpress1.demo-stack.com wordpress2.demo-stack.com" >> /etc/hosts
sudo echo "127.0.0.1       pma-wordpress1.demo-stack.com pma-wordpress2.demo-stack.com" >> /etc/hosts
```
y añadir al fichero hosts de windows
