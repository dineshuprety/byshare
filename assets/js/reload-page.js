$(document).ready(function() {
  setTimeout(function() {
    cache_clear()
  }, 3000);
});

function cache_clear() {
  window.location.href='message.php';
  
}