<form action="save_marks.php" method="POST">
  <input type="hidden" name="exam_id" value="<?= $_GET['exam_id'] ?>">

  <?php
  $students = $conn->query("SELECT id, name FROM students WHERE class='Class X'");
  while ($s = $students->fetch_assoc()) {
    echo "<label>{$s['name']}</label>
          <input type='number' name='marks[{$s['id']}]' min='0' max='100'><br>";
  }
  ?>
  <button type="submit">Save Marks</button>
</form>
