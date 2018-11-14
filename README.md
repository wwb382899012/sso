###  版本一：不同服务器不同域名，优雅版（需要使用redis）

访问A系统:  http://a.com  然后登陆 登陆http://api.com/index.php
再访问B系统： http://b.com 



###  版本二：不同服务器不同域名（需要使用redis）

访问A系统:  http://a.com/3/index.php  登陆http://api.com/index.php
再访问B系统： http://b.com/3/index.php 




###  版本三：同服务器不同域名

访问A系统:  http://a.com/2/index.php  登陆
再访问B系统： http://b.com/2/index.php 




###  版本四：同服务器不同子系统

访问A系统:  http://a.test.com/1/index.php  
再访问B系统： http://b.test.com/1/index.php 




注意：版本一、二的host配置
127.0.0.1 a.com
127.0.0.1 b.com
127.0.0.1 api.com

注意：版本三的host配置
127.0.0.1 a.com
127.0.0.1 b.com

注意：版本四的host配置
127.0.0.1 a.test.com
127.0.0.1 b.test.com
