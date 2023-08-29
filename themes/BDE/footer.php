</body>
<?php if (!is_page("registration") && !is_page('my-account')) : ?>
    <footer class="footer" style="">
         <h1 class="section-title footer-title">
             <?php bloginfo('name') ?>
         </h1>
         <hr>
         <div class="footer-content">
    
         </div>
     </footer>
 <?php endif ?>
<?php wp_footer() ?>

</html>