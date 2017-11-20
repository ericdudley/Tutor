-- Get list of all users who have asked questions ordered by the number of questions asked
select name,count(name) from Question group by name order by count(name);
-- Get list of all tutors who have deleted questions ordered by the number of questions deleted
select deleted_by,count(deleted_by) from Question group by deleted_by order by count(deleted_by);
