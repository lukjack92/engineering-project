$(document).ready(function() {
  $.getJSON('http://127.0.0.1/Bootstrap/database/index.php', function(json) {

    var select = [];
    var Time = new Date();
    var audio = new Audio('audio/beep2.mp3');
    var audioStart = new Audio('audio/startgame.mp3');
    var audioWrong = new Audio('audio/wronganswer.mp3');
    var audioApplause = new Audio('audio/applause.mp3');

    $('#start').on('click', function() {
      questionCounter = 0;
      select = []; //zerowanie tablicy odpowiedzi
      var div = $('<div id="quiz"></div>');
      //var question = $('<div id="answer"></div>');
      var odp = $('<div id="odp"></div>');
      //$('#admin').hide();
      //$('#result').remove();
      $('#next').before(div);
      //$('#quiz').after(question);
      $('#quiz').after(odp);
      $('#start').hide();
      $('#result').hide();
      $('#next').show();
      audioStart.play();
      displayNext();
    });

    $('#next').on('click',function() {
      choose();
      questionCounter++;
      displayNext();
      //audio.play();
    });

    $('#prev').on('click', function() {
      choose();
      questionCounter--;
      displayNext();
    });

    function choose() {
      select[questionCounter] = $('input[name="answer"]:checked').val();
      //alert("Log: " + select[questionCounter]);
    };

    function displayNext(){
      //console.log("Number: " + questionCounter);

      if(json.length == 0)
      {
          viewresult("Baza quiz jest pusta!!!");
      }

      if(questionCounter < json.length)
      {
        if(questionCounter >= 1 && questionCounter <= parseInt(json.length - 1))
        {
          $('#prev').show();
          $('#next').show();
        } else if (questionCounter == parseInt(json.length - 1)) {
          $('#prev').show();
          $('#next').hide();
        } else if (questionCounter == 0) {
          $('#next').show();
          $('#prev').hide();
        } else if (json.length == 1)
        {
          $('#next').show();
        }

        $('#quiz').html('<p class="noselect">' + json[questionCounter].tresc + '</p></br></br>');

        var nextQuestion = createRadioButton(questionCounter);
        $('#odp').html(nextQuestion);
        if (isNaN(select[questionCounter])) {
          $('input[value='+select[parseInt(questionCounter)]+']').prop('checked', true);
        }
      } else {
        questionCounter = 0;

        var result = viewresult();
        $('#quiz').remove();
        //$('#result').hide();
        $('#answer').remove();
        $('#odp').remove();
        $('#prev').hide();
        $('#next').hide();
        $('#start').show();
      }
    };

    function createRadioButton(index)
    {
      var radioList = $('<ul>');
      var item;
      var input = '';
      var array = ["a","b","c","d"];

        item = $('<li>');
        input = '<label><input type="radio" name="answer" id="1" value="a" >';
        input += '<p class="noselect">' + json[index].odpa + '</p></label>';
        item.append(input);
        radioList.append(item);

        item = $('<li>');
        input = '<label><input type="radio" name="answer" id="2" value="b" >';
        input += '<p class="noselect">' + json[index].odpb + '</p></label>';
        item.append(input);
        radioList.append(item);

        item = $('<li>');
        input = '<label><input type="radio" name="answer" id="3" value="c" >';
        input += '<p class="noselect">' + json[index].odpc + '</p></label>';
        item.append(input);
        radioList.append(item);

        item = $('<li>');
        input = '<label><input type="radio" name="answer" id="4" value="d" >';
        input += '<p class="noselect">' + json[index].odpd + '</p></label>';
        item.append(input);
        radioList.append(item);

      return radioList;
    };

    function viewresult(text) {

      var result = $('<div id="result"></div>');

      $('#next').after(result);

      var numCorrect = 0;
      for (var i = 0; i < select.length; i++) {
        if (select[i] === json[i].answer) {
          numCorrect++;
        }
      }

      if((json.length*0.70) < numCorrect)
      {
        audioApplause.play();
      }

      if(text == null)
      {
        result.html('<div class="alert alert-info"><center><strong>123Info!</strong> You got ' + numCorrect + ' questions out of ' + json.length + '  right!!!</center>');
        return numCorrect;
      }else
      {
        result.html('<div class="alert alert-info"><center><strong>Info!</strong>   ' + text + '</center>')
      }
    };
  });
});
