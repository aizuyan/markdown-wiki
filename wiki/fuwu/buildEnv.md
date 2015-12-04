[TOC]
# php-fpm + nginx + mysql 编译安装

## 基本信息
    - 维护人: `燕睿涛` 
    - 联系方式: `yanruitao@jikexueyuan.com`
    - 更新时间: `2015-11-13`

## nginx安装

#### 准备工作

1. 需要下载的源码包：
 - [nginx安装包](http://pan.baidu.com/s/1eQ0jPaq)，密码：bi79
 - [pcre源码包](http://pan.baidu.com/s/1eQuKium)，密码：uvqd
 - [zlib源码包](http://pan.baidu.com/s/1pJH21tT)，密码：i6pf

2. 需要安装的依赖包：
```sh
$sudo apt-get install openssl openssl-devel
```

#### 编译安装

```sh
$tar -zxvf nginx-1.8.0.tar.gz
$tar -zxvf pcre-8.36.tar.gz
$tar -zxvf zlib-1.2.8.tar.gz
$cd nginx-1..0
$./configure \
 --prefix=/usr/local \
 --sbin-path=/usr/local/nginx/nginx \
 --conf-path=/usr/local/nginx/nginx.conf \
 --pid-path=/usr/local/nginx/nginx.pid \
 --with-http_ssl_module \
 --with-pcre=../pcre-8.36 \
 --with-zlib=../zlib-1.2.8
$make
$make install
```
#### 验证是否安装成功

在浏览器里面输入localhost，如果看到包含 Welcome to Nginx ! 的字样，说明安转成功。
#### nginx常用命令

```sh
#启动nginx
$/usr/local/nginx/nginx
#关闭nginx
$/usr/local/nginx/nginx -s stop
#重启nginx
$/usr/local/nginx/ngnix -s reload
```

## MYSQL安装

#### 准备工作

1. 需要下载的软件包
  -[mysql源码包](http://pan.baidu.com/s/1jGrolSE)，密码：7qyu

2. 需要依赖的软件包
```sh
$sudo apt-get install cmake
$sudo apt-get install libncurses5-dev
```
3. 设置MYSQL用户和用户组
```sh
$goupadd mysql
$useradd -r -g mysql mysql
```
4. 创建mysql相关目录
```sh
$mkdir -p /usr/local/mysql
$mkdir -p /data/mysqldb
```
#### 编译&安装（时间可能会比较长）

1. 编译安装软件
```sh
$cmake \
 -DCMAKE_INSTALL_PREFIX=/usr/local/mysql \
 -DMYSQL_UNIX_ADDR=/usr/local/mysql/mysql.sock \
 -DDEFAULT_CHARSET=utf8 \
 -DDEFAULT_COLLATION=utf8_general_ci \
 -DWITH_INNOBASE_STORAGE_ENGINE=1 \
 -DWITH_ARCHIVE_STORAGE_ENGINE=1 \
 -DWITH_BLACKHOLE_STORAGE_ENGINE=1 \
 -DWITH_PARTITION_STORAGE_ENGINE= 1 \
 -DSYSCONFDIR=/etc \
 -DMYSQL_DATADIR=/data/mysqldb \
 -DENABLE_DOWNLOADS=1
$
$rm CMakeCache.txt
$make
$make install
```
2. 设置安转目录和数据保存目录所属这为mysql
```sh
$chown -R mysql:mysql /usr/local/mysql
$chown -R mysql:mysql /data/mysqldb
```
3. 修改mysql配置文件my.cnf
```sh
$cp /usr/local/mysql/support-files/my-deault.cnf /etc/my.cnf
```
编辑 /etc/my.cnf ，配置下面内容(这里是我的配置，具体情况不一定非要这样)
```sh
[mysqld]
port=3306
socket=/usr/local/mysql/mysql.sock
datadir=/data/mysqldb
character_set_server=utf8
sql_mode=NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES 
[mysql]
socket=/usr/local/mysql/mysql.sock
[mysqladmin]
socket=/usr/local/mysql/mysql.sock
```
4. 初始化mysql数据库
```sh
$/usr/local/mysql/scripts/mysql_install_db --user=mysql --datadir=/data/mysqldb
```
上面的命令执行成功之后会在 /data/mysqldb 目录下面创建mysql的原始数据。

5. 启动mysql
```sh
$sudo cp /usr/local/mysql/support-files/mysql.server /etc/init.d/mysqld
$service mysqld status
```
上面的操作时间mysqld添加到服务中去，如果看到 `* MySQL is not running`则添加到服务成功。
```sh
$service mysqld start
```
上面的命令是启动mysql进程，可以通过`sudo netstat -tulnp | grep 3306`查看是否是mysqld进程在监听3306，如果存在则说明mysql服务端安装成功。

6. 修改mysql root用户密码
```sh
$cp /usr/local/mysql/bin/mysql /usr/bin/mysql
$cp /usr/local/mysql/bin/mysqladmin /usr/bin/mysqladmin
$mysqladmin -u root password '123456'
$mysql -u root -p
```
执行上面的命令，输入密码 123456 如果看到`Welcome to the MySQL monitor. ...`则说明mysql安装成功

#### mysql常用命令
```sh
$service mysqld start
$service mysqld stop
$service mysqld reload
```
## php安装

#### 准备工作

1. 需要下载的软件包
 -[php源码包](http://pan.baidu.com/s/1ntEOFjj)，密码：uip8
 -[freetype源码包](http://pan.baidu.com/s/1bn8x6aj)，密码：m5pc
 
 2. 依赖的软件包
 ```sh
 $apt-get install curl libcurl3 libcurl3-dev
 $apt-get install libpng3 libpng3-dev
 $apt-get install libmcrypt4 libmcrypt-dev
 ```

#### 编译&安装

```sh
$tar -xvf freetype-2.4.0.tar.bz2
$cd freetype-2.4.0
$./configure --prefix=/usr/local/freetype
$make
$make install
$./configure \
--prefix=/usr/local/php \
--with-config-file-path=/usr/local/php/etc \
--enable-fpm \
--enable-pcntl \
--enable-mysqlnd \
--enable-opcache \
--enable-sockets \
--enable-sysvmsg \
--enable-sysvsem  \
--enable-sysvshm \
--enable-shmop \
--enable-zip \
--enable-ftp \
--enable-soap \
--enable-xml \
--enable-mbstring \
--with-mysql=/usr/local/mysql \
--with-pdo-mysql=/usr/local/mysql \
--with-pcre-regex \
--with-iconv \
--with-zlib \
--with-mcrypt \
--with-gd \
--with-openssl \
--with-mhash \
--with-xmlrpc \
--with-curl \
--with-imap-ssl \
--enable-pdo \
--with-freetype-dir=/usr/local/freetype \
--enable-bcmath \
--with-ldap \
--with-ldap-sasl \
--with-mysqli=mysqlnd
$make
$make install
```
注意，这里有些目录不一定和这里一致，比如说 `--with-freetype-dir=/usr/local/freetype`后面的目录就是年装 freetype 的目录，`-with-mysql=/usr/local/mysql `后面的目录就是你安装mysql的目录，其他需要的扩展需要自行打开。

#### php配置

1. php.ini 管理
从源码包里 copy 一份 php.ini 到 php 安装目录的etc文件夹下`/usr/local/php/etc/php.ini`

2. php-fpm.conf 管理
```sh
$cd /usr/local/php/etc
$cp php-fpm.conf.default php-fpm.conf
```
修改php-fpm.conf中的内容，主要是修改绑定的ip、端口(或者 unix socket )，下面是我的配置，可以适当参考
```sh
pid = run/php-fpm.pid
error_log = log/php-fpm.log
log_level = notice
daemonize = yes
rlimit_files = 1024
user = nobody
group = nobody
listen = 127.0.0.1:9000
pm = dynamic
pm.max_children = 5
pm.start_servers = 2
pm.min_spare_servers = 1
pm.max_spare_servers = 3
```
3. 移动常用命令到 /usr/bin
```sh
$cp /usr/local/php/bin/php /usr/bin/php
$cp /usr/local/php/sbin/php-fpm /usr/bin/php-fpm
```
#### 验证是否安装成功
```sh
$php -v
```
如果看到输出php的版本信息，则说明安转成功。

#### php常用命令
```sh
#启动php-fpm
$php-fpm
#检测是否是php-fpm进程在进测9000端口
$sudo netstat -tunlp | grep 9000
#php-fpm结束进程
$kill -INT `cat /usr/local/php/var/run/php-fpm.pid`
```
## php常用扩展安装

1. imagick
[imageMagick源码包](http://pan.baidu.com/s/1sjMiwk1)，密码：1rmz
[php imagick源码包](http://pan.baidu.com/s/1eQdP1ZG)，密码：fbir
编译安装
```sh
$tar -zxvf ImageMagick.tar.gz
$cd ImageMagick-6.9.2-5
$./configure --prefix=/usr/local/imagemaick
$make 
$make install
$tar -xvf imagick-3.0.1.tgz
$cd imagick-3.0.1
$ /usr/local/php/bin/phpize
$./configure
$./configure --with-php-config=/usr/local/php/bin/php-config --with-imagick=/usr/local/imagemagick
$make
$make install
```
完成之后在php.ini中添加`extension="imagick.so"`

2. memcache
[memcached源码包](http://pan.baidu.com/s/1jG3zMtC)，密码：cn36
[memcache扩展源码包](http://pan.baidu.com/s/1hqhPkbE)，密码：713t
编译安装
```sh
$tar -zxvf memcached-1.4.24.tar.gz
$cd memcached-1.4.24
$./configure --prefix=/usr/local/memcached
$make 
$make install
$tar -xvf memcache-2.2.7.tgz
$cd memcache-2.2.7
$ /usr/local/php/bin/phpize
$ ./configure --with-php-config=/usr/local/php/bin/php-config --enable-memcache --with-zlib-dir
$make
$make install
```
完成之后在php.ini中添加`extension="memcache.so"`

3. redis
[redis扩展源码包](http://pan.baidu.com/s/14vSVO)，密码：dvxe
```sh
$tar -zxvf phpredis-2.2.4.tar.gz
$cd phpredis-2.2.4
$/usr/local/php/bin/phpize
$ ./configure --with-php-config=/usr/local/php/bin/php-config
$make && make install
```
完成之后在php.ini中添加`extension="redis.so"`

4. seaslog
[seaslog扩展源码包](http://pan.baidu.com/s/1kTD7gxD)，密码：qnx9
安装和redis基本一致

5. phalcon
[phalcon源码包](http://pan.baidu.com/s/1ntALmVf)，密码：4t49
```sh
$unzip cphalcon-master.zip
$cd cphalcon-master
$cd build
$sudo ./install
```
如果 phpize 和 php-config 不在 /usr/bin 目录下面，需将这两个 cp 到 /usr/bin 目录下
配置php.ini

## 配置nginx+fastcgi

要将 php-fpm 和 nginx 联系起来还需要在 nginx 配置文件中做些配置。比如在配置文件中默认的 server 中加入下面的 location
```nginx
location ~ \.php$ {
    root           html;
    fastcgi_pass   127.0.0.1:9000;
    fastcgi_index  index.php;
    fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
    include        fastcgi_params;
}
```
## 结尾
如果安装过程中出现什么问题这里没有提到的，欢迎补充进来一起讨论解决。





