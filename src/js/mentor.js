//********************* */ 

// Skapad av:
// Martina Jansson
// Datum: 2018-10-28
// Student Mittuniversitetet, Kurs: DT173G

// **************************/
"use strict";

var URL = "http://localhost/martina/pub/mentorlist.php/users/";


// DOM Onload
document.addEventListener("DOMContentLoaded", function(){ // Wait for DOM tree to get parsed

     // Delete button - click
    document.getElementById("userlist").addEventListener("click", function(ev){ 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("DELETE", URL+"/"+ev.target.id, true); //IDIDIDID OR USERIDIDID?????????????
        xmlhttp.send();

        xmlhttp.onload = function() {
            location.reload();
        }
    })


    // Click - Add - Mentor - POST 
    document.getElementById("add").addEventListener("click", function(ev){
        let name = document.getElementById("name").value;
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let epost = document.getElementById("epost").value;
        let phone = document.getElementById("phone").value;
        let disc = document.getElementById("disc").value;
        if( !(name != '' && username != '' && password != ''  && epost != '' && phone != '' && disc != '') ) location.reload();
        let json =  {"name": name, "username": username, "password": password,  "epost": epost, "phone": phone, "disc": disc};
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", URL, true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
        xmlhttp.send( JSON.stringify(json) );

        xmlhttp.onload = function() {
            location.reload();
        }
  })

  // Click - Update -  Mentor - PUT
    document.getElementById("update").addEventListener("click", function(ev){
        let userid = document.getElementById("useridno").value;
        let name = document.getElementById("nameo").value;
        let username = document.getElementById("usernameo").value;
        let password = document.getElementById("passwordo").value;
        let epost = document.getElementById("eposto").value;
        let phone = document.getElementById("phoneo").value;
        let disc = document.getElementById("disco").value;
        if( !(userid != '' && name != '' && username != '' && password != ''  && epost != '' && phone != '' && disc != '') ) location.reload();
        let json =  {"name": name, "username": username,  "password": password, "epost": epost, "phone": phone, "disc": disc};
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("PUT", URL+"/"+userid, true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
        xmlhttp.send( JSON.stringify(json) );

        xmlhttp.onload = function() {
        location.reload();
        }  
  })

  // Show all Mentorer in userlist - GET
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if (xmlhttp.status == 200) {

                var jsonData = JSON.parse( xmlhttp.responseText );
                for(var i=0; i < jsonData.length; i++){

                   document.getElementById("userlist").innerHTML += 
                   "<div class='row'>"+ 
                   "<div class='column'>"+ " <i class='fas fa-id-card-alt blue fa-2x'>" + " "+ "Id "+ jsonData[i].userid+"</i>"+ "</div>"+
                   "<div class='column'>"+ "<div class='bold'>"+"Namn: "+ "</div>"+  " " + jsonData[i].name+"</div>"+
                   "<div class='column'>"+ "<div class='bold'>"+"Email: "+"</div>"+  " " + jsonData[i].epost+"</div>"+
                   "<div class='column'>"+ "<div class='bold'>"+"Telefon: "+"</div>"+  " " + jsonData[i].phone+"</div>"+
                   "</div>"+
                   "<div class='row'>"+
                   "<div class='column _75'>"+ 
                        "<div class='bold'>"+"Användarnamn: "+"</div>"+  " " +jsonData[i].username+"<br/>"+
                        "<div class='bold'>"+"Lösenord: "+"</div>"+  " " +jsonData[i].password+"<br/>"+"<br/>"+
                   "</div>"+ 

                   "<div class='column _25'>"+
                   "<div class='bold'>"+"Presentation: "+ "</div>"+ " " + jsonData[i].disc+"<br/>"+"<br/>"+
                   "<i class='fas fa-trash-alt delete fa-1x'' id='"+ jsonData[i].userid+"'> Radera "+"</i>"+ " "+

                  // "<button id='"+jsonData[i].userid+"'>Delete #"+jsonData[i].userid+"</button>"+

                   "</div>"+ 
                   "</div>"+ "<hr/>";
                }
           }
           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    };

    xmlhttp.open("GET", URL, true);
    xmlhttp.send();

}); 



// Show all Users in table - GET
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
       if (xmlhttp.status == 200) {

            var jsonData = JSON.parse( xmlhttp.responseText );
            for(var i=0; i < jsonData.length; i++){

               document.getElementById("users").innerHTML += 
               "<div class='row'>"+ 

                "<div class='column '>"+ "<div class='bold'>" + "</div>"+  " " + "BILD "+"</div>"+

                "<div class='column '>"+ "<h2 class='h2'>" + jsonData[i].name+ "</h2>"+ 
                    "<div class='bold'>"+"Email: "+"</div>"+  " " + jsonData[i].epost+ "<br/>"+
                    "<div class='bold'>"+"Telefon: "+"</div>"+  " " + jsonData[i].phone+ "<br/>"+
                "</div>"+

                "<div class='column '>"+ "<h2 class='h2'>"+"Presentation: "+ "</h2>"+
                    "<p>" + jsonData[i].disc+"</p>" + "<br/>"+
                "</div>"+
            "</div>"+"<hr/>";
            }
       }
       else if (xmlhttp.status == 400) {
          alert('There was an error 400');
       }
       else {
           alert('something else other than 200 was returned');
       }
    }
};

xmlhttp.open("GET", URL, true);
xmlhttp.send();