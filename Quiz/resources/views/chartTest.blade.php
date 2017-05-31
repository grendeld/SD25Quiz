<!DOCtype html>
<!-- DATA DRIVEN DOCUMENT VIEW FOR REPORTS -->
<html>
<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="d3/d3.min.js"></script>
  <style>

  #buttonPlace{
    margin: auto;
    width: 50%;
  }

  .axis--x path{
    display: none;
  }
  .bar{
    fill:rgba(80,73,113,1);
  }
  .bar:hover{
    fill:rgba(192,182,207,1);
  }
  .tooltip {
    position: absolute;
    width: 100px;
    height: auto;
    display: none;
    padding: 10px;
    background-color: rgba(243,123,125,0.4);
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.4);
    -moz-box-shadow: 4px 4px 4px 10px rgba(0, 0, 0, 0.4);
    box-shadow: 4px 4px 10px rbga(0, 0, 0, 0.4) pointer-events: none;
    z-index: 10;
  }
  #reuseChart{
    position: relative;
  }
  </style>
</head>
<body>
  <div id="buttonPlace">
    <button type="button" onclick="showIntakes()">View Intakes</button>
    <button type="button" onclick="showPrograms()">View Progams by Type</button>
    <!--<button type="button" onclick="showQuiz1()">View Quiz 1 Marks</button> -->
  </div>
  <div id="reuseChart">
    <svg width="920" height="550"></svg>
  </div>
</body>
<script>

  var barSvg = d3.select("svg"),
      margin = {top: 65, right: 20, bottom: 20, left: 65},
      width = +barSvg.attr("width") - margin.left - margin.right,
      height = +barSvg.attr("height") - margin.top - margin.bottom;

  var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
      y = d3.scaleLinear().rangeRound([height, 0]);

  var g = barSvg.append('g')
      .attr("transform","translate(" + margin.left + "," + margin.top + ")");

      //tooltip
      var toolTip = d3.select('#reuseChart')
      .append('div')
      .attr('class','tooltip');

      toolTip.append('div')
      .attr('class','x'); //changed to x from 'IntakeName'

      toolTip.append('div')
      .attr('class','y'); //changed to y from 'count'

 //i dont remember what this commmented out stuff was for -Chris
  /*d3.json("intakes.json",function(d){
    d.count = +d.count;
    return d;
  },*/
  function showIntakes(){
  d3.json("/intakesd3", updateBar)
};
function showPrograms(){
  d3.json("/programByType", updateBar)
}

  function updateBar(error, data){
    if (error) throw error;

    x.domain(data.map(function(d){return d.x;})); //IntakeName
    y.domain([0,d3.max(data, function(d){return d.y;})]); //count

    g.selectAll('.tick').remove();
    g.append("g")
       .attr("class", "axis_axis--x")
       .attr("transform","translate(0," + height + ")")
       .call(d3.axisBottom(x));

    g.append("g")
       .attr("class", "axis axis--y")
       .call(d3.axisLeft(y).ticks(5))
       .append("text")
       .attr("transform","rotate(-90)")
       .attr("y",6)
       .attr("dy","0.72em")
       .attr("text-anchor","end")
       .text("Average Mark");

    g.selectAll('.bar').remove();
    var bars = g.selectAll(".bar")
    .data(data)
    .enter()
    .append("rect")
    .attr("class","bar")
    .attr("x", function(d) {return x(d.x);})
    .attr("y",function(d){return y(d.y);})
    .attr("width",x.bandwidth())
    .attr("height",function(d){return height - y(d.y);});

    //mouseover function
    bars.on('mouseover', function(d) {
      var total = d3.sum(data.map(function(d){
        return d.y;
      }));
      //tooltip position variables
      var x = d3.event.layerX;
      var y = d3.event.layerY;
      //...and tooltip positioning
      toolTip.style("left",x +"px")
      .style("top",y+"px");

      toolTip.select('.x').html(d.x);
      toolTip.select('.y').html(d.y);
      toolTip.style('display', 'block');
            });

    bars.on('mouseout', function(d) {
     toolTip.style('display','none');
            });

    bars.on('mousemove', function(d) {
           tooltip.style('top', (d3.event.layerY + 10) + 'px')
             .style('left', (d3.event.layerX + 10) + 'px');
         });

  };


</script>
</html>
