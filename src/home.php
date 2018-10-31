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
if(!isset($_SESSION['true_user'])) {
    header("Location: index.php#intro-login");
}

/*This is the logged in user*/
$loggedInUser = $_SESSION['true_user'];

/* Logout Session */
if(isset($_REQUEST['destroy'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>

<body>
<!-- Header
====================== -->
<header>
  <?php include('includes/admin_menu.php');?> 
</header> 
<!-- Main
====================== -->

<div class="container">
    <section>
        <!--Welcome-->
        <article>
            <div class="row">
                <div class="column"> 
                    <h1 class="h2">Hej, <?php echo ($loggedInUser); ?></h1> 
                    <hr>
                </div> 
            </div> 

            <!--Add Mentor-->
            <div class="row">
                <div class="column">   
                    <i class="fas fa-plus-square collapsible"> Lägg till mentor</i>
                    <div class="content">
                        <form name="add_form">
                            <input type="text" id="name" name="name" placeholder="Namn...">
                            <input type="text" id="username" name="username" placeholder="Användarnamn...">
                            <input type="text" id="password" name="password" placeholder="Lösenord.....">
                            <input type="text" id="epost" name="epost" placeholder="Epost...">
                            <input type="text" id="phone" name="phone" placeholder="Telefon...">
                            <input type="text" id="disc" name="disc" placeholder="Beskrivning.....">
                            <input type="submit" id="add" value="Lägg till" >
                        </form>
                    </div>
                </div>
                <!--Update Mentor-->
                <div class="column">
                    <i class="fas fa-edit collapsible"> Editera mentor</i>
                    <div class="content">
                        <form>
                            <input type="text" id="useridno" placeholder="Id nummer..." size="3" /><br />
                            <input type="text" id="nameo" placeholder="Name..." /><br />
                            <input type="text" id="usernameo" placeholder="Användarnamn..." /><br />
                            <input type="text" id="passwordo" placeholder="Lösenord..." /><br />
                            <input type="text" id="eposto" placeholder="Epost..." /><br />
                            <input type="text" id="phoneo" placeholder="Telefon..." /><br />
                            <textarea name="text" id="disco"  style="height:130px;" placeholder=" Beskrivning..."></textarea>
                            <input type="submit" id="update" value="Uppdatera" >
                        </form>      
                    </div>
                </div>
            </div>
        </article>
          
        <!--Show Mentorer-->
        <div id="userlist">
            <hr>
        </div>
    </section>
</div>
<!-- Footer
====================== -->
<?php include("includes/footer.php");?>
