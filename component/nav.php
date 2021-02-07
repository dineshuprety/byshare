<nav id="nav">
      <div class="header">
        <div class="logo">
          <!-- <img src="assets/images/logo.png" width="50px"> -->
          <h1 class="cusor" onclick="location.href='message.php'">BYSHARE</h1>
        </div>
        <div class="search-bar">

            <form action="search.php" method="GET" name="search_form">
              <input type="text" onkeyup="getLiveSearchUsers($.trim(this.value), '<?php echo $_SESSION['byshare_username']; ?>')" name="q" placeholder="Search..." autocomplete="off" id="search_text_input">
            </form>

          <div class="search_results">
          </div>

          <div class="search_results_footer_empty">
          </div>
		</div>
      </div>
    </nav>
    <style>
      .cusor:hover{
        cursor: pointer;
      }
    </style>