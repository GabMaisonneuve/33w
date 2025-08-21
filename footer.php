<?php
$footer_couleur = "#faf2e7";
vague("#966e49", $footer_couleur);
?>

<footer class="footer" style="background-color: <?= $footer_couleur ?>;">
  <div class="container">

 
    <section class="footer__top">

      <nav class="footer__menu">
        <?php wp_nav_menu(array(
          "menu" => "externe",
          "container" => false,
          "menu_class" => "footer__nav"
        )); ?>
      </nav>


      <div class="footer__info">
        <h2 class="footer__title">Adresse et recherche</h2>
        <p class="footer__adresse">356 Hamel, Québec, QC</p>
        <div class="footer__search">
          <?php get_search_form(); ?>
        </div>
      </div>
    </section>

    <!-- Bottom row -->
    <section class="footer__bottom">
      <div class="footer__socials">
        <?php icone_sociaux('#333') ?>
      </div>
      <p class="footer__copy">&copy; <?= date("Y") ?> - Tous droits réservés.</p>
    </section>
    
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>












