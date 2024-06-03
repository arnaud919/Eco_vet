<section class="section_cloth_selection">

    <form action="add_cloth.php" method="POST" class="flex_cloth_section">
        <input type="hidden" name="id_cloth" value="<?php echo $cloth_value["id_cloth"] ?>">

        <!-- Image vêtement -->
        <div class="image_cloth_selection">
            <img src=<?php echo "assets_css/img/cloth/".$cloth_value["name_person_type"]."/".$cloth_value["image_url_cloth"] ?> alt=<?php echo $cloth_value["image_url_cloth"] ?>>
        </div>

        <div>
            <!-- Nom vêtement -->
            <div class="name_cloth_selection">
                <?php echo $cloth_name; ?>
            </div>
            <!-- Description vêtement -->
            <div class="description_cloth_selection">
                <?php echo $cloth_value["description_cloth"] ?>
            </div>
            <!-- Tissu vêtement -->
            <div class="fabric_cloth_selection">
                <?php echo $cloth_value["name_fabric"] ?>
            </div>

            <div>Couleur</div>
            <!-- Liste des couleurs disponibles -->
            <select name="name_color" id="name_color" class="select_cloth_selection">
                <?php for($i = 0; $i <= $number_color; $i++){ ?>
                    <option value="<?php echo $stmt_color[$i]["name_color"] ?>">
                        <?php echo $stmt_color[$i]["name_color"] ?>
                    </option>
                <?php } ?>
            </select>

            <!-- Liste des tailles disponibles -->
            <div>Taille</div>
            <select name="name_size" id="name_size" class="select_cloth_selection">
                <?php for($i = 0; $i <= $number_size; $i++){ ?>
                    <option value="<?php echo $stmt_size[$i]["name_size"] ?>">
                        <?php echo $stmt_size[$i]["name_size"] ?>
                    </option>
                <?php } ?>
            </select>

            <!-- Prix vêtement -->
            <div class="price_cloth_selection"><?php echo $cloth_value["price_cloth"] ?> €</div>

            <!-- Quantité à choisir -->
            <div>Quantité</div>
            <select name="quantity" id="quantity">
            <?php for($i = 1; $i <= 10; $i++ ){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
            </select>

            <!-- Bah l'input type submit quoi -->
            <input type="submit" value="Ajouter au panier" class="submit_cloth_selection">
        </div>
    </form>

</section>