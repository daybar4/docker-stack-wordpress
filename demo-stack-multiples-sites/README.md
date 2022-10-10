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
docker network create net_front
```
```
docker network ls
```
```
sudo echo "# Docker local projects" >> /etc/hosts
sudo echo "127.0.0.1       site1.localhost.com site2.localhost.com" >> /etc/hosts
sudo echo "127.0.0.1       pma-site1.localhost.com pma-site2.localhost.com" >> /etc/hosts
```