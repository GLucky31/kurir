<?php echo "<link rel='stylesheet' href='css/request_form.css'>
  <script>$(document).ready(function(){
          
          
          
      
      var down = false;
      
      $('#bell').click(function(e){
        
          var color = $(this).text();
          if(down){
              
              $('#box').css('height','0px');
              $('#box').css('opacity','0');
              down = false;
          }else{
              
              $('#box').css('height','auto');
              $('#box').css('opacity','1');
              down = true;
              
          }
          
      });
          
          });
          
         
    function redirect(x)
    {
    var url = 'delete_notification.php?id='+x;
    window.location(url);
    }
          </script>";
  echo "
  <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
<a class='navbar-brand' href='#'>MYSTBOX</a>
<div class='collapse navbar-collapse' id='navbarNav'>
  <ul class='navbar-nav'>
    <li class='nav-item active'>
      <a class='nav-link' href='index.php'>Home</a>
    </li>
    <li class='nav-item'>
    <a class='nav-link' href='my_tasks.php'>Tasks</a>
    </li>
    <li class='nav-item'>
    <a class='nav-link' href='logout.php'>Logout</a>
    </li>
  </ul>
</div>";
echo "
<div class='icon' id='bell'> <img src='https://i.imgur.com/AC7dgLA.png' alt=''> </div>
  <div class='notifications' id='box'>
      
      ";
$query="SELECT * FROM notifications WHERE user_id=?";
$stmt=$pdo->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$notifications=$stmt->fetchAll();
$count=$stmt->rowCount();
echo "<h2>Notifications - <span>".$count."</span></h2>";
if($count==0)
{
  echo "<h4>No notifications</h4>";
}
else{
  foreach($notifications as $notification)
  {
   
        echo  "
        <div class='notifications-item'> <a href='delete_notification.php?id=".$notification['notification_id']."'><img src='https://cdn0.iconfinder.com/data/icons/octicons/1024/x-512.png' alt='img'></a>
        <div class='text'>
              <p><div class='notification'>".$notification['content']." has been finished</p>
              <a href='delete_notification.php?id=".$notification['notification_id']."'><i class='fas fa-times'></i></a>
          </div>";
          echo "</div>";

  }}

       
     
      
  echo "</div>";
  echo "
</nav>"; ?>