<header>
  <nav class="
          flex flex-wrap
          items-center
          justify-between
          w-full
          py-4
          md:py-0
          px-4
          text-lg text-gray-700
          bg-white
        ">
    <div class='py-2'>
      <a href="#">
        <img src="https://i.pinimg.com/originals/16/50/9c/16509cbe222cbd942e8682b30d607f56.png" alt="logo" class="w-14 h-14" />
      </a>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>

    <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
      <ul class="
              pt-4
              text-base text-gray-700
              md:flex
              md:justify-between
              md:gap-x-7 
              md:pt-0">
        <?php
        if (isset($_SESSION['username'])) {
          echo '
              <li>
                <a class="flex items-center justify-center py-2 px-8 bg-white rounded-lg border border-blue-700 block hover:text-white hover:bg-blue-700 duration-150 text-blue-700" href="./handler//logout_handler.php">
                  <p>Logout</p>
                </a>
              </li>    
            ';
        } else {
          echo '
            <li>
              <a class="flex items-center justify-center py-2 px-8 bg-white rounded-lg border border-blue-700 block hover:text-white hover:bg-blue-700 duration-150 text-blue-700" href="./login.php">
                <p>Login</p>
              </a>
            </li>
            <li>
              <a class="flex items-center justify-center py-2 px-8 bg-white rounded-lg border border-blue-700 block hover:text-white hover:bg-blue-700 duration-150 text-blue-700" href="./register.php">
                <p>Signup</p>
              </a>
            </li>
          ';
        }

        ?>
      </ul>
    </div>
  </nav>
</header>