<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
?>

<style>
  .sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: #ecf0f1;
    min-height: 100vh;
    padding-top: 20px;
    position: fixed;
  }

  .sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #fff;
  }

  .sidebar a {
    display: block;
    padding: 12px 20px;
    color: #ecf0f1;
    text-decoration: none;
    border-left: 5px solid transparent;
    transition: all 0.3s ease;
  }

  .sidebar a:hover, .sidebar a.active {
    background-color: #34495e;
    border-left: 5px solid #1abc9c;
    color: #1abc9c;
  }

  .menu-section {
    margin-bottom: 10px;
  }

  .menu-title {
    padding: 10px 20px;
    cursor: pointer;
    background-color: #1a252f;
    font-weight: bold;
  }

  .menu-items {
    display: none;
    background-color: #2c3e50;
  }

  .menu-items a {
    padding-left: 40px;
  }

  .menu-title.open + .menu-items {
    display: block;
  }
</style>

<div class="sidebar">
  <h2>Admin</h2>

  <!-- Students -->
  <a href="/Git_Projects/school/School-mangment-Dashboard/modules/students/list_students.php"
     class="<?= $currentPage == 'list_students.php' ? 'active' : '' ?>">
    <i class="fas fa-user-graduate"></i> Students
  </a>

  <!-- Staff -->
  <a href="/Git_Projects/school/School-mangment-Dashboard/modules/staff/staff_list.php"
     class="<?= $currentPage == 'staff_list.php' ? 'active' : '' ?>">
    <i class="fas fa-chalkboard-teacher"></i> Staff
  </a>

  <!-- Collapsible: Exams & Courses -->
  <div class="menu-section">
    <div class="menu-title">Academics</div>
    <div class="menu-items">
      <a href="/Git_Projects/school/School-mangment-Dashboard/modules/exams/exam_list.php"
         class="<?= $currentPage == 'exam_list.php' ? 'active' : '' ?>">
        <i class="fas fa-clipboard-list"></i> Exams
      </a>
      <a href="/Git_Projects/school/School-mangment-Dashboard/modules/courses/course_list.php"
         class="<?= $currentPage == 'course_list.php' ? 'active' : '' ?>">
        <i class="fas fa-book-open"></i> Courses
      </a>
    </div>
  </div>

  <!-- Accounts -->
  <a href="/Git_Projects/school/School-mangment-Dashboard/modules/accounts/account_list.php"
     class="<?= $currentPage == 'account_list.php' ? 'active' : '' ?>">
    <i class="fas fa-wallet"></i> Accounts
  </a>

  <!-- Logout -->
  <a href="/Git_Projects/school/School-mangment-Dashboard/auth/logout.php">
    <i class="fas fa-sign-out-alt"></i> Logout
  </a>
</div>

<!-- JS to Toggle Menu -->
<script>
  const menuTitles = document.querySelectorAll('.menu-title');
  menuTitles.forEach(title => {
    title.addEventListener('click', () => {
      title.classList.toggle('open');
      const items = title.nextElementSibling;
      items.style.display = items.style.display === 'block' ? 'none' : 'block';
    });
  });
</script>
