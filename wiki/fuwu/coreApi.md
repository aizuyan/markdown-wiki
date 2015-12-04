### 基本信息

维护人: `小白` 

联系方式: `baiweilong@jikexueyuan.com`

更新时间: `2015-09-12`

所需环境:

- http://fuwu.jikexueyuan.me/api/core/1/    开发环境
- http://fuwu.jikexueyuan.tv/api/core/1/    测试环境
- http://fuwu.jikexueyuan.net/api/core/1/   沙盒 

示例:
```
http://fuwu.jikexueyuan.me/api/core/1/app/login?uid=3275412&context=222
```
###1.公共参数 
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|context|否|string|数据校验| 
|uid|是|int|用户ID| 
|role|是|int|1:学员;2:老师;3:管理员| 

###2.获取用户基本信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/login?uid=3275412&context=222
```
#### HTTP请求方式

`POST`

#### 业务参数
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 

#### 响应字段说明：
|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|apiVersion|是|string|版本|
|context|是|string|效验码|
|id|是|string|随机ID|
|data|是|string|用户信息|

#### 响应示例
```json
{
    apiVersion: "1.0",
    context: "222",
    id: "802aba29-cf1b-4753-91d3-4d1f52d13723",
    data: {
        id: "3275412",
        user: "xiaobai",
        passwd: "cdc7b60180339f285464dac614604b00",
        name: "xiaobai",
        status: "1",
        is_delete: "0",
        created_at: "2015-08-03 15:58:20",
        updated_at: "2015-09-11 18:29:23",
        uid: "3275412",
        nickname: "小白",
        truename: "小白",
        sex: "1",
        email: "",
        phone: "0",
        qq: "0",
        address: "",
        total_homework: "2",
        draw_money: "8.00",
        job_id: "",
        cur_money: "10007.00",
        role: 2
    }
}
```
```json
{
    apiVersion: "1.0",
    context: null,
    id: "e04188b3-7fbb-4986-9c20-3ddc8efd160d",
    error: {
        msg: "参数错误"
    }
}
```
###3.获取职业方向信息


####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/job-list?role=2&uid=3682942
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|job_id|否|int|职业ID| 

#### 响应示例
```json
{
    apiVersion: "1.0",
    context: null,
    id: "01211ae2-f367-4c28-b16f-a57dd0907479",
    data: {
        1: {
            id: "1",
            slug: "android",
            title: "Android工程师",
            preacher_uid: "2",
            market_price: "18999.00",
            eoe_price: "9999.00",
            price: "4999.00",
            intro: null,
            status: "1",
            is_delete: "0",
            created_at: "2015-07-28 16:36:43",
            updated_at: "2015-07-28 16:36:44"
        },
        2: {
            id: "2",
            slug: "web",
            title: "WEB大前端工程师",
            preacher_uid: "1114635",
            market_price: "18999.00",
            eoe_price: "9999.00",
            price: "4999.00",
            intro: null,
            status: "1",
            is_delete: "0",
            created_at: "2015-07-28 16:52:56",
            updated_at: "2015-07-28 16:52:57"
        },
        4: {
            id: "4",
            slug: "java",
            title: "Java基础",
            preacher_uid: "1010455",
            market_price: "999.00",
            eoe_price: "699.00",
            price: "399.00",
            intro: null,
            status: "1",
            is_delete: "0",
            created_at: null,
            updated_at: "2015-09-06 16:43:55"
        }
    }
}
```
```json
{
    apiVersion: "1.0",
    context: null,
    id: "1b4abd2c-5dc3-4107-bcf4-021922f329fb",
    error: {
        msg: "参数错误"
    }
}
```
###4.路径信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/path-list?role=2&uid=3682942&path_id=3
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|path_id|否|int|路径ID| 

###5.班级信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/class-list?role=2&uid=3682942&class_id=3
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|class_id|否|int|班级ID| 

###6.任务信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/task-list?role=2&uid=3682942&task_id=3
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|task_id|否|int|任务ID| 

###7.作业信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/homework-list?role=2&uid=3682942&homework_id=3
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|homework_id|否|int|作业ID| 

###8.路径任务关系

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/path-task-relation?role=1&path_id=1&uid=1
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|path_id|是|int|作业ID| 

###9.任务作业关系

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/task-homework-relation?role=1&task_id=5&uid=1
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|task_id|是|int|作业ID| 


###10.学生班级关系信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/user-class-relation?role=1&uid=2930302
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|必须为1| 
|job_id|否|int|职业方向ID| 
|path_id|否|int|学习路径ID| 
|class_id|否|int|班级ID| 

#### 响应示例

```json
{
    apiVersion: "1.0",
    context: null,
    id: "f2d4f8f2-5425-4487-8050-954cb1014f66",
    data: {
        8: {
            id: "8",
            job_id: "2",
            path_id: "1",
            class_id: "10",
            uid: "2930302",
            truename: "吴欢",
            phone: "15010548483",
            identity: "1",
            learning_objective: null,
            income_money: null,
            refund_money: "0.00",
            code: null,
            channel: null,
            remark: null,
            change_status: null,
            learn_status: "1",
            first_payment_status: "0",
            second_payment_status: "0",
            enroll_status: "1",
            is_delete: "0",
            created_at: "2015-07-18 13:09:41",
            updated_at: "2015-08-03 19:44:03"
        },
        1426: {
            id: "1426",
            job_id: "1",
            path_id: "2",
            class_id: "18",
            uid: "2930302",
            truename: "车问问",
            phone: "13611159264",
            identity: "2",
            learning_objective: null,
            income_money: "0.00",
            refund_money: "0.00",
            code: null,
            channel: null,
            remark: null,
            change_status: null,
            learn_status: "0",
            first_payment_status: "0",
            second_payment_status: "0",
            enroll_status: "1",
            is_delete: "0",
            created_at: "2015-09-07 09:46:20",
            updated_at: "2015-09-07 09:46:20"
        }
    }
}
```
###11.学生任务关系信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/user-task-relation?role=1&uid=3299519&task_id=14
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|必须为1| 
|job_id|否|int|职业方向ID| 
|path_id|否|int|学习路径ID| 
|class_id|否|int|班级ID| 
|task_id|否|int|任务ID| 

#### 响应示例
```json
{
    apiVersion: "1.0",
    context: null,
    id: "7503c90c-5ad2-48ef-a1f0-3c30a97cc88d",
    data: {
        228: {
            id: "228",
            job_id: "2",
            path_id: "1",
            task_id: "14",
            class_id: "10",
            uid: "3299519",
            summary: "许老师点评的很细心，让我知道自己具体哪一方面的问题，是我的思路更清晰，代码更规范。 本周作业让我对CSS有了更深层次的理解，对 position,transform,animation,@keyframes等都有了一定的应用基础和应用经验。通过双飞翼布局也对布局有了更深的理解。 距离任务结束还有1个多小时，提交作业已经关闭了。总的来说这周的学习还是很有收获的。",
            teacher_uid: "2971624",
            real_teacher_uid: "2971624",
            teacher_summary: "任务于2015-08-21 09:57:36到期，系统自动给出最终成绩为 F；并同时自动开启重修，重修倒计时开始。希望你在接下来的学习中，再接再厉，争取早日通过。",
            grade: "F",
            submit_at: "2015-08-21 08:45:55",
            teacher_submit_at: "2015-08-21 09:57:36",
            status: "3",
            period: "1",
            start_at: "2015-08-14 09:57:36",
            finished_at: "2015-08-21 09:57:36",
            is_delete: "0",
            created_at: "2015-08-14 09:57:36",
            updated_at: "2015-08-21 10:00:01"
        },
        376: {
            id: "376",
            job_id: "2",
            path_id: "1",
            task_id: "14",
            class_id: "10",
            uid: "3299519",
            summary: "许老师点评的很细心，让我知道自己具体哪一方面的问题，是我的思路更清晰，代码更规范。 本周作业让我对CSS有了更深层次的理解，对 position,transform,animation,@keyframes等都有了一定的应用基础和应用经验。通过双飞翼布局也对布局有了更深的理解。",
            teacher_uid: "0",
            real_teacher_uid: "2969274",
            teacher_summary: "hi钰坤.我是志佳老师，我对你的作业整体又过了一遍你的大白呢，渐变用的很不错，而且基本理解了动画原理。而且对CSS掌握的着实不错，双飞翼也随着老师的点评进行了修改，而且你对js也已经预习了，路还长老师相信你会走的更棒！综合评价95",
            grade: "A",
            submit_at: "2015-08-21 21:52:56",
            teacher_submit_at: "2015-08-22 19:37:58",
            status: "1",
            period: "2",
            start_at: "2015-08-21 09:57:36",
            finished_at: "2015-08-22 19:37:58",
            is_delete: "0",
            created_at: "2015-08-21 10:00:01",
            updated_at: "2015-08-22 19:37:58"
        }
    }
}
```
###12.用户作业关系信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/user-homework-relation?role=2&uid=3275412
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;| 
|job_id|否|int|职业方向ID| 
|path_id|否|int|学习路径ID| 
|class_id|否|int|班级ID| 
|task_uid|否|int|任务ID| 
|homework_uid|否|int|作业ID| 

#### 响应示例

```json
{
    apiVersion: "1.0",
    context: null,
    id: "8c257289-5c02-40b3-aa6c-4d5b91c52b06",
    data: {
        2247: {
            id: "2247",
            job_id: "2",
            path_id: "1",
            task_id: "15",
            class_id: "10",
            uid: "3299519",
            homework_id: "35",
            version: "1",
            message: "写了一周时间。。实现一些有意思的功能。",
            homework_url: "/Upload/homework/submit/homework_id_35_20150901200032.zip",
            expect_correction_at: "2015-09-02 14:00:32",
            teacher_uid: "3000658",
            user_is_read: "1",
            user_read_at: "2015-09-02 08:50:54",
            teacher_message: "1 中间模块出现明显失误 2 注意小模块的细节 3 注意修改字体 总结来说，细节很重要，请尽可能的完整写出首页。",
            teacher_video_url: "/Upload/homework/video/homework_id_35_20150901213134.mp4",
            teacher_resource_url: null,
            score: "80",
            period: "2",
            remark_at: "2015-09-01 21:31:34",
            rob_status: "0",
            rob_at: "2015-09-01 20:54:37",
            status: "1",
            is_delete: "0",
            created_at: "2015-09-01 20:00:32",
            updated_at: "2015-09-02 08:50:54",
            evaluate_id: "79",
            star: "1",
            content: "连我的代码都没评析，拿着极客学院的首页对比了下就完事了。他拿firefox测试，出现了兼容性问题，也不说明原因，以及如何改正，就说了句你这里和首页不一样。 "
        },
        2841: {
            id: "2841",
            job_id: "2",
            path_id: "1",
            task_id: "15",
            class_id: "10",
            uid: "3299519",
            homework_id: "35",
            version: "2",
            message: "修复之前出现的问题，因为工作量太大，一些效果并没有完全实现",
            homework_url: "/Upload/homework/submit/homework_id_35_20150905101343.zip",
            expect_correction_at: "2015-09-05 16:13:44",
            teacher_uid: "3651902",
            user_is_read: "1",
            user_read_at: "2015-09-09 08:39:46",
            teacher_message: "视频中老师指出的几点建议，希望对你有帮助，继续努力，加油！",
            teacher_video_url: "/Upload/homework/video/homework_id_35_20150907173749.mp4",
            teacher_resource_url: null,
            score: "90",
            period: "2",
            remark_at: "2015-09-07 17:37:49",
            rob_status: "0",
            rob_at: "2015-09-07 17:18:13",
            status: "1",
            is_delete: "0",
            created_at: "2015-09-05 10:13:43",
            updated_at: "2015-09-09 08:39:45",
            evaluate_id: "711",
            star: "4",
            content: "可能是因为代码量比较大吧，老师有些地方也没有细看。比如只有把焦点轮播图的style=&quot;left:-600px&quot;写成行内式。用js才能实现轮播图的切换。"
        }
    }
}

