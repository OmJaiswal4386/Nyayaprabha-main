$(document).ready(function($) {
    // Create an audio element (you can keep this here)
    var audio = new Audio("alarm.mp3");
  
    // Event delegation for buttons (using on instead of click)
    $(document).on('click', '#start-alarm', function(){
      audio.play(); // Play the audio
      alert("Alarm Started");
    });
  
    $(document).on('click', '#pause-alarm', function(){
      audio.pause(); // Pause the audio
      alert("Alarm Paused");
    });
  });
  