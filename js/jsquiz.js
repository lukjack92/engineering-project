$(document).ready(function() {
  $.getJSON('http://localhost/praca/database/index.php', function(json) {

    var select = [];
    //var Time = new Date();
    var audioStart = new Audio('/praca/audio/start.mp3');
    var audioNextPrev = new Audio('/praca/audio/next.mp3')
    var audioGood = new Audio('/praca/audio/good.mp3');
    var audioWrong = new Audio('/praca/audio/wrong.mp3')

    //$('#title').html('<h1> <span class="glyphicon glyphicon-education"></span> Quiz z fizyki dla szkół średnich - pytania testowe</h1>');
    var ele = document.getElementById('progress');
    if(json.length == 0)
    {
      $('#select').hide();
    }

    $('#start').on('click', function() {
      questionCounter = 0;
      ele.style.width = '0%';
      l = 0;
      arrayCat = []; //tablica indeksow do pytan z danej kategorii
      select = []; //zerowanie tablicy odpowiedzi
      x = document.getElementById('selVal').value; //pobieranie elementu z wybranej kategori
      $('#title').html('<h1><span class="glyphicon glyphicon-education"></span> Quiz z fizyki dla szkół średnich - pytania testowe<br/><br/>Kategoria: ' + x +'</h1>')

      var div = $('<div id="quiz"></div>');
      //var question = $('<div id="answer"></div>');
      var odp = $('<div id="odp"></div>');
      //$('#admin').hide();
      $('#rodzic').hide();
      $('#result').remove();
      $('#next').before(div);
      //$('#quiz').after(question);
      $('#quiz').after(odp);
      $('#start').hide();
      //$('#result').hide();
      $('#prev').hide();
      $('#next').show();
      $('#progressbar').show();
      $('#select').hide();
      audioStart.play();
      //tworzenie talicy z indeksami danej kategori (z wybranej kategori x)
      for(var i = 0; i < json.length; i++)
      {
        //console.log("x: "+x);
        if(json[i].kategoria == x)
        {
          arrayCat.push(i);
          l++;
        }
      }
      progressBar(questionCounter);
      displayNext();

      //console.log("Liczba pytań z kategori "+ x + " jest: " + l );
      //for(i = 0; i < l; i++)
      //{
        //console.log("pytanie: " + i + " " + json[arrayCat[i]].tresc);
      //}
    });

    $('#next').on('click',function() {
      choose();
      questionCounter++;
      progressBar(questionCounter);
      audioNextPrev.play();
      displayNext();
    });

    $('#prev').on('click', function() {
      choose();
      questionCounter--;
      progressBar(questionCounter);
      audioNextPrev.play();
      displayNext();
    });

    function progressBar(questionCounter)
    {
      var bar = ((questionCounter+1)/l)*100;
      console.log(questionCounter + " " + bar);
      ele.style.width =  bar + '%';
    };

    function changeMathMLTitle() {
      MathJax.Hub.Queue(["Typeset",MathJax.Hub,"quiz"]);
    };

    function changeMathML() {
      MathJax.Hub.Queue(["Typeset",MathJax.Hub,"odp"]);
    };

    function choose() {
      select[questionCounter] = $('input[name="answer"]:checked').val();
      //alert("Log: " + select[questionCounter]);
    };

    function displayNext(){

      if(questionCounter < l)
      {
        if(questionCounter == 0 && l == 1)
        {
          $('#next').show();
          $('#prev').hide();
        }else if(questionCounter >= 1 && questionCounter <= parseInt(l - 1))
        {
          $('#prev').show();
          $('#next').show();
        } else if (questionCounter == parseInt(l - 1)) {
          $('#prev').show();
          $('#next').hide();
        } else if (questionCounter == 0) {
          $('#next').show();
          $('#prev').hide();
        }
        $('#quiz').html('<p class="noselect">' + json[arrayCat[questionCounter]].tresc + '</p></br>');
        var nextQuestion = createRadioButton(arrayCat[questionCounter]);
        $('#odp').html(nextQuestion);
        if (isNaN(select[questionCounter])) {
          $('input[value='+select[parseInt(questionCounter)]+']').prop('checked', true);
        }
      }else {

        if(l == 0)
        {
          //document.getElementById('title').innerHTML = " ";
          viewresult("Baza pytań do Quiz jest pusta, uzypełnij ją!<br /> Przejdź do Panel!");
          $('#progressbar').hide();
          $('#select').hide();
          $('#start').show();
          $('#next').hide();
        }else
        {
          questionCounter = 0;
          //document.getElementById('title').innerHTML = " ";
          var result = viewresult();
          $('#quiz').remove();
          $('#answer').remove();
          $('#odp').remove();
          //$('#result').show();
          $('#prev').hide();
          $('#next').hide();
          $('#progressbar').hide();
          $('#select').show();
          $('#start').show();
        }
      }

      changeMathMLTitle()
      changeMathML()
    };

    function createRadioButton(index)
    {
      var radioList = $('<ul>');
      var item;
      var input = '';

        item = $('<li>');
        input = '<label><input type="radio" name="answer" value="a" >';
        input += '<p class="noselect">' + json[index].odpa + '</p></label>';
        item.append(input);
        radioList.append(item);

        item = $('<li>');
        input = '<label><input type="radio" name="answer" value="b" >';
        input += '<p class="noselect">' + json[index].odpb + '</p></label>';
        item.append(input);
        radioList.append(item);

        item = $('<li>');
        input = '<label><input type="radio" name="answer" value="c" >';
        input += '<p class="noselect">' + json[index].odpc + '</p></label>';
        item.append(input);
        radioList.append(item);

        item = $('<li>');
        input = '<label><input type="radio" name="answer" value="d" >';
        input += '<p class="noselect">' + json[index].odpd + '</p></label>';
        //MathJax.Hub.Typeset("input");
        item.append(input);
        radioList.append(item);

      return radioList;
    };

    function viewresult(text) {

      var result = $('<div id="result"></div>');

      //$('#next').before(result);
      //dla php
      $('#select').before(result);

      var numCorrect = 0;
      for (var i = 0; i < select.length; i++) {
        if (select[i] == json[arrayCat[i]].answer) {
          numCorrect++;
        }
      }

      if((l*0.60) < numCorrect)
      {
        audioGood.play();

        $('#rodzic').show();
        document.getElementById('rodzic').innerHTML = "<span class='glyphicon glyphicon-thumbs-up'></span>BRAWO!!!";
      }

      if(numCorrect < (l*0.40))
      {
        audioWrong.play();
        $('#rodzic').show();
        document.getElementById('rodzic').innerHTML = "<span class='glyphicon glyphicon-thumbs-down'></span>SŁABO!!! SPRÓBUJ JESZCZE RAZ!!!";
        //result.append('<div class="alert alert-danger"><center>Słaby wynik!!! Spróbuj jescze raz!!!</center></div>');
      }

      if(text == null)
      {
        result.html('<div class="alert alert-info"><center class="zom">Poprawnych odpowiedzi ' + numCorrect + ' z ' + l + '</center></div>');

        return numCorrect;
      }else
      {
        result.html('<div class="alert alert-danger"><center>' + text + '</center>');
      }
    };
  });
});
