Mały plugin pod slider.
Użycie:
Dla slidera z przeźroczem:
`<?php echo do_shortcode("[sliderWithoutBG]"); ?>`
Dla slidera bez: 
`<?php echo do_shortcode("[sliderWithBG]"); ?>`

w sliderWithBG.php możemy zmienić sposób wyświetlania naszego sleira bez przeźrocza.
dla sliderWithoutBG.php slider z przeźroczem.

Wywoływanie poszczególnych rzeczy:
`<?php echo the_post_thumbnail_url(); ?>` - zwraca dodaną miniaturkę, z domyślnej opcji dodawania obrazków. 
`<?php echo get_post_meta($post->ID, 'URL Oferty', true); ?>` - zwraca URL oferty.
`<?php echo get_post_meta($post->ID, 'Tekst', true); ?>` - zwraca tekst
`<?php echo get_post_meta($post->ID, 'URL obrazka przezroczystego', true); ?>` - z URL obrazka przezroczystego

Przykładowy JS z https://www.w3schools.com/howto/howto_js_slideshow.asp 
`
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
`

Przykładowy css z https://www.w3schools.com/howto/howto_js_slideshow.asp 
`
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
	max-width: 1000px;
	position: relative;
	margin: auto;
}

/* Hide the images by default */
.mySlides {
	display: none;
}

/* Next & previous buttons */
.prev, .next {
	cursor: pointer;
	position: absolute;
	top: 50%;
	width: auto;
	margin-top: -22px;
	padding: 16px;
	color: white;
	font-weight: bold;
	font-size: 18px;
	transition: 0.6s ease;
	border-radius: 0 3px 3px 0;
	user-select: none;
}

/* Position the "next button" to the right */
.next {
	right: 0;
	border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
	background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
	color: #f2f2f2;
	font-size: 15px;
	padding: 8px 12px;
	position: absolute;
	bottom: 8px;
	width: 100%;
	text-align: center;
}


.active, .dot:hover {
	background-color: #717171;
}

/* Fading animation */
.fade {
	-webkit-animation-name: fade;
	-webkit-animation-duration: 1.5s;
	animation-name: fade;
	animation-duration: 1.5s;
}

@-webkit-keyframes fade {
	from {opacity: .4}
	to {opacity: 1}
}

@keyframes fade {
	from {opacity: .4}
	to {opacity: 1}
}
`

