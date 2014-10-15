/*
Navicat MySQL Data Transfer

Source Server         : 本地MySQL
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-10-04 17:40:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for s_comment
-- ----------------------------
DROP TABLE IF EXISTS `s_comment`;
CREATE TABLE `s_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL DEFAULT '0' COMMENT '数据id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `puid` int(11) DEFAULT '0' COMMENT '父父UID',
  `ip` varchar(100) DEFAULT NULL COMMENT 'ip地址',
  `area` varchar(50) DEFAULT NULL COMMENT '作者地区',
  `content` text COMMENT '内容',
  `post_time` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  `praise` int(11) NOT NULL DEFAULT '0' COMMENT '赞',
  `comment` int(11) NOT NULL DEFAULT '0' COMMENT '子评论数',
  `hot` int(11) NOT NULL DEFAULT '0' COMMENT '热',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `ppid` int(11) NOT NULL DEFAULT '0' COMMENT '父父ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of s_comment
-- ----------------------------
INSERT INTO `s_comment` VALUES ('115', '2', '0', '0', '0.0.0.0', null, '我来抢沙发 ', '1412307550', '44', '4', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('116', '2', '1', '0', '0.0.0.0', null, '恭喜抢到一楼', '1412309182', '3', '0', '0', '0', '115', '0');
INSERT INTO `s_comment` VALUES ('122', '2', '1', '0', '0.0.0.0', null, '<img src=\"./Public/smilies/smilies/icon_mad.gif\" alt=\"\" data-bd-imgshare-binded=\"1\">', '1412312904', '0', '0', '0', '0', '115', '0');
INSERT INTO `s_comment` VALUES ('123', '2', '1', '0', '0.0.0.0', null, '<img src=\"./Public/smilies/smilies/icon_mrgreen.gif\" alt=\"\" data-bd-imgshare-binded=\"1\">咳咳咳<img src=\"./Public/smilies/smilies/icon_razz.gif\" alt=\"\" data-bd-imgshare-binded=\"1\">', '1412313340', '2', '3', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('124', '2', '1', '1', '0.0.0.0', null, '<img src=\"./Public/smilies/smilies/icon_razz.gif\" alt=\"\" data-bd-imgshare-binded=\"1\">', '1412314626', '1', '0', '0', '0', '123', '0');
INSERT INTO `s_comment` VALUES ('125', '2', '1', '0', '0.0.0.0', null, '第三方撒地方', '1412315071', '0', '0', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('126', '2', '1', '0', '0.0.0.0', null, '阿凡达是', '1412315074', '4', '0', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('127', '2', '1', '0', '0.0.0.0', null, '阿凡达fads', '1412315077', '7', '0', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('128', '2', '1', '0', '0.0.0.0', null, '啊发大水范德萨', '1412315080', '0', '0', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('129', '2', '1', '0', '0.0.0.0', null, '啊法撒旦范德萨范德萨', '1412315094', '0', '0', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('130', '2', '1', '0', '0.0.0.0', null, '额我清楚', '1412316684', '0', '0', '0', '0', '123', '0');
INSERT INTO `s_comment` VALUES ('131', '2', '1', '0', '0.0.0.0', null, '企鹅请问', '1412316689', '0', '0', '0', '0', '123', '0');
INSERT INTO `s_comment` VALUES ('132', '2', '1', '0', '0.0.0.0', null, '问问', '1412316698', '0', '0', '0', '0', '115', '0');
INSERT INTO `s_comment` VALUES ('133', '2', '1', '0', '0.0.0.0', null, '企鹅舞', '1412316703', '0', '0', '0', '0', '115', '0');
INSERT INTO `s_comment` VALUES ('134', '1', '0', '0', '0.0.0.0', null, '搞笑', '1412415287', '0', '0', '0', '0', '0', '0');
INSERT INTO `s_comment` VALUES ('135', '1', '0', '0', '0.0.0.0', null, '嘻嘻哈哈', '1412415504', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for s_data
-- ----------------------------
DROP TABLE IF EXISTS `s_data`;
CREATE TABLE `s_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT '类别id',
  `tags` varchar(200) DEFAULT NULL COMMENT '标签 多个用逗号分割',
  `author_id` int(11) NOT NULL DEFAULT '0' COMMENT '作者id',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `desc` text COMMENT '描述',
  `content` text COMMENT '内容',
  `annoymous` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否匿名 1匿名 0 不匿名',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '审核状态1通过 2 作废 0 待审核',
  `view_count` bigint(20) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `post_time` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `ding` bigint(20) NOT NULL DEFAULT '0',
  `cai` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='数据表';

-- ----------------------------
-- Records of s_data
-- ----------------------------
INSERT INTO `s_data` VALUES ('1', '0', '标签1,标签2', '0', '姐，你买吧，你爸都说好看！', '姐，你买吧，你爸都说好看！', '一天妻子问丈夫：“我看你们单位那个会计MM又白又漂亮。”\n丈夫说：“嗨！别提啦，就脸蛋白净，浑身上下全是疙瘩。” \n妻子：“你说什么？”', '0', '1', '0', '1412087645', '14', '-5');
INSERT INTO `s_data` VALUES ('3', '2', 'c,b,c', '1', '老兄，老兄，这可使不得，使不得呀', '老兄，老兄，这可使不得，使不得呀', '<img src=\"/web/Uploads/Picture/2014-08-27/53f16f29bbd9f.jpg\" alt=\"\">', '0', '1', '0', '1412087645', '13', '-5');
INSERT INTO `s_data` VALUES ('2', '0', 'c,b,c', '0', '单位那个会计MM又白又漂亮', '单位那个会计MM又白又漂亮', '朋友老公秃顶，两人看起来差好多岁！一日试衣服，正犹豫买不买？\n服务员说：“姐，你买吧，你爸都说好看！”\n朋友狂笑，冲老公说：“爸，你买单吧！”', '0', '1', '0', '1412087645', '110', '-9');

-- ----------------------------
-- Table structure for s_tag
-- ----------------------------
DROP TABLE IF EXISTS `s_tag`;
CREATE TABLE `s_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `hot` smallint(6) DEFAULT '0' COMMENT '1 热门 0 普通',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Records of s_tag
-- ----------------------------

-- ----------------------------
-- Table structure for s_type
-- ----------------------------
DROP TABLE IF EXISTS `s_type`;
CREATE TABLE `s_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `desc` text COMMENT '描述',
  `icon` varchar(200) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='类别表';

-- ----------------------------
-- Records of s_type
-- ----------------------------

-- ----------------------------
-- Table structure for s_user
-- ----------------------------
DROP TABLE IF EXISTS `s_user`;
CREATE TABLE `s_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL COMMENT '用户名',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(100) DEFAULT NULL COMMENT '昵称',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `resign_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `last_login_time` int(11) DEFAULT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(200) DEFAULT NULL COMMENT 'ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of s_user
-- ----------------------------
INSERT INTO `s_user` VALUES ('1', 'test', '202cb962ac59075b964b07152d234b70', '测试', './Uploads/Avatar/avatar-1.jpg', null, null, '');
INSERT INTO `s_user` VALUES ('0', 'null', null, '网友', './Uploads/Avatar/avatar.jpg', null, null, null);
