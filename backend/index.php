<?php include 'header.php'; include 'db.php'; ?>
<h2>Upcoming NESCON Events</h2>
<?php
$result = $conn->query("SELECT * FROM events ORDER BY id");
if ($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<div class='card'><h3>".htmlspecialchars($row['title'])."</h3>";
    echo "<p><b>Category:</b> ".htmlspecialchars($row['category'])." | <b>Date:</b> ".htmlspecialchars($row['event_date'])."</p>";
    echo "<p><b>Venue:</b> ".htmlspecialchars($row['venue'])." | <b>Seats:</b> ".(int)$row['seats']."</p>";
    echo "<a class='btn' href='register.php?event_id=".$row['id']."'>Register Now</a></div>";
  }
} else { echo "<p>No events found.</p>"; }
$conn->close(); include 'footer.php'; ?>
