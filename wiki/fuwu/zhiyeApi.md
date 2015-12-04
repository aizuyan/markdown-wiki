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
http://fuwu.jikexueyuan.me/api/core/1/app/login?uid=3275412
```

###0. 加密校验方式

#### sign说明



使用 ucAuthcode( json加密源, 'ENCODE', '$auth_key', 60)  

将API需要的参数以json的形式，作为加密源。sign参数不用添加进来。
操作示例:

```php
		$params	= ['uid'=>1267165, 'role'=>1];
		$string	= json_encode( $params );
		$sign	= ucAuthcode( $string, 'ENCODE', Config::get('zhiye.auth_key'), 60);
		$api_url	= 'http://fuwu.jikexueyuan.tv/api/core/1/zhiye/user-task-status?' . http_build_query($params) . '&sign=' . $sign;

		$ch		= curl_init() or die(curl_error());
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$data		= curl_exec( $ch );
		curl_close($ch);
		$data		= json_decode($data, true);
```



###1. 获取某个用户在所有班级下的任务状态

####调用地址
```
http://fuwu.jikexueyuan.me/api/core/1/zhiye/user-task-status?uid=1267165&role=1&sign=7e83LAtLCTcxhYJ06mT7On2AgIo8ucPvF0p0txGUk+Zr9wmYzFhwAQa2VEp5C/IoVsWG7e69Sw
```
#### HTTP请求方式

`GET`

|  参数名 |  必须  |  类型    |   描述   |
| :----   | :-----:   | :----   |  :----  |
|uid|是|int|用户ID| 
|role|是|int|角色标识：1:学员;2:老师;3:管理员| 
|sign|是|string|公共字段：加密串|


#### json格式说明：  
```json
{
    "apiVersion": "1.0", 
    "context": null, 
    "id": "1b4a20f2-1923-4e4e-9c60-a4a40091540e", 
    "data": {
			"$job_id": { // 职业方向ID
					"$path_id": {  // 路径ID
							"$class_id": {  // 班级ID
									"$task_id": { // 任务ID
											"task_id": 任务ID, 
											"class_id": 班级ID, 
											"seq": 任务排序, 
											"title": "任务标题", 
											"grade": 评级{A/B/C/D/F}, 
											"star": 星数{A:3, B:2, C:1, D/F:0}, 
											"status": {1:已学完, 0:未学完/未开启}, 
											"period": 第几次学习/0：未开启
									}
							}
					}
			}
    }
}
```

#### 响应示例

```json
{
    "apiVersion": "1.0", 
    "context": null, 
    "id": "1b4a20f2-1923-4e4e-9c60-a4a40091540e", 
    "data": {
        "1": {
            "2": {
                "9": {
                    "1": {
                        "task_id": 3, 
                        "class_id": 9, 
                        "seq": 1, 
                        "title": "学会Java语言语法", 
                        "grade": "B", 
                        "star": 2, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "2": {
                        "task_id": 4, 
                        "class_id": 9, 
                        "seq": 2, 
                        "title": "理解面向对象", 
                        "grade": "B", 
                        "star": 2, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "3": {
                        "task_id": 5, 
                        "class_id": 9, 
                        "seq": 3, 
                        "title": "学会Android基础知识", 
                        "grade": "B", 
                        "star": 2, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "4": {
                        "task_id": 6, 
                        "class_id": 9, 
                        "seq": 4, 
                        "title": "学会Android基础UI控件", 
                        "grade": "C", 
                        "star": 1, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "5": {
                        "task_id": 28, 
                        "class_id": 9, 
                        "seq": 5, 
                        "title": "理解并会使用Android四大基本组件", 
                        "grade": "F", 
                        "star": 0, 
                        "status": 3, 
                        "period": 1
                    }, 
                    "6": {
                        "task_id": 29, 
                        "class_id": 9, 
                        "seq": 6, 
                        "title": "深入理解Intent及权限体系", 
                        "grade": "A", 
                        "star": 3, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "7": {
                        "task_id": 30, 
                        "class_id": 9, 
                        "seq": 7, 
                        "title": "学会使用Android UI控件", 
                        "grade": "F", 
                        "star": 0, 
                        "status": 3, 
                        "period": 1
                    }, 
                    "8": {
                        "task_id": 31, 
                        "class_id": 9, 
                        "seq": 8, 
                        "title": "学会使用Android动画效果", 
                        "grade": "A", 
                        "star": 3, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "9": {
                        "task_id": 32, 
                        "class_id": 9, 
                        "seq": 9, 
                        "title": "学会使用Android系统功能", 
                        "grade": "B", 
                        "star": 2, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "10": {
                        "task_id": 33, 
                        "class_id": 9, 
                        "seq": 10, 
                        "title": "学会使用Http通信", 
                        "grade": "B", 
                        "star": 2, 
                        "status": 1, 
                        "period": 1
                    }, 
                    "11": {
                        "task_id": 34, 
                        "class_id": 9, 
                        "seq": 11, 
                        "title": "学会使用Socket通信", 
                        "grade": "F", 
                        "star": 0, 
                        "status": 3, 
                        "period": 1
                    }, 
                    "12": {
                        "task_id": 35, 
                        "class_id": 9, 
                        "seq": 12, 
                        "title": "学会使用NDK", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "13": {
                        "task_id": 36, 
                        "class_id": 9, 
                        "seq": 13, 
                        "title": "实现项目:云笔记项目", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "14": {
                        "task_id": 37, 
                        "class_id": 9, 
                        "seq": 14, 
                        "title": "实战项目:打车软件项目", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }
                }
            }, 
            "5": {
                "19": {
                    "1": {
                        "task_id": 44, 
                        "class_id": 19, 
                        "seq": 1, 
                        "title": "Android基础知识", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "2": {
                        "task_id": 46, 
                        "class_id": 19, 
                        "seq": 2, 
                        "title": "Android简单UI控件", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "3": {
                        "task_id": 47, 
                        "class_id": 19, 
                        "seq": 3, 
                        "title": "Android四大基本组件", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "4": {
                        "task_id": 48, 
                        "class_id": 19, 
                        "seq": 4, 
                        "title": "Android四大基本组件的实践与应用", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "5": {
                        "task_id": 49, 
                        "class_id": 19, 
                        "seq": 5, 
                        "title": "深入理解Intent及权限体系", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "6": {
                        "task_id": 50, 
                        "class_id": 19, 
                        "seq": 6, 
                        "title": "全面掌握Android UI控件的用法", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "7": {
                        "task_id": 51, 
                        "class_id": 19, 
                        "seq": 7, 
                        "title": "学会使用Android动画效果", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "8": {
                        "task_id": 52, 
                        "class_id": 19, 
                        "seq": 8, 
                        "title": "学会使用Android系统功能", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "9": {
                        "task_id": 53, 
                        "class_id": 19, 
                        "seq": 9, 
                        "title": "多媒体", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "10": {
                        "task_id": 54, 
                        "class_id": 19, 
                        "seq": 10, 
                        "title": "学会使用Http通信", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "11": {
                        "task_id": 55, 
                        "class_id": 19, 
                        "seq": 11, 
                        "title": "学会使用Socket通信", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "12": {
                        "task_id": 56, 
                        "class_id": 19, 
                        "seq": 12, 
                        "title": "学会使用NDK", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "13": {
                        "task_id": 57, 
                        "class_id": 19, 
                        "seq": 13, 
                        "title": "云笔记项目", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "14": {
                        "task_id": 58, 
                        "class_id": 19, 
                        "seq": 14, 
                        "title": "打车软件项目", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }
                }
            }
        }, 
        "2": {
            "1": {
                "17": {
                    "1": {
                        "task_id": 7, 
                        "class_id": 17, 
                        "seq": 1, 
                        "title": "学会基本的HTML标签骨架以及基本服务器概念", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "2": {
                        "task_id": 13, 
                        "class_id": 17, 
                        "seq": 2, 
                        "title": "学会HTML5新增元素及CSS核心技术", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "3": {
                        "task_id": 14, 
                        "class_id": 17, 
                        "seq": 3, 
                        "title": "学会CSS常用布局技巧以及绘制特殊图形和动画", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "4": {
                        "task_id": 15, 
                        "class_id": 17, 
                        "seq": 4, 
                        "title": "掌握HTML+CSS的基本上核心技巧", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "5": {
                        "task_id": 16, 
                        "class_id": 17, 
                        "seq": 5, 
                        "title": "JavaScript基础入门认识变量", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "6": {
                        "task_id": 17, 
                        "class_id": 17, 
                        "seq": 6, 
                        "title": "掌握JavaScriptDOM和高级技巧", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "7": {
                        "task_id": 18, 
                        "class_id": 17, 
                        "seq": 7, 
                        "title": "掌握Jquery使用深入JavaScript", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "8": {
                        "task_id": 19, 
                        "class_id": 17, 
                        "seq": 8, 
                        "title": "了解面向对象编程以及PHP+MySql入门", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "9": {
                        "task_id": 20, 
                        "class_id": 17, 
                        "seq": 9, 
                        "title": "学习NodeJS(含EcmaScript6)和移动端开发", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "10": {
                        "task_id": 21, 
                        "class_id": 17, 
                        "seq": 10, 
                        "title": "掌握前端工业化框架", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "11": {
                        "task_id": 22, 
                        "class_id": 17, 
                        "seq": 11, 
                        "title": "掌握CSS在工程中的变化", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "12": {
                        "task_id": 23, 
                        "class_id": 17, 
                        "seq": 12, 
                        "title": "掌握JavaScript常用设计模式", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "13": {
                        "task_id": 24, 
                        "class_id": 17, 
                        "seq": 13, 
                        "title": "熟悉版本库操作工具和AngularJS、Cordova", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "14": {
                        "task_id": 25, 
                        "class_id": 17, 
                        "seq": 14, 
                        "title": "熟悉网络安全以及React、ReactNative", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "15": {
                        "task_id": 26, 
                        "class_id": 17, 
                        "seq": 15, 
                        "title": "Linux基础以及JS开发PC软件", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "16": {
                        "task_id": 27, 
                        "class_id": 17, 
                        "seq": 16, 
                        "title": "学习HTML5游戏开发准备进入毕业设计与答辩", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }
                }, 
                "26": {
                    "1": {
                        "task_id": 7, 
                        "class_id": 26, 
                        "seq": 1, 
                        "title": "学会基本的HTML标签骨架以及基本服务器概念", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "2": {
                        "task_id": 13, 
                        "class_id": 26, 
                        "seq": 2, 
                        "title": "学会HTML5新增元素及CSS核心技术", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "3": {
                        "task_id": 14, 
                        "class_id": 26, 
                        "seq": 3, 
                        "title": "学会CSS常用布局技巧以及绘制特殊图形和动画", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "4": {
                        "task_id": 15, 
                        "class_id": 26, 
                        "seq": 4, 
                        "title": "掌握HTML+CSS的基本上核心技巧", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "5": {
                        "task_id": 16, 
                        "class_id": 26, 
                        "seq": 5, 
                        "title": "JavaScript基础入门认识变量", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "6": {
                        "task_id": 17, 
                        "class_id": 26, 
                        "seq": 6, 
                        "title": "掌握JavaScriptDOM和高级技巧", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "7": {
                        "task_id": 18, 
                        "class_id": 26, 
                        "seq": 7, 
                        "title": "掌握Jquery使用深入JavaScript", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "8": {
                        "task_id": 19, 
                        "class_id": 26, 
                        "seq": 8, 
                        "title": "了解面向对象编程以及PHP+MySql入门", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "9": {
                        "task_id": 20, 
                        "class_id": 26, 
                        "seq": 9, 
                        "title": "学习NodeJS(含EcmaScript6)和移动端开发", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "10": {
                        "task_id": 21, 
                        "class_id": 26, 
                        "seq": 10, 
                        "title": "掌握前端工业化框架", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "11": {
                        "task_id": 22, 
                        "class_id": 26, 
                        "seq": 11, 
                        "title": "掌握CSS在工程中的变化", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "12": {
                        "task_id": 23, 
                        "class_id": 26, 
                        "seq": 12, 
                        "title": "掌握JavaScript常用设计模式", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "13": {
                        "task_id": 24, 
                        "class_id": 26, 
                        "seq": 13, 
                        "title": "熟悉版本库操作工具和AngularJS、Cordova", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "14": {
                        "task_id": 25, 
                        "class_id": 26, 
                        "seq": 14, 
                        "title": "熟悉网络安全以及React、ReactNative", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "15": {
                        "task_id": 26, 
                        "class_id": 26, 
                        "seq": 15, 
                        "title": "Linux基础以及JS开发PC软件", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "16": {
                        "task_id": 27, 
                        "class_id": 26, 
                        "seq": 16, 
                        "title": "学习HTML5游戏开发准备进入毕业设计与答辩", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }
                }
            }
        }, 
        "4": {
            "4": {
                "21": {
                    "1": {
                        "task_id": 40, 
                        "class_id": 21, 
                        "seq": 1, 
                        "title": "能写出第一个Java程序", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "2": {
                        "task_id": 41, 
                        "class_id": 21, 
                        "seq": 2, 
                        "title": "初步了解Java面向对象", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "3": {
                        "task_id": 42, 
                        "class_id": 21, 
                        "seq": 3, 
                        "title": "了解抽象类、接口、数组等的使用", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }, 
                    "4": {
                        "task_id": 43, 
                        "class_id": 21, 
                        "seq": 4, 
                        "title": "了解Java集合、流、多线程等知识", 
                        "grade": "", 
                        "star": 0, 
                        "status": 0, 
                        "period": 1
                    }
                }
            }
        }
    }
}
```

