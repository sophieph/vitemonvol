<footer>
    <div class="social-media">
        <ul>
            <li> <a href="http://www.twitter.com"><i class="fa fa-twitter"></i> Twitter</a></li>
            <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i> Facebook</a> </li>
            <li><a href="http://www.instagram.com"><i class="fa fa-instagram"></i> Instagram</a></li>
        </ul>

    </div>

    <div class="footer">
        <div class="footer-infos">
            <h2>Assistance</h2>
            <a href="">Assistance</a> <br>
            <a href="">Retours</a><br>
        </div>

        <div class="footer-infos">
            <h2>Informations</h2>
            <a href="">Conditions générales</a><br>
            <a href="">Politique de confidentialité</a><br>
            <a href="">Plan du site</a><br>
        </div>

    </div>

    <div class="copyright">
        <?php 
            if ($_SESSION['user'] !== 'user') {
        ?>
        <a href="?action=admin">connexion admin</a>
        <?php 
            }
        ?>
        <p>ViteMonvol &copy; 2020</p>
    </div>

</footer>