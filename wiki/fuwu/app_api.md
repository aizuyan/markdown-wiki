# 就业APP-API第一版接口定义
###### 避开校验参数方法：在连接中添加 debug=eNIgma

## 1. 用户账号相关
### 二维码登录
<hr/>
#### 调用地址

```
v1/account/login_qr
eg: http://api.jiuye.jikexueyuan.me/v1/account/login_qr?qr_code=bfdeYWgqAu7xq854OprejkuQlLXb18g1sGnZyuHITbVRlefQq7soT4RxeFbt7xk
```

#### HTTP请求方式

`POST`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|qr_code|是|string|通过扫描二维码得到的加密字串，有2分钟的失效时间|


#### 响应字段说明
1. 格式: `json`
2. 业务字段: `data{}`


#### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": {
                "uid": "2930302", 
                "uname": "465964568", 
                "email": "597498742@qq.com", 
                "token": "3a7bbdad971d6fc6fb12a4ab4fdde926",
                "pic": "http://assets.jikexueyuan.com/user/avtar/avatar_2930302.jpg",
                "jiuye": {
                        "role": 1
                }
        }
}
```

### 退出登录接口

#### 调用地址

```
v1/account/logout
eg: http://api.jiuye.jikexueyuan.me/v1/account/logout?uid=3650788
```

#### HTTP请求方式

`POST`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户uid|

#### 响应字段说明
1. 格式: `json`
2. 业务字段: `data{}`

```json
{
        "code": 200, 
        "msg": "success", 
        "data": {
                "status": true, 
        }
}
```

## 2. 业务相关 - 技术方向
接口未开发，此处预留。


## 3. 业务相关 - 班级
### 某个学员报名的班级下的任务、作业、作业版本、作业点评的详细列表信息
<hr/>
#### 调用地址

```
/v1/classes/info_all_my
eg: http://api.jiuye.jikexueyuan.me/v1/classes/info_all_my?class_id=10&uid=2930302
```

#### HTTP请求方式

`POST`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|登录学员的uid|
|class_id|是|int|班级ID|


#### 响应字段说明
1. 格式: `json`
2. 业务字段: `data{}`


#### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": {
                "time_tip": "本周任务已延期#05周05天", 
                "time_tip_color": "#F10101", 
                "time_tip_percent": "1.57", 
                "task_award": "￥400", 
                "class_end_at": "2015/12/02", 
                "class_remian": "10周06天", 
                "class_percent_finsh": "0.38", 
                "class_task_total": 16, 
                "class_task_succ": 5, 
                "tasks": [
                        {
                                "task_level": "C", 
                                "task_status": "", 
                                "task_status_str": "", 
                                "task_description": "学会基本的HTML标签骨架、DTD文档模型、HTML书写规范、行内元素块级元素以及基本服务器概念。", 
                                "task_seq": "1", 
                                "homeworks": [
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "26", 
                                                                "id": "116", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=26&hw_seq=1&tk_seq=1&hwr_id=116", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "26", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "1"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "27", 
                                                                "id": "117", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=27&hw_seq=2&tk_seq=1&hwr_id=117", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "27", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "2"
                                        }
                                ], 
                                "homework_succ": 2, 
                                "homework_total": 2
                        }, 
                        {
                                "task_level": "C", 
                                "task_status": "", 
                                "task_status_str": "", 
                                "task_description": "学会HTML5新增的改良元素以及CSS核心技术和盒子模型，能够基本掌握常用的CSS。", 
                                "task_seq": "2", 
                                "homeworks": [
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "28", 
                                                                "id": "464", 
                                                                "version": "2", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=28&hw_seq=1&tk_seq=2&hwr_id=464", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "28", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "1"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "29", 
                                                                "id": "465", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=29&hw_seq=2&tk_seq=2&hwr_id=465", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "29", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "2"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "30", 
                                                                "id": "466", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=30&hw_seq=3&tk_seq=2&hwr_id=466", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "30", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "3"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "38", 
                                                                "id": "467", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=38&hw_seq=4&tk_seq=2&hwr_id=467", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "38", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "4"
                                        }
                                ], 
                                "homework_succ": 4, 
                                "homework_total": 4
                        }, 
                        {
                                "task_level": "C", 
                                "task_status": "", 
                                "task_status_str": "", 
                                "task_description": "学会CSS常用布局技巧以及绘制特殊图形和动画。", 
                                "task_seq": "3", 
                                "homeworks": [
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "31", 
                                                                "id": "701", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=31&hw_seq=1&tk_seq=3&hwr_id=701", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "31", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "1"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "32", 
                                                                "id": "702", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=32&hw_seq=2&tk_seq=3&hwr_id=702", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "32", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "2"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "33", 
                                                                "id": "703", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=33&hw_seq=3&tk_seq=3&hwr_id=703", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "33", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "3"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "34", 
                                                                "id": "704", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=34&hw_seq=4&tk_seq=3&hwr_id=704", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "34", 
                                                "homework_period": "1", 
                                                "homework_status": 1, 
                                                "homework_seq": "4"
                                        }
                                ], 
                                "homework_succ": 4, 
                                "homework_total": 4
                        }, 
                        {
                                "task_level": "B", 
                                "task_status": "", 
                                "task_status_str": "", 
                                "task_description": "掌握HTML+CSS的基本上核心技巧，可以开发静态页面。", 
                                "task_seq": "4", 
                                "homeworks": [
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "35", 
                                                                "id": "1340", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=35&hw_seq=1&tk_seq=4&hwr_id=1340", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "35", 
                                                "homework_period": "2", 
                                                "homework_status": 1, 
                                                "homework_seq": "1"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "36", 
                                                                "id": "1341", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=36&hw_seq=2&tk_seq=4&hwr_id=1341", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "36", 
                                                "homework_period": "2", 
                                                "homework_status": 1, 
                                                "homework_seq": "2"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "40", 
                                                                "id": "1342", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=40&hw_seq=4&tk_seq=4&hwr_id=1342", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "40", 
                                                "homework_period": "2", 
                                                "homework_status": 1, 
                                                "homework_seq": "4"
                                        }, 
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "41", 
                                                                "id": "1343", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=41&hw_seq=5&tk_seq=4&hwr_id=1343", 
                                                                "version_score": "60"
                                                        }
                                                ], 
                                                "homework_id": "41", 
                                                "homework_period": "2", 
                                                "homework_status": 1, 
                                                "homework_seq": "5"
                                        }
                                ], 
                                "homework_succ": 4, 
                                "homework_total": 4
                        }, 
                        {
                                "task_level": "F", 
                                "task_status": "", 
                                "task_status_str": "已延期", 
                                "task_description": "JavaScript基础入门认识变量", 
                                "task_seq": "5", 
                                "homeworks": [
                                        {
                                                "version": [
                                                        {
                                                                "hw_id": "46", 
                                                                "id": "2141", 
                                                                "version": "1", 
                                                                "version_status": "1", 
                                                                "version_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=46&hw_seq=1&tk_seq=5&hwr_id=2141", 
                                                                "version_score": "20"
                                                        }
                                                ], 
                                                "homework_id": "46", 
                                                "homework_period": "2", 
                                                "homework_status": 1, 
                                                "homework_seq": "1"
                                        }
                                ], 
                                "homework_succ": 0, 
                                "homework_total": 1
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "6"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "7"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "8"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "9"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "10"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "11"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "12"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "13"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "14"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "15"
                        }, 
                        {
                                "task_status": -1, 
                                "task_status_str": "未解锁", 
                                "task_seq": "16"
                        }
                ]
        }
}
```


<hr/>
### 返回所有班级列表信息
<hr/>
#### 调用地址
```
/v1/classes/list
eg: http://api.jiuye.jikexueyuan.me/v1/classes/list?uid=2930302
```

#### HTTP请求方式

`POST`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|学生UID|

#### 响应字段说明
1. 格式: `json`
2. 业务字段: `data{}`


### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": [
                {
                        "id": "9", 
                        "title": "Android工程师就业班一期"
                }, 
                {
                        "id": "10", 
                        "title": "Web大前端工程师就业班一期"
                }, 
                {
                        "id": "17", 
                        "title": "Web大前端工程师就业班三期二班"
                }
        ]
}
```

## 4. 业务相关 - 任务
接口未开发，此处预留。



## 5. 业务相关 - 作业
<hr/>
### 学员提交的作业信息
<hr/>
### 调用地址
```
/v1/homework/relation_info
eg:http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?&uid=1185017&hw_id=26&hwr_id=281&hw_seq=1&tk_seq=2
```
#### HTTP请求方式
`POST`

#### 业务参数
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|hw_id|是|int|老师布置的作业ID|
|hw_seq|是|int|老师布置的作业ID在任务中的排序seq|
|hwr_id|是|int|学员提交的作业ID|
|tk_seq|是|int|任务排序seq|


#### 响应字段说明
1. 格式： `json`
2. 业务字段：`data{}`

### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": {
                "version": "1", 
                "created_at": "2015-08-06 16:29:22", 
                "remark_at": "2015-08-06 21:50:49", 
                "teacher_message": "百度首页开发的作业非常的好，光看页面效果几乎可以达到以假乱真的地步，继续努力。", 
                "teacher_name": "", 
                "teacher_uid": "3016625", 
                "teacher_video_url": "/Upload/homework/video/homework_id_26_20150806215049.mp4", 
                "score": "95", 
                "class_title": "Web大前端工程师就业班一期", 
                "homework_title": "开发百度首页", 
                "homework_seq": "1", 
                "task_title": "学会基本的HTML标签骨架以及基本服务器概念", 
                "task_seq": "2"
        }
}
```


