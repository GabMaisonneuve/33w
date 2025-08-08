<?php
$footer_couleur = "#faf2e7";
vague("#85a2b0", $footer_couleur); ?>
<footer class="piedpage" style="background-color: <?= $footer_couleur ?> ;">
    <div class="global">
        <section class="piedpage__ligne-1">
            <div class="piedpage__lien">
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav"
                )) ?>
            </div>
            <div class="piedpage__adresse">
                <h2>Adresse et recherche</h2>
                <p>adresse</p>
                <?php get_search_form() ?>
            </div>

            <div class="piedpage__recherche"></div>
            <div class="piedpage__description"></div>
        </section>
        <section class="piedpage__ligne-2">
            <div class="piedpage__icone">
                <?php icone_sociaux('#f00') ?>
            </div>
        </section>

    </div>

</footer>
<script src="script/checkbox.js"></script>

</body>
<?php wp_footer(); ?>

</html>














