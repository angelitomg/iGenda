<?php use Cake\I18n\I18n; ?>

<link rel="stylesheet" href="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.print.css" media="print">

<div class="row">
	<div class="col-md-12">
	  <div class="box box-primary">
	    <div class="box-body no-padding">
	      <!-- THE CALENDAR -->
	      <div id="calendar"></div>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  <!-- /. box -->
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/plugins/fullcalendar/lang-all.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },

      	<?php 
      		// Transalte calendar
      		if (I18n::locale() == 'pt_BR') echo "lang: 'pt-br'," 
      	?>
      
      events: '<?= $this->Url->build('/') ?>/activities/calendarJSON',

    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>