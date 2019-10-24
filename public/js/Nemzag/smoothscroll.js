/**
 * Created by PhpStorm.
 * User: nemzag aka Gazmen Arifi
 * Date: 2018-10-01
 * Time: 15:42
 */

// Scroll to a certain element "#title-h2-tableOfContents"

$(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 420, function(){ /* modified to 420 instead of 800 to be the same than with tocbot.min.js */

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});