<?php
if (isset($_GET['search'])) {
    // Échappe les caractères spéciaux pour empêcher l'injection de scripts
    $searchTerm = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
    echo "Résultats de la recherche pour : " . $searchTerm;
} else {
    echo "Utiliser l'url pour afficher quelque chose";
}
?>



<!-- http://localhost/exo2/?search=%3Cscript%3Ealert(%27XSS%27)%3C/script%3E -->

<!-- La fonction htmlspecialchars va convertir des caractères comme < en &lt; et> en &gt;, ce qui neutralise le code malveillant en empêchant les balises HTML et JavaScript de fonctionner comme telles. -->

<!-- Le paramètre ENT_QUOTES garantit que les guillemets simples et doubles sont également convertis, ce qui protège contre les injections dans les attributs HTML -->