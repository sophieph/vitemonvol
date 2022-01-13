<header>
    <div class="header">
        <?php 
            if (isset($_SESSION['user']) && $_SESSION['user'] == 0) { 
        ?>
        <!-- account -->
        <div class="header-account">
            <a href="?action=account"> <i class="fa fa-user"></i> Mon compte</a> 
            <a href="?action=logoff">Déconnexion</a>
        </div>
        <?php
            } else { 
        ?>
        <!-- sign in/up -->
        <div class="header-sign">
            <a href="?action=signin" class="signing-signin">Sign in</a> 
            <a href="?action=signup" class="signing-signup">Sign up</a>
        </div>
        <?php
            }
        ?>
    </div>

    <h1><a href="/vitemonvol">Vite mon vol !</a></h1>

</header>

<nav>
    <ul>
        <li>
            <a href="?action=trips">Nos circuits</a>
        </li>
        
        <?php 
        if (isset($_SESSION['user']) && $_SESSION['user'] == 'user') {
        ?>
        <li>
            <a href="?action=account" class="account">Mon compte</a>
        </li>
        <li>
            <a href="?action=logoff" class="account">Déconnexion</a>
        </li>

        <?php
        } 
            ?>
        

    </ul>

</nav>