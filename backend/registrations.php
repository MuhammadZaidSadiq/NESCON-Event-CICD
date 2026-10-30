<?php include 'header.php'; include 'db.php'; ?>
<h2>All Registrations</h2><div class="card"><table><tr><th>ID</th><th>Name</th><th>Email</th><th>Event</th><th>Registered At</th></tr>
<?php
$r=$conn->query("SELECT r.id,r.name,r.email,e.title,r.created_at FROM registrations r JOIN events e ON r.event_id=e.id ORDER BY r.id DESC");
if($r && $r->num_rows>0){ while($row=$r->fetch_assoc()){ echo "<tr><td>".$row['id']."</td><td>".htmlspecialchars($row['name'])."</td><td>".htmlspecialchars($row['email'])."</td><td>".htmlspecialchars($row['title'])."</td><td>".$row['created_at']."</td></tr>"; } } else { echo "<tr><td colspan='5'>No registrations yet.</td></tr>"; }
?>
</table></div>
<?php $conn->close(); include 'footer.php'; ?>