```

###13.获取作业的详细评价

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/homework-evaluate-reason?role=1&uid=3299519&homework_id=2247
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;| 
|homework_uid|是|int|作业ID| 

#### 响应示例

```json
{
    apiVersion: "1.0",
    context: null,
    id: "4624fd8c-5044-4563-b4b8-f4844dae209c",
    data: [
    {
        id: "1",
        content: "老师水平太低，讲的没有条理",
        num: "7",
        status: "1",
        is_delete: "0",
        created_at: "2015-08-28 19:17:16",
        updated_at: "2015-09-03 10:01:11",
        pivot: {
            user_homework_id: "2247",
            reason_id: "1"
        }
    },
    {
        id: "2",
        content: "没有回答我提出的问题",
        num: "3",
        status: "1",
        is_delete: "0",
        created_at: "2015-08-28 19:17:16",
        updated_at: "2015-09-02 13:00:16",
        pivot: {
            user_homework_id: "2247",
            reason_id: "2"
        }
    },
    {
        id: "3",
        content: "没有给我提出任何修改建议",
        num: "5",
        status: "1",
        is_delete: "0",
        created_at: "2015-08-28 19:17:16",
        updated_at: "2015-09-03 10:01:11",
        pivot: {
            user_homework_id: "2247",
            reason_id: "3"
        }
    }
    ]
}
```
###14.星等级对应评分信息

####调用地址

```
http://fuwu.jikexueyuan.me/api/core/1/app/evaluate-list?role=2&uid=3682942&star=3
```
#### HTTP请求方式

`GET`

#### 业务参数

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|star|是|int|几星| 