## 6. 业务相关 - 学员作业的点评信息
接口未开发，此处预留。

## 7. 消息相关
### 获取消息列表
<hr/>
### 调用地址
```
/v1/msg/list
eg:http://api.jiuye.jikexueyuan.me/v1/msg/list?uid=2930302
```
#### HTTP请求方式
`POST`

#### 业务参数
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|typee|否|int|消息类型（开班1、作业批改2、任务进阶3、直播通知4、全部null）|
|p|否|int|当前页数|
|n|否|int|每页显示的数量，默认5|

#### 响应字段说明
1. 格式： `json`
2. 业务字段：`data{}`

### 响应示例

```json
{
        "code": 200, 
        "msg": "no data", 
        "data": {
                "page": 0, 
                "total_pages": 3, 
                "page_items": 20, 
                "total_items": 48, 
                "list": [
                        {
                                "msg_id": "1301", 
                                "sender_id": "0", 
                                "receiver_id": "2930302", 
                                "title": "作业已批改", 
                                "content": "你所提交的【任务2，第一个作业，第3版本】老师已经批改完成，得分为【93】分，很不错哦！", 
                                "object_type": "job", 
                                "object_id": "2", 
                                "is_read": "1", 
                                "extra": "{\"hw_id\":\"26\",\"hw_seq\":\"1\",\"tk_seq\":\"2\",\"hwr_id\":\"281\"}", 
                                "created_at": "2015-09-24 12:58:18", 
                                "api_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=26&hw_seq=1&tk_seq=2&hwr_id=281"
                        }, 
                        {
                                "msg_id": "1300", 
                                "sender_id": "0", 
                                "receiver_id": "2930302", 
                                "title": "开班提醒", 
                                "content": "你参加的《Web大前端工程师就业班一期》将于【2015-09-01】开班，请安排好时间，提前做好听课准备。", 
                                "object_type": "job", 
                                "object_id": "1", 
                                "is_read": "1", 
                                "extra": "", 
                                "created_at": "2015-09-24 00:46:51"
                        }, 
                        {
                                "msg_id": "1299", 
                                "sender_id": "0", 
                                "receiver_id": "2930302", 
                                "title": "作业已批改", 
                                "content": "你所提交的【任务2，第一个作业，第3版本】老师已经批改完成，得分为【93】分，很不错哦！", 
                                "object_type": "job", 
                                "object_id": "2", 
                                "is_read": "1", 
                                "extra": "{\"hw_id\":\"26\",\"hw_seq\":\"1\",\"tk_seq\":\"2\",\"hwr_id\":\"281\"}", 
                                "created_at": "2015-09-23 12:42:53", 
                                "api_url": "http://api.jiuye.jikexueyuan.me/v1/homework/relation_info?hw_id=26&hw_seq=1&tk_seq=2&hwr_id=281"
                        }, 
                        {
                                "msg_id": "1298", 
                                "sender_id": "0", 
                                "receiver_id": "2930302", 
                                "title": "开班提醒", 
                                "content": "你参加的《Web大前端工程师就业班一期》将于【2015-09-01】开班，请安排好时间，提前做好听课准备。", 
                                "object_type": "job", 
                                "object_id": "1", 
                                "is_read": "1", 
                                "extra": "", 
                                "created_at": "2015-09-23 00:18:55"
                        }, 
                        {
                                "msg_id": "1297", 
                                "sender_id": "0", 
                                "receiver_id": "2930302", 
                                "title": "任务进阶", 
                                "content": "恭喜你，你参加的《Web大前端工程师就业班一期》课程「任务5」申请未通过，最终等级评分为A，很不错哦，请到web端学习中心详情页查看详情。", 
                                "object_type": "job", 
                                "object_id": "3", 
                                "is_read": "1", 
                                "extra": "", 
                                "created_at": "2015-09-22 12:46:03"
                        }
                ]
        }
}

```


