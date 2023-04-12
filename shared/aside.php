

  <!-- ======= Sidebar ======= -->
  <?php if($_SESSION['admin']): ?>
  <aside id="sidebar" class="sidebar">
  
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/CRUD_System/Employees/add.php">
              <i class="bi bi-circle"></i><span>Add Employees</span>
            </a>
          </li>
          <li>
            <a href="/CRUD_System/Employees/list.php">
              <i class="bi bi-circle"></i><span>List Employee</span>
            </a>
          </li>
        </ul> 
      </li>
    </ul>      
    <ul class="sidebar-nav" id="sidebar-nav">
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/CRUD_System/departments/add.php">
              <i class="bi bi-circle"></i><span>Add Department</span>
            </a>
          </li>
          <li>
            <a href="/CRUD_System/departments/list.php">
              <i class="bi bi-circle"></i><span>List Department</span>
            </a>
          </li>
        </ul> 
       </li>
    </ul>


    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/CRUD_System/admin/pages-register.php">
              <i class="bi bi-circle"></i><span>Add Admin</span>
            </a>
          </li>

          <li>
            <a href="/CRUD_System/admin/list.php">
              <i class="bi bi-circle"></i><span>List Admin</span>
            </a>
          </li>

        <?php endif; ?>
        
      </li>
    </ul> 
       
   
        

  
   
      
      <!-- End Tables Nav -->


     


  </aside><!-- End Sidebar-->