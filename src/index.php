<?php
//********************* */ 

// Skapad av:
// Martina Jansson
// Datum: 2018-10-28
// Student Mittuniversitetet, Kurs: DT173G

// **************************/
?>
<?php include("config.php");?>
<?php include("includes/header.php");?>

<?php
// Check if users is logged in else ->loginPage
if(isset($_REQUEST["get"])){
    if(strlen($_REQUEST["username"])>0 && strlen($_REQUEST["password"])>0){
        $login->checkInput($_REQUEST["username"], $_REQUEST["password"]);
        
        $user = $_REQUEST["username"];
        $_SESSION['true_user'] = $user;
    } else {
        header("Location: index.php#intro-login");
    }
    unset($_REQUEST["get"]);
    exit();
}
 ?>
<body>
  <!-- Banner-->
 <?php include("includes/banner.php");?>
 <!-- Nav-->
<?php include("includes/mainmenu.php");?>

<!-- Main
====================== -->
<main id="index">
    <section id="intro-a">
        <div class="container">
            <h1 class="section-title">Våra erbjudanden</h1>
            <h4 class="sub-title">
            Vi erbjuder <span>fyra kostnadsfria enskilda möten</span> eller totalt <span>10 timmars</span> konsultation.
            Vid fortsatt uppdrag träffas överenskommelse om ersättning direkt mellan uppdragsgivare och mentor.                    
            </h4>
            <div class="row">
                <div class="column">
                    <div class="icon">
                        <i class="fas fa-users fa-7x"></i>
                    </div>
                    <h3 class="center">Mentorskap</h3>
                    <p  class="center">Vi erbjuder fyra kostnadsfria enskilda möten eller totalt 10 timmars konsultation.
                    Vid fortsatt uppdrag träffas överenskommelse om ersättning direkt mellan uppdragsgivare och mentor.</p>
                
                </div>
                <div class="column">
                    <div class="icon">
                        <i class="fas fa-comments fa-7x"></i>
                    </div>
                    <h3 class="center">Rådgivning</h3>
                    <p  class="center">Ibland står företaget inför avgörande vägval. Det kan gälla expansion, nya marknader, nya produkter och tjänster eller större investeringar.
                    En Roslagsmentorkan då fungera som extern rådgivare och bistå med utredningar, kontakter och förslag till åtgärder.</p>
                </div>
                <div class="column">
                    <div class="icon">
                    <i class="fas fa-signal fa-7x"></i>
                    </div>
                    <h3 class="center">Nulägesanalys</h3>
                    <p class="center">Nulägesanalys med förslag till åtgärdsprogram är ett strukturerat erbjudande där vi gör en grundläggande genomgång av företaget och föreslår åtgärder.</p>
                
                </div>
            </div>
        </div>
    </section>


   <!-- Om Oss-->
    <section id="intro-omoss">
        <div class="container">
            <h1 class="section-title">Om oss</h1>
            <h4 class="sub-title">
            En Roslagsmentor delar med sig av sitt kunnande och tillför erfarenheter och möjligheter till nya kontakter genom sitt eget breda nätverk.
            </h4>
            <article>
                <div class="row">
                    <div class="column _75">
                        <img src="images/omoss.png" alt="bild på glas och karaff" />
                    </div>
                    <div class="column _25">
                        <h3>Vår Förening</h3>
                        <p>Roslagsmentorer är en ideell förening med säte i Norrtälje kommun. Föreningens ändamål är att stimulera och stödja
                        näringslivet i Roslagen genom att ge råd, stöd och operativ hjälp till dess företagare.</p>
                        <p>En Roslagsmentor tror på företagandet och vill aktivt bidra till näringslivets utveckling inom kommunen.</p>
                        <p>Våra mentorer har lång erfarenhet inom förtagande inom Sverige och internationellt med kompletterande kompetenser.
                        Alla mentorer arbetar enligt föreningens <a href="etiska_regler.php">etiska regler.</a></p>
                    </div>
                </div>
            </article>
            <article>
                <div class="row">
                    <div class="column _25">
                        <h3>Våga be om hjälp</h3>
                        <p>Att vara företagare är ibland ensamt. Det kan vara en styrka att ha en person, en mentor, som man som företagare kan prata med,
                            som har en bred företagserfarenhet och som man får ett förtroende för.</p>
                        <p>    
                        Det är ofta nyttigt att få synpunkter från någon som utan ett eget intresse kan se på verksamheten med andra ögon och som inte 
                        sitter fast i den dagliga operativa verksamheten.</p>
                        <p>    
                        Det är också viktigt att engagemanget från båda parter bygger på ett personligt och ömsesidigt förtroende mellan företagaren och
                        mentorn.</p>
                    </div>
                    <div class="column _75">
                        <a href="etiska_regler.php">
                        <img src="images/etiska-regler.png" alt="bild på glas och karaff" /></a>
                    </div>
                </div>
            </article> 
        </div>
    </section>

    <!-- Divider-->
    <section id="intro-divider">
        <div class="container">
            <div class="row">
                <div class="column">
                    
               <h2>“EN ROSLAGSMENTOR HAR VALT ATT “BETALA TILLBAKA” OCH DELA MED SIG AV SINA ERFARENHETER OCH KUNSKAPER FRÅN TIDIGARE YRKESLIV”</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Mentorer-->
    <section id="intro-mentorer">
        <div class="container">
            <div class="row">
                <div class="column">
                    <div class="intro-title">Låt oss presentera</div>
                    <h1 class="section-title">Våra mentorer</h1>
                    <h4 class="sub-title">
                        Våra mentorer har lång erfarenhet inom förtagande inom Sverige och internationellt med kompletterande kompetenser.
                    </h4>
                </div>
            </div>
            <div id="users"></div>
        </div>
        
    </section>

    <!-- Login-->
    <section id="intro-login">
            <div class="row">
                 <div class="user">
                    <div class="intro-title">Är du en mentor eller...</div>
                    <h1 class="section-title">Vill du bli mentor?</h1>
                    <div class="user-info"></div>
                    <p><i class="fas fa-check fa-2x"></i> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat.</p><br/>
                    <p><i class="fas fa-check fa-2x"></i> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat.</p><br/>
                    <p><i class="fas fa-check fa-2x"></i>  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat.</p>
                </div>
                <div class="admin">
                    <div class="intro-title">Är du mentor</div>
                    <h1 class="section-title">Logga in</h1>
                 
                    <form name="myForm" class="login-form" onsubmit="return validateForm()" method="post">
                        <label>Användarnamn</label><br>
                        <input type="text" name="username"/><br><br>
                        <label>Lösenord</label><br>
                        <input type="password" name="password"  id="myInput"/><br>
                        <br>
                        <input type="submit" name="get" value="Logga in"/>
                        <input type="checkbox" onclick="showPassword()"> Visa Lösenord
                        <input class="right" type="button" value="Clear"  onClick="reset()"/>
                    </form>
                </div>
            </div>
    </section>

    <!-- Contact-->
    <section id="intro-contact">
        <div class="container">
            <div class="row">
                <div class="column">
                    <div class="intro-title">Tveka inte, hör av dig</div>
                    <h1 class="section-title">Kontakt</h1>
                    <h4 class="sub-title">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat.                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <h3>Kontaktformulär:</h3>
                    <form>
                        <input name="name" type="text" placeholder=" Namn" />
                        <input name="name" type="text" placeholder=" Ärende" />
                        <input name="email" type="text" placeholder=" E-post" />
                        <textarea name="text" style="height:130px;" placeholder=" Meddelande"></textarea>
                        <input type="submit" value="Skicka" />
                    </form>
                </div>
                <div class="column">
                    <h3>Kontaktinformation:</h3>
                    <p><i class="fa fa-map-marker blue"></i> RM c/o Nils Matsson, <br> Segerboda, Lucktorpsvägen 4,<br>  761 97 Norrtälje</p>
                    <p><i class="fa fa-phone blue" aria-hidden="true"></i> 0176-715 83 </p>
                    <p><i class="fa fa-envelope blue" aria-hidden="true"></i>info@roslagsmentorer.se</p>
                    <p><i class="fab fa-facebook-f blue"></i> <a href="https://www.facebook.com/Roslagsmentorer">Facebook </a> </p>

                </div>
            </div>
        </div>
    </section>
</main>
<!-- Footer
====================== -->
<?php include("includes/footer.php");?>