### 设置一批消息为已读
<hr/>
### 调用地址
```
/v1/msg/set_read
eg:http://api.jiuye.jikexueyuan.me/v1/msg/set_read?uid=2930302&msg_id=22,33,23
```
#### HTTP请求方式
`POST`

#### 业务参数
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|msg_id|是|string|一长串消息ID，用“,”（英文状态）分隔。|

#### 响应字段说明
1. 格式： `json`
2. 业务字段：`data{}`

### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": {
                "status": true
        }
}
```

  
  
### 设置一批消息为删除状态
<hr/>
### 调用地址
```
/v1/msg/del
eg:http://api.jiuye.jikexueyuan.me/v1/msg/del?uid=2930302&msg_id=1,2,3
```
#### HTTP请求方式
`POST`

#### 业务参数
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|msg_id|是|string|一长串消息ID，用“,”（英文状态）分隔。|

#### 响应字段说明
1. 格式： `json`
2. 业务字段：`data{}`

### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": {
                "status": true
        }
}
```


### 获取某个用户的未读消息总数
<hr/>
### 调用地址
```
/v1/msg/un_read_count
eg:http://api.jiuye.jikexueyuan.me/v1/msg/un_read_count?uid=2930302
```
#### HTTP请求方式
`POST`

#### 业务参数
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|typee|否|int|消息类型（开班1、作业批改2、任务进阶3、直播通知4、全部null）|

#### 响应字段说明
1. 格式： `json`
2. 业务字段：`data{}`

### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": {
                "total": 34
        }
}
```


## 7. 业务相关 - 用户
### 获取用户的auth_code，来自coreApi
<hr/>
### 调用地址
```
/v1/account/get_token
eg:http://api.jiuye.jikexueyuan.me/v1/account/get_token?uid=2930302
```
#### HTTP请求方式
`POST`

#### 业务参数
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户uid|

#### 响应字段说明
1. 格式： `json`
2. 业务字段：`data{}`

### 响应示例

```json
{
        "code": 200, 
        "msg": "success", 
        "data": "ffbb41fd577ed654a5b2d1b2fad2a89d"
}
```
