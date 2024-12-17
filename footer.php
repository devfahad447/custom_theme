<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qca_schools
 */

 //get_template_part( 'template-parts/content', 'banner_cta' );
 
 wp_footer(); ?>

 <footer class="footer">
    <div class="container">
        <div class="inner">
            <div class="footer__top">
                <div class="footer__links">
                    <a href="">Home</a>
                    <a href="">About Us</a>
                    <a href="">Contact Us</a>
                </div>
                <div class="footer__social">
                    <a href="<?php echo get_option( "footerLogoUrl")?>" class="footer__site--logo">
                        <img src="https://placehold.co/100x104" alt="">
                    </a>
                    <h6>Follow us</h6>
                    <div class="footer__social--links">
                        <a href="<?php echo get_option( "fbUrl")?>" class="fa-brands fa-square-facebook"></a>
                        <a href="<?php echo get_option( "youTubeUrl")?>" class="fa-brands fa-youtube"></a>
                        <a href="<?php echo get_option( "twitterUrl")?>" class="fa-brands fa-twitter"></a>
                        <a href="<?php echo get_option( "instagramUrl")?>" class="fa-brands fa-instagram"></a>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="copyright__text">
                    <p>
                        <?php //echo get_option( "copyRightText")?>
                        Copyright text
                    </p>
                </div>
            </div>
        </div>
    </div>
 </footer>

</body>
</html>
