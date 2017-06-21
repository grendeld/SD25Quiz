
<!DOCTYPE html>
<!-- UPDATED TO INTERACTIVE DONUT CHART
Added drop-shadow -->
 <html>
   <head>
     <meta charset="utf-8">
     <script type="text/javascript" src="d3/d3.min.js"></script>
      <style>

       .legend {
                font-size: 12px;
               }

       rect {
             stroke-width: 2;
             cursor: pointer; /*added */
            }
       rect.disabled { /*added */
              fill: transparent !important;
            }

       #chart {
               height: 360;
               width: 360;
               position: relative;
               margin: 0 auto;
              }
       .tooltip {
                 background: #eee;
                 box-shadow: 0 0 5px #999999;
                 color: #333; /*TODO make color of tooltip simlar color of selcted hover */
                 display: none;
                 font-size: 12px;
                 left: 130px;
                 padding: 10px;
                 position: absolute;
                 text-align: center;
                 top: 95px;
                 width: 80px;
                 z-index: 10;
               }
       .shadow {
                -webkit-filter: drop-shadow( 3px 10px 3px rgba(0,0,0,.5) );
                filter: drop-shadow( 3px 10px 3px rgba(0,0,0,.5) );
               }

       h1{

       }
     </style>
   </head>
   <body>
     <h1>% Completed </h1>
    <div id="chart">

    </div>

   </body>
   <script>

   (function (d3){
     'use strict';

   //circle/donut
   var donutWidth = 75;
   var height = 360;
   var width = 360;
   var radius = Math.min(height,width) / 2;
   var legendRectSize = 18;
   var legendSpacing = 4;

   var color = d3.scaleOrdinal(d3.schemeCategory10);

   var mySvg = d3.select('#chart')
   .append('svg')
   .attr('height',height)
   .attr('width',width)
   .attr('class','shadow')
   .append('g')
   .attr('transform','translate(' + (width/2) + ', ' + (height/2) + ')');



   var arc = d3.arc().innerRadius(radius - donutWidth).outerRadius(radius);

   var pie = d3.pie().value(function(d){return d.count;}).sort(null);



   //tooltip
   var toolTip = d3.select('#chart')
   .append('div')
   .attr('class','tooltip');

   toolTip.append('div')
   .attr('class','label');

   toolTip.append('div')
   .attr('class','count');

   toolTip.append('div')
   .attr('class','percent');


   //data
   d3.csv('rawData.csv', function(error, dataset)
          {
            dataset.forEach(function(d)
            {
              d.count = +d.count;
              d.enabled = true; //added
            });

   var path = mySvg.selectAll('path')
   .data(pie(dataset))
   .enter()
   .append('path')
   .attr('d',arc)
   .attr('fill',function(d, i){ return color(d.data.label); })
   .each(function(d) { this._current = d; }); // added


   //mouseover function
   path.on('mouseover', function(d) {
     var total = d3.sum(dataset.map(function(d){
       return (d.enabled) ? d.count : 0;  // updated from return d.count;
     }));
     var percent = Math.round(1000 * d.data.count / total) / 10;
     toolTip.select('.label').html(d.data.label);
     toolTip.select('.count').html(d.data.count);
     toolTip.select('.percent').html(percent + '%');
     toolTip.style('display', 'block');
           });

   path.on('mouseout', function(d) {
    toolTip.style('display','none');
           });

   path.on('mousemove', function(d) {
          tooltip.style('top', (d3.event.layerY + 10) + 'px')
            .style('left', (d3.event.layerX + 10) + 'px');
        });

   //legend

   var legend = mySvg.selectAll('.legend')
   .data(color.domain())
   .enter()
   .append('g')
   .attr('class','legend')
   .attr('transform',function(d,i){
     var height = legendRectSize + legendSpacing;
     var offset =  height * color.domain().length / 2;
     var horz = -2 * legendRectSize;
     var vert = i * height - offset;
     return 'translate(' + horz + ',' + vert + ')';
   });

// removed semi-colon after strohe color to add...... (click function)
   legend.append('rect')
   .attr('height', legendRectSize)
   .attr('width', legendRectSize)
   .style('fill',color)
   .style('stroke', color)
   .on('click', function(label){

     //check enabled rects, adjust class of rects if enabled/disabled
     var rect = d3.select(this);
     var enabled = true;
     var totalEnabled = d3.sum(dataset.map(function(d){
       return (d.enabled) ? 1 : 0;
     }));

     if(rect.attr('class') === 'disabled')
     {
       rect.attr('class','');
     }
     else
     {
       if (totalEnabled < 2)
       return;
       rect.attr('class', 'disabled');
       enabled = false;
     }

    //redefine how pie will look at data per se
     pie.value(function(d){
       if (d.label === label)
       d.enabled = enabled;
       return (d.enabled) ? d.count : 0;
     });

     path = path.data(pie(dataset));

     //animation
     path.transition()
     .duration(880)
     .attrTween('d', function(d){
       var interpolate = d3.interpolate(this._current, d);
       this._current = interpolate(0);
       return function(t){
         return arc(interpolate(t));
       };
     });

   });

   legend.append('text')
   .attr('x',legendRectSize + legendSpacing)
   .attr('y',legendRectSize - legendSpacing)
   .text(function(d){return d;});


});

//going for shadow, not using, styles with css instead
 /*var defs = mySvg.append('defs')

 var clipPath = defs.append('clipPath')
 .attr('id','clip-circle')
 .attr('r',radius)
 .attr('cy',height/2-10) //XXX not sure
 .attr('cx',width/2 -10);

var filter = defs.append('filter')
.attr('id','drop-shadow')
.attr('height','130%');

filter.append('feGaussianBlur')
.attr('in','SourceAlpha')//XXX not sure
.attr('stdDeviation',6)
.attr('result','blur');

filter.append('feOffset')
.attr('in','blur')
.attr('dx',5)
.attr('dy',5)
.attr('result','offsetBlur');

var feMerge = filter.append('feMerge');

feMerge.append('feMergeNode')
.attr('in','offsetBlur');//XXX not sure
feMerge.append('feMergeNode')
.attr('in','SoureGraphic');

var g = mySvg.append('g')
.attr('filter','url(#drop-shadow)');

g.append('image')//XXX this needs to be specific to our image
      .attr('x', width / 2 - 260)
      .attr('y', height / 2 - 204)
      .attr('height', 408)
      .attr('width', 520)
      .attr('clip-path', 'url(#clip-circle)');*/
//end shadow
             })(window.d3);


   </script>
   </html>
