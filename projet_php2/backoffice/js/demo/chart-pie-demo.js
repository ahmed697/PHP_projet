fetch('js/sondage.json')
  .then(response => response.json())
  .then((data) => {
    console.log(data)

    var id_products = [];
    var nbr_vote = [];
    var color = [];
    var hovercolor = [];
    function generateRandomColor(){
        let maxVal = 0xFFFFFF; // 16777215
        let randomNumber = Math.random() * maxVal; 
        randomNumber = Math.floor(randomNumber);
        randomNumber = randomNumber.toString(16);
        let randColor = randomNumber.padStart(6, 0);   
        return `#${randColor.toUpperCase()}`
    } 

    function adjust(color, amount) {
      return '#' + color.replace(/^#/, '').replace(/../g, color => ('0' + Math.min(255, Math.max(0, parseInt(color, 16) + amount)).toString(16)).substr(-2));
    }
   

    data.forEach(produit => {
      var text_id = "id du produit : "; 
      id_products.push(text_id+produit.id_produit);
      nbr_vote.push(produit.nbr_vote);
      var color2 = generateRandomColor()
      color.push(color2);
      hovercolor.push(adjust(color2, -20))

    })

    // console.log(id_products);
  
    // var color = ['#4e73df', '#1cc88a', '#36b9cc','red','pink','blue','green']

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: id_products,
        datasets: [{
          data: nbr_vote,
          backgroundColor: color,
          hoverBackgroundColor: hovercolor,
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });


  });
