var $ = jQuery.noConflict();

$(document).ready(function() {
    var featureSlides = $('#screenshots > div.screenshot');

    // First, hide all but the first feature div.
    featureSlides.hide().filter(':first-child').show().css({'position': 'relative'});

    // Create an empty p to use for our slide navigation
    var featureSlideNav = $('<ul id="neatline-feature-gallery-nav"></ul>');

    // For each of the headings, create a nav button and append to featureSlideNav.
    $('#screenshots h2').hide().each(function(){
        // Get the parent div's ID, for use later.
        var slideId = $(this).parent();

        // Create the nav button, using the text from the heading.
        var navLi = $('<li></li>');
        var navButton = $('<a></a>').text($(this).text());

        // When the button is clicked, lets toggle our
        navButton.click(function(){
            featureSlides.hide();
            featureSlides.filter(slideId).fadeIn();
            return false;
        }).css({'cursor': 'pointer'});

        navLi.append(navButton);
        featureSlideNav.append(navLi);
    });

    $('#neatline-feature-gallery').prepend(featureSlideNav);
});