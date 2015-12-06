#安装
## 配置nginx
```nginx
server {
    listen 80;
    server_name mdwiki.com;
	
    location / {
	root /datas/wwwroot/markdown-wiki;
	index index.html index.htm;
    }
    location ~ \.(md|php)$ {
	root /datas/wwwroot/markdown-wiki;
	fastcgi_pass 127.0.0.1:9000;
	fastcgi_index index.php;
	fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
	include fastcgi_params;
	rewrite ^(.*)$ /index.php?uri=$1 break;
    }	
}
```
为了让首页有内容，再添加下面的nginx配置
```nginx
location = / {
    rewrite / /wiki/helpers/hotouse.md;
}
```
