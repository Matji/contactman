# Contact Management System
 Set up instruction
  1. import the sql file <b>db_contacts.sql</b> in your database Program, Navicat, PhpMyAdmin etc
  2. configure data base logins by modifying file <b>app/db.php</b>
  3. the file app/main.php is the main application file, it has a class <b>contact</b> which has all the functions e.g findContact(), deleteContact() and etc
  4. this application uses Jqeury ajax to send httprequest to REST api/php file (main.php) which returns JSON object, the request and the response are handled inside <b>index.html</b>
  5. Browser support, all major browsers
