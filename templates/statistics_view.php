    <br/>
    <div style="height:5px"></div>
    <table style="margin-left:auto;margin-right:auto">
      <tr>
        <td><div id="piechart_3d1" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="piechart_3d2" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
    <?php
        print("<div id='numbs' style='height:0px'><p id='year1'>" . htmlspecialchars($statistics[0][0]) . "</p>");
        print("<p id='year2'>" . htmlspecialchars($statistics[0][1]) . "</p>");
        print("<p id='year3'>" . htmlspecialchars($statistics[0][2]) . "</p>");
        print("<p id='year4'>" . htmlspecialchars($statistics[0][3]) . "</p>");
        print("<p id='other'>" . htmlspecialchars($statistics[0][4]) . "</p>");
        print("<p id='dhall'>" . htmlspecialchars($statistics[0][5]) . "</p>");
        print("<p id='dorm'>" . htmlspecialchars($statistics[0][6]) . "</p>");
        print("<p id='bathroom'>" . htmlspecialchars($statistics[0][7]) . "</p>");
        print("<p id='classroom'>" . htmlspecialchars($statistics[0][8]) . "</p>");
        print("<p id='outside'>" . htmlspecialchars($statistics[0][9]) . "</p>");
        print("<p id='otherloc'>" . htmlspecialchars($statistics[0][10]) . "</p></div>");
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie charts for class and location statistics
      google.charts.setOnLoadCallback(drawChartClass);
      google.charts.setOnLoadCallback(drawChartLocation);

      function drawChartClass() { 
        var freshman = parseInt(document.getElementById('year1').innerHTML),
        sophomore = parseInt(document.getElementById('year2').innerHTML),
        junior = parseInt(document.getElementById('year3').innerHTML),
        senior = parseInt(document.getElementById('year4').innerHTML),
        other = parseInt(document.getElementById('other').innerHTML), 
        data = google.visualization.arrayToDataTable([
          ['Person', 'Who is Hearing'],
          ['Freshman', freshman],
          ['Sophomore', sophomore],
          ['Junior', junior],
          ['Senior', senior],
          ['other', other]
        ]);

        var options = {
          title: 'Who is hearing?',
          is3D: true,
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
        chart1.draw(data, options);
      }

      function drawChartLocation() { 
        var dhall = parseInt(document.getElementById('dhall').innerHTML),
        dorm = parseInt(document.getElementById('dorm').innerHTML),
        bathroom = parseInt(document.getElementById('bathroom').innerHTML),
        classroom = parseInt(document.getElementById('classroom').innerHTML),
        outside = parseInt(document.getElementById('outside').innerHTML),
        otherloc = parseInt(document.getElementById('otherloc').innerHTML),
        data = google.visualization.arrayToDataTable([
          ['Location', 'Where are they hearing?'],
          ['Dhall', dhall],
          ['Dorm/House', dorm],
          ['Bathroom', bathroom],
          ['Classroom', classroom],
          ['Outside', outside],
          ['other', otherloc]
        ]);

        var options = {
          title: 'Where are they hearing?',
          is3D: true,
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart2.draw(data, options);
      }
    </script>
    <br/>
