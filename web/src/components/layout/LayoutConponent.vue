<template>
  <div class="main-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">Phearith <span>UI</span></a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item">
            <a href="../apps/dashboard.html" class="nav-link">
              <i class="link-icon" data-feather="pie-chart"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#emails"
              role="button"
              aria-expanded="false"
              aria-controls="emails"
            >
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Product</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="../email/inbox.html" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                  <a href="../email/read.html" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                  <a href="../email/sizes.html" class="nav-link">Sizes</a>
                </li>
                <li class="nav-item">
                  <a href="../email/color.html" class="nav-link">Colors</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="../apps/chat.html" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../apps/chat.html" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Profile</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->

    <div class="page-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar">
        <a href="#" class="sidebar-toggler">
          <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
          <form class="search-form">
            <div class="input-group">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
              <input
                type="text"
                class="form-control"
                id="navbarForm"
                placeholder="Search here..."
              />
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="notificationDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i data-feather="bell"></i>
                <div class="indicator">
                  <div class="circle"></div>
                </div>
              </a>
              <div
                class="dropdown-menu p-0"
                aria-labelledby="notificationDropdown"
              >
                <div
                  class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom"
                >
                  <p>6 New Notifications</p>
                  <a href="javascript:;" class="text-muted">Clear all</a>
                </div>
                <div class="p-1">
                  <a
                    href="javascript:;"
                    class="dropdown-item d-flex align-items-center py-2"
                  >
                    <div
                      class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3"
                    >
                      <i class="icon-sm text-white" data-feather="gift"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>New Order Recieved</p>
                      <p class="tx-12 text-muted">30 min ago</p>
                    </div>
                  </a>
                  <a
                    href="javascript:;"
                    class="dropdown-item d-flex align-items-center py-2"
                  >
                    <div
                      class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3"
                    >
                      <i
                        class="icon-sm text-white"
                        data-feather="alert-circle"
                      ></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>Server Limit Reached!</p>
                      <p class="tx-12 text-muted">1 hrs ago</p>
                    </div>
                  </a>
                  <a
                    href="javascript:;"
                    class="dropdown-item d-flex align-items-center py-2"
                  >
                    <div
                      class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3"
                    >
                      <img
                        class="wd-30 ht-30 rounded-circle"
                        src="../../../assets/images/faces/face6.jpg"
                        alt="userr"
                      />
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>New customer registered</p>
                      <p class="tx-12 text-muted">2 sec ago</p>
                    </div>
                  </a>
                  <a
                    href="javascript:;"
                    class="dropdown-item d-flex align-items-center py-2"
                  >
                    <div
                      class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3"
                    >
                      <i class="icon-sm text-white" data-feather="layers"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>Apps are ready for update</p>
                      <p class="tx-12 text-muted">5 hrs ago</p>
                    </div>
                  </a>
                  <a
                    href="javascript:;"
                    class="dropdown-item d-flex align-items-center py-2"
                  >
                    <div
                      class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3"
                    >
                      <i class="icon-sm text-white" data-feather="download"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>Download completed</p>
                      <p class="tx-12 text-muted">6 hrs ago</p>
                    </div>
                  </a>
                </div>
                <div
                  class="px-3 py-2 d-flex align-items-center justify-content-center border-top"
                >
                  <a href="javascript:;">View all</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="profileDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img
                  class="wd-30 ht-30 rounded-circle"
                  src="../../../assets/images/faces/face1.jpg"
                  alt="profile"
                />
              </a>
              <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                <div
                  class="d-flex flex-column align-items-center border-bottom px-5 py-3"
                >
                  <div class="mb-3">
                    <img
                      class="wd-80 ht-80 rounded-circle"
                      src="../../../assets/images/faces/face1.jpg"
                      alt=""
                    />
                  </div>
                  <div class="text-center">
                    <p class="tx-16 fw-bolder">Amiah Burton</p>
                    <p class="tx-12 text-muted">amiahburton@gmail.com</p>
                  </div>
                </div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="profile.html" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Edit Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->

      <div class="page-content"></div>

      <!-- partial:../../partials/_footer.html -->
      <footer
        class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small"
      >
        <p class="text-muted mb-1 mb-md-0">
          Copyright © 2024
          <a href="#" target="_blank">Phearith</a>.
        </p>
        <p class="text-muted">
          Handcrafted With
          <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i>
        </p>
      </footer>
      <!-- partial -->
    </div>
  </div>
</template>
