## Api 文档
[点击](api.md)

## Host 
- http://127.0.0.1:8000/ : SMIS 客户端入口
- http://127.0.0.1:8000/admin/auth/login : SMIS 管理员入口（user/password : admin/admin）

## Feature

### Teacher
- [x] 注册
- [x] 申请学校（0:n）
- [x] 系统管理员审批申请，申请通过自动成为学校管理员
- [x] 学校管理员通过邮箱邀请普通教师 (TODO 邮件发送到 storage/laravel.log 需要邮件服务)
- [x] 创建学生，发送消息
- [ ] 普通教师仅查看学生
- [x] 查看关注的学生列表

### Student
- [ ] 登录，仅绑定一所学校 (TODO 待校验)
- [x] 即使聊天
- [x] 通知
- [x] 关注，取关教师

### Line
- [x] 登录系统
- [x] 绑定已有用户, 可绑定 1 名教师，N 个学生 (TODO 待仔细校验)

### Admin
- [x] 教师审核
- [x] 消息推送给 Line 用户(TODO 待校验)
- 

