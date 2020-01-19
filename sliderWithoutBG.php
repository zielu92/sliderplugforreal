<?php  global $post; ?>
<div class="slideshow-container">

    <?php
    query_posts('post_type=Slides');
    if( have_posts() ) {
        while (have_posts()) : the_post(); ?>
            <!-- slidy-->
            <div class="mySlides fade">
                <img src="<?php echo get_post_meta($post->ID, 'URL obrazka przezroczystego', true); ?>" style="width:100%">

                <a href="<?php echo get_post_meta($post->ID, 'URL Oferty', true); ?>" target="_blank">
                    <div class="text">Zoba oferte</div>
                </a>
            </div>
            <!--    Koniec slidow-->
        <?php endwhile; }?>
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>