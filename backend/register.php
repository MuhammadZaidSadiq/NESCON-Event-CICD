<?php include 'header.php'; include 'db.php'; $msg="";
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $name=$conn->real_escape_string($_POST['name']); $email=$conn->real_escape_string($_POST['email']); $eid=(int)$_POST['event_id'];
  if ($conn->query("INSERT INTO registrations (name,email,event_id) VALUES ('$name','$email',$eid)")) $msg="Registration successful for NESCON!";
  else $msg="Error: ".$conn->error;
}
$events=$conn->query("SELECT * FROM events"); $preselect=isset($_GET['event_id'])?(int)$_GET['event_id']:0;
?>
<h2>Register for an Event</h2>
<?php if($msg) echo "<div class='success'>$msg</div>"; ?>
<div class="card"><form method="POST">
<label>Full Name</label><input type="text" name="name" required>
<label>Email</label><input type="email" name="email" required>
<label>Select Event</label><select name="event_id">
<?php while($e=$events->fetch_assoc()){ $sel=($e['id']==$preselect)?'selected':''; echo "<option value='".$e['id']."' $sel>".htmlspecialchars($e['title'])."</option>"; } ?>
</select><button class="btn" type="submit">Submit Registration</button></form></div>
<?php $conn->close(); include 'footer.php'; ?>
