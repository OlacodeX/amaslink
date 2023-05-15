        
$(function () {
  $("div.col-sm-2").slice(0, 6).show();
  $("#loadMore").on('click', function (e) {
      e.preventDefault();
      $("div.col-sm-2:hidden").slice(0, 6).slideDown();
      if ($("div.col-sm-2:hidden").length == 0) {
          $("#load").fadeOut('slow');
      }
  });
});
    
$(function () {
  $("div.col-sm-3").slice(0, 8).show();
  $("#loadMoree").on('click', function (e) {
      e.preventDefault();
      $("div.col-sm-3:hidden").slice(0, 8).slideDown();
      if ($("div.col-sm-3:hidden").length == 0) {
          $("#load").fadeOut('slow');
      }
  });
});
$(function () {
  $("div.col-sm-4").slice(0, 3).show();
  $("#loadMoree2").on('click', function (e) {
      e.preventDefault();
      $("div.col-sm-4:hidden").slice(0, 3).slideDown();
      if ($("div.col-sm-4:hidden").length == 0) {
          $("#load").fadeOut('slow');
      }
  });
});
function openNav() {
document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
document.getElementById("myNav").style.width = "0%";
}
            // When the user scrolls down 20px from the top of the document, show the button
           
            var navbar = document.getElementById("navBar");
            var sticky = navbar.offsetTop;

            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
                } else {
                document.getElementById("myBtn").style.display = "none";
                }
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }
                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                  document.body.scrollTop = 0;
                  document.documentElement.scrollTop = 0;
                }