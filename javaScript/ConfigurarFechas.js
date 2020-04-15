$(document).ready(function () {
    if($("#mostrarDias")[0]){
        InicioCalendar();
    }
});

function InicioCalendar(){
    var date = new Date();
    var today = date.getDate();
    // Set click handlers for DOM elements
    $(".right-button").click({ date: date }, next_year);
    $(".left-button").click({ date: date }, prev_year);
    $(".month").click({ date: date }, month_click);
    // Set current month as active
    $(".months-row").children().eq(date.getMonth()).addClass("active-month");
    init_calendar(date);
    
};

// Initialize the calendar by appending the HTML dates
function init_calendar(date) {
    $(".tbody").empty();
    $(".events-container").empty();
    var calendar_days = $(".tbody");
    var month = date.getMonth();
    var year = date.getFullYear();
    var day_count = days_in_month(month, year);
    var row = $("<tr class='table-row'></tr>");
    var today = date.getDate();
    // Set date to 1 to find the first day of the month
    date.setDate(1);
    var first_day = date.getDay();
    // 35+firstDay is the number of date elements to be added to the dates table
    // 35 is from (7 days in a week) * (up to 5 rows of dates in a month)
    for (var i = 0; i < 35 + first_day; i++) {
        // Since some of the elements will be blank, 
        // need to calculate actual date from index
        var day = i - first_day + 1;
        // If it is a sunday, make a new row
        if (i % 7 === 0) {
            calendar_days.append(row);
            row = $("<tr class='table-row'></tr>");
        }
        // if current index isn't a day in this month, make it blank
        if (i < first_day || day > day_count) {
            var curr_date = $("<td class='table-date nil'>" + "</td>");
            row.append(curr_date);
        }
        else {
            var curr_date = $("<td class='table-date'>" + day + "</td>");
            if (today === day && $(".active-date").length === 0) {
                curr_date.addClass("active-date");
               
                show_events(formateaMes((date.getMonth()+1)),day,year);
            }
            // If this date has any events, style it with .event-date
          
                curr_date.addClass("event-date");
            // Set onClick handler for clicking a date
           
            curr_date.click({month: formateaMes((date.getMonth()+1)), day: day,year:year}, date_click);
            row.append(curr_date);
        }
    }
    // Append the last row and set the current year
    calendar_days.append(row);
    $(".year").text(year);
}

// Get the number of days in a given month/year
function days_in_month(month, year) {
    var monthStart = new Date(year, month, 1);
    var monthEnd = new Date(year, month + 1, 1);
    return (monthEnd - monthStart) / (1000 * 60 * 60 * 24);
}

// Event handler for when a date is clicked
function date_click(event) {
    $(".events-container").show(250);
    $("#dialog").hide(250);
    $(".active-date").removeClass("active-date");
    $(this).addClass("active-date");
    show_events(event.data.month, event.data.day,event.data.year);
};

// Event handler for when a month is clicked
function month_click(event) {
    $(".events-container").show(250);
    $("#dialog").hide(250);
    var date = event.data.date;
    $(".active-month").removeClass("active-month");
    $(this).addClass("active-month");
    var new_month = $(".month").index(this);
    date.setMonth(new_month);
    init_calendar(date);
}

// Event handler for when the year right-button is clicked
function next_year(event) {
    $("#dialog").hide(250);
    var date = event.data.date;
    var new_year = date.getFullYear() + 1;
    $("year").html(new_year);
    date.setFullYear(new_year);
    init_calendar(date);
}

// Event handler for when the year left-button is clicked
function prev_year(event) {
    $("#dialog").hide(250);
    var date = event.data.date;
    var new_year = date.getFullYear() - 1;
    $("year").html(new_year);
    date.setFullYear(new_year);
    init_calendar(date);
}
// Display all events of the selected date in card views
function show_events( month, day,year) {

//peticion a ajax del dia recoger las horas y comprobar si existe
let fecha=`${year}-${month}-${day}`;
let DiasFestivos=new Array();
$.ajax({url:"../web/index.php",type:"POST",data:{operacion:"GetDia",fecha:fecha},success:function(respuesta){

    var test = eval(respuesta);
    for(let i=0;i<test.length;i++){
        DiasFestivos.push(test[i][2]);
    }
    // Clear the dates container
    $(".events-container").empty();
    $(".events-container").show(250);
    // If there are no events for this date, notify the user
  
   if( DiasFestivos.length==0){
   
        var event_card = $("<div class='event-card'></div>");
        var event_name = $(`<div class='event-name mt-5'>Insert event <button class="btn btn-dark" id='reservado'>Book</button></div>`);
      
        $(event_card).css({ "border-left": "10px solid #FF1744" });
        $(event_card).append(event_name);
        $(".btn").css({'margin-left':'100px'});
        $(".events-container").append(event_card);
    
}else{ 
    for(let i=0;i<DiasFestivos.length;i++){
        var event_card = $("<div class='event-card'></div>");
        var event_name;
       
                 event_name = $(`<div class='event-name mt-5'>Clear oll<button class="btn btn-dark" id='cancelar'>Cancel</button></div>`);
                
       
        $(event_card).css({ "border-left": "10px solid #FF1744" });
        $(event_card).append(event_name);
        $(".btn").css({'margin-left':'100px'});
        $(".events-container").append(event_card);
       
    }

}
    fechaactual(day,month,year);

   
}}); 


}

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];
function fechaactual(day, month, year){
    let fecha=`${year}-${month}-${day}`;

   $(".event-card #reservado").bind("click",function(event){
         let dia=prompt("Introduce el nombre del dia festivo");
        $.ajax({url:"../web/index.php",type:"POST",data:{operacion:"IntFestivo",fecha:fecha,diaFestivo:dia},succes:function($respuesta){
           let valor=$respuesta;
            if($respuesta){
                alert(`Fantastico acaba de poner festivo el dia ${fecha}`);
            }else{
                alert($respuesta);
            }
        }});
        show_events( month, day,year); 
    });
    
    $(".event-card #cancelar").bind('click',function(event){
         hora=$(this).attr('hora');
        $.ajax({url:"../web/index.php",type:'POST',data:{operacion:"EliminarDiaFestivo",fecha:fecha},success:function($respuesta){
            console.log($respuesta);
        }});
        show_events( month, day,year); 
    });  
     

}
function formateaMes(mes){
    if(mes.toString().length == 1){
        mes = 0+""+mes;
    }
    return mes;
}


