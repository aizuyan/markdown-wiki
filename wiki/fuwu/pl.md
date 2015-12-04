## 基本信息

维护人: `谭宁` 

联系方式: `tanning@jikexueyuan.com`

更新时间: `2015-10-21`



##保利平台相关信息

保利平台账号：`2795589406@qq.com` ， `pwd: **** `

保利主站：[http://www.polyv.net/](http://www.polyv.net/)

保利管理后台：[http://v.polyv.net/uc/main](http://v.polyv.net/uc/main)

保利开发文档：[http://dev.polyv.net/](http://dev.polyv.net/)


##技术代码信息
脚本执行于fuwu项目根目录

####同步脚本 
1. `./artisan baoli:sync-video --init=init --course_id={$course_id}` 

```
	定时任务，半小时执行一次。		php ./artisan baolicheck:baoli-check-status
	
	初始化操作，只执行一次。		php ./artisan baolicheck:baoli-check-status  --init=init

	手动添加某个课程。				php ./artisan baolicheck:baoli-check-status  --course_id=842
```


####校验脚本
1. `./artisan baolicheck:baoli-check-status`

```
	定时任务，二十分钟执行一次	php ./artisan baolicheck:baoli-check-status
	获取保利平台上所有的视频，与本地的数据库进行比对，将保利上的信息（视频状态）更新到本地。
```


2. `./artisan sync:www-video`

```
	定时任务，每天凌晨执行一次。
	当主站运营人员修改某个课时的原视频链接时，会将该课时新的视频同步更新到保利平台&就业项目上
```



####清理脚本
1. `./artisan baoli:baoli-clear`

```
	定时任务，每月执行一次
	当本地的某个视频标记为已删除状态，那么我们将保利平台上的视频扔到回收站，直至物理删除的操作。
```



####回调接口
1. `http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback?type=upload&vid=15d8ff74603678337718d2e8f6c866e6_1&sign=aaee2324801b8e9fa3de1eae9f250758`

接收保利参数

<table>
	<tr>
		<td>参数</td>
		<td>值</td>
		<td>说明</td>
	</tr>
	<tr>
		<td>vid</td>
		<td> 15d8ff74603678337718d2e8f6c866e6_1 </td>
		<td> 视频VID </td>
	</tr>
	<tr>
		<td>type</td>
		<td> pass, encode, upload, del, invalidVideom, encode_failed, nopass </td>
		<td>保利方的固定参数</td>
	</tr>
	<tr>
		<td>sign</td>
		<td> aaee2324801b8e9fa3de1eae9f250758 </td>
		<td> MD5加密串，规则请移步 http://dev.polyv.net/2013/07/jsapi0020/ </td>
	</tr>

</table>

```
	fuwu项目上开发，提供给保利平台使用。
	每个视频上传完后，保利会调用该接口三次，分别对应不同的状态。
	eg：15d8ff74603678337718d2e8f6c866e6_1
		上传完成	http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback/index?type=upload&vid=15d8ff74603678337718d2e8f6c866e6_1&sign=aaee2324801b8e9fa3de1eae9f250758
		上传失败	http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback/index?type=invalidVideo&vid=15d8ff74603678337718d2e8f6c866e6_1&sign=aaee2324801b8e9fa3de1eae9f250758

		转码成功	http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback/index?type=encode&vid=15d8ff74603678337718d2e8f6c866e6_1&format=flv&df=1&sign=73a141b063d4b31341f8fcde4a333f58  
					http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback/index?type=encode&vid=15d8ff74603678337718d2e8f6c866e6_1&format=hls&df=1&sign=46bd3e0ec7e270710f73fce5e4831070
		转码失败	/video/pl/PLcallback.php?type=encode_failed&vid=15d8ff74603678337718d2e8f6c866e6_1&format=hls&df=1&sign=46bd3e0ec7e270710f73fce5e4831070

		审核通过	http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback/index?type=pass&vid=15d8ff74603678337718d2e8f6c866e6_1&sign=29fabe556021f72e29f8d1d82e5ee268
		审核不通过	http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback/index?type=nopass&vid=15d8ff74603678337718d2e8f6c866e6_1&sign=29fabe556021f72e29f8d1d82e5ee268

		已删除		http://fuwu.jikexueyuan.com/api/plvideo/1/plcallback/index?type=del&vid=15d8ff74603678337718d2e8f6c866e6_1&sign=29fabe556021f72e29f8d1d82e5ee268
```

####本地存储表结构
```sql
CREATE TABLE `jkxy_jiuye_pl_video_info` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`vid` varchar(100) NOT NULL DEFAULT '' COMMENT '保利视频ID',
	`job_id` int(11) NOT NULL DEFAULT '0',
	`path_id` int(11) NOT NULL DEFAULT '0',
	`task_id` int(11) NOT NULL DEFAULT '0',
	`course_id` int(11) NOT NULL DEFAULT '0' COMMENT 'coreapi课程ID',
	`lessones_id` int(11) NOT NULL DEFAULT '0' COMMENT 'coreapi课程下的课时ID',
	`lessones_seq` int(11) NOT NULL DEFAULT '1' COMMENT '课程下的课时的seq排序',
	`v_cataid` varchar(300) NOT NULL DEFAULT '0' COMMENT '保利过来的分类ID',
	`v_title` varchar(300) NOT NULL DEFAULT '' COMMENT '保利过来的视频标题',
	`v_desc` varchar(3000) NOT NULL DEFAULT '' COMMENT '保利过来的视频描述',
	`v_tag` varchar(3000) NOT NULL DEFAULT '' COMMENT '保利过来的tag',
	`v_duration` int(11) NOT NULL DEFAULT '0' COMMENT '保利平台的视频时长，单位（秒）',
	`c_lesson_json` text NOT NULL COMMENT '通过接口获取的所有课时信息',
	`c_video_url` varchar(3000) NOT NULL DEFAULT '' COMMENT '通过主站同步得到的视频地址',
	`v_video_url` varchar(3000) NOT NULL DEFAULT '' COMMENT '保利平台提供的主播放地址',
	`v_mp4` varchar(3000) NOT NULL DEFAULT '' COMMENT 'mp4视频播放地址',
	`v_swf_link` varchar(3000) NOT NULL DEFAULT '' COMMENT 'swf播放地址',
	`v_seed` enum('0','1') NOT NULL DEFAULT '0' COMMENT '{0:未加密,1:已加密}',
	`v_ptime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '上传时间',
	`is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '{0:未删除, 1:已删除}',
	`status` smallint(6) NOT NULL DEFAULT '0' COMMENT '{2:审核通过->正常, 1:转码完成->待审核, 0:已提交->转码中, -1:已删除, -2:审核不通过}',
	`created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '记录创建时间',
	`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '记录更新时间',
	PRIMARY KEY (`id`),
	KEY `idx_course_id` (`course_id`),
	KEY `idx_status` (`status`),
	KEY `idx_task_id` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='托管在保利的视频信息表';
```


