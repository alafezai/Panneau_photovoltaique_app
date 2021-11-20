$(document).ready(function(){
    


  // ________________________________________________
   // ____________________Recherche Tempurature_______
   // ________________________________________________


$("#btnSearch").click(function(){
var datede = $("#datede").val();
var datefin = $("#datefin").val();
// console.log(datede);
// console.log(datefin);
let idser =  $(this).val();
//   console.log(idser);
$.ajax({
url: 'action.php',
method:	"POST",
data	:	{idser:1,date1:datede,date2:datefin},
success: function( data){
$('#ResultatSearch').empty();
$('#ResultatSearch').html( data);
}
});



});

// ----------------------------------------------------------------
// ---------------------Remove Zone de Resultat Tempurature--------
// ----------------------------------------------------------------

$("#removetemp").click(function(){
$('#ResultatSearch').empty();
});








       // ________________________________________________
       // ____________________Recherche Courant___________
       // ________________________________________________


$("#btnSearchCourant").click(function(){
var datede = $("#datedeCourant").val();
var datefin = $("#datefinCourant").val();
// console.log(datede);
// console.log(datefin);
//   let idser =  $(this).val();
//   console.log(idser);
$.ajax({
url: 'action.php',
method:	"POST",
data	:	{idserc:1,date1:datede,date2:datefin},
success: function( data){
$('#ResultatSearchCourant').empty();
$('#ResultatSearchCourant').html( data);
}
});



});

// ----------------------------------------------------------------
// ---------------------Remove Zone de Resultat Courant----------
// --------------------------------------------------------------

$("#removeCourant").click(function(){
$('#ResultatSearchCourant').empty();
});





            // ________________________________________________
           // ____________________Recherche Eclirage__________
            // ________________________________________________


$("#btnSearchEclirage").click(function(){
var datede = $("#datedeEclirage").val();
var datefin = $("#datefinEclirage").val();
// console.log(datede);
// console.log(datefin);
//   let idser =  $(this).val();
//   console.log(idser);
$.ajax({
url: 'action.php',
method:	"POST",
data	:	{idserEcl:1,date1:datede,date2:datefin},
success: function( data){
$('#ResultatSearchEclirage').empty();
$('#ResultatSearchEclirage').html( data);
}
});



});

// ----------------------------------------------------------------
// ---------------------Remove Zone de Resultat Eclirage-----------
// ----------------------------------------------------------------

$("#removeEcliirage").click(function(){
$('#ResultatSearchEclirage').empty();
});





});