$(document).ready(function(){
  $('#users').click(function(){
    $('.faqs').hide();
    $('.xrays').hide();
    $('.users').show();
    $('.users').css('display','flex');
    
  })
  $('#faqs').click(function(){
    $('.users').hide();
    $('.xrays').hide();
    $('.faqs').show();
    $('.faqs').css('display','flex');
    
  })
  $('#xrays').click(function(){
    $('.users').hide();
    $('.faqs').hide();
    
    $('.xrays').show();
    $('.xrays').css('display','flex');
    
  })
})
$.ajax({
  url: 'dashBoard.php',
  success: function(data) {
    var positive = data.positive;
    var negative = data.negative;
    var neutral = data.natural;
    console.log(positive);
    console.log(positive, negative, neutral);
  }
});

window.onload = function() {

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    // title: {
    //   text: "Desktop Search Engine Market Share - 2016"
    // },
    data: [{
      type: "pie",
      startAngle: 240,
      yValueFormatString: "##0.00\"%\"",
      indexLabel: "{label} {y}",
      dataPoints: [
        {y:1, label: "positive"},
        {y: 2, label: "negative"},
        {y: 1, label: "neutral"},
        
      ]
    }]
  });
chart.render();
}
// const xmlhttp = new XMLHttpRequest();
// xmlhttp.onload = function(){
//   const myObj = JSON.parse(this.responseText);
//   console.log(myObj[2]);
//   // document.getElementById("demo").innerHTML = myObj[2];
// }
// xmlhttp.open("GET", "dashBoard.php?$pos=", true);
// xmlhttp.send();


// Call the function to fetch data from PHP