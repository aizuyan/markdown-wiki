## 就业基本信息
======


维护人: `高世岑` `水旭强` `郝朝斐` `张海滨`

联系方式: `gaoshicen@jikexueyuan.com` `shuixuqiang@jikexueyuan.com` `haozhaofei@jikexueyuan.com` `zhanghaibin@jikexueyuan.com`

更新时间: `2015-07-13`


### 环境信息

#### 前端
- http://jiuye.jikexueyuan.net    开发环境
- http://jiuye.jikexueyuan.tv     测试环境
- http://jiuye.jikexueyuan.com    生产环境

#### 后端
- http://ajiuye.jikexueyuan.net    开发环境
- http://ajiuye.jikexueyuan.tv     测试环境
- http://ajiuye.jikexueyuan.com    生产环境

[ 安装方法 ]

```shell
  	~$ cd jiuye
   	~$ git init
   	~$ git remote add eoecn git@bitbucket.org:jikexueyuan/jiuye.git 
   	~$ git pull eoecn master 
```

[ 部署 ]
	::
   
   	部署：project_dir/Public

[ 目录结构 ]

    |-Apps      PHP 核心文件
    |  ├Admin       后台管理目录
    |  | ├Common		后台管理公共文件
    |  | ├Conf			后台管理配置文件					
    |  | ├Controller    项目后台控制器目录
    |  | ├Model    		项目后台模型目录
    |  | └View			项目后台视图目录	
    |  |
    |  ├Home       前端目录
    |  | ├Common		前端公共文件
    |  | ├Conf			前端配置文件					
    |  | ├Controller    前端控制器目录
    |  | ├Model    		前端模型目录
    |  | └View			前端视图目录	
    |  |
    |  ├Common      项目公共文件目录
    |  | ├Common		项目公共文件
    |  | ├Conf			项目公共配置文件					
    |  | └Model    		项目公共模型目录
    |  |
    |  └Runtime      项目运行时产生文件目录
    |
    |-Core      ThinkPHP核心
    |
    |-Cron      脚本目录
    |
    |-Doc		项目文档
    |
    |-Html		前端生成静态文件
    |
    |-Public    公共静态文件目录
    |  |
    |  ├index.php		系统入口文件
    |  ├admin.php		后台管理入口文件
    |  └Current       静态文件目录
    |     ├Admin			后端静态文件目录
    |     └Home				前端静态文件目录
    |
    └Vendor      自定义扩展目录
    
