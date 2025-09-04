select * from tasks where user_id=2 and status='Backlog';
select count(id) AS task_count,status from tasks group by status;
select tasks.*,users.* from tasks JOIN users ON tasks.user_id=users.id order by users.id,tasks.id;
