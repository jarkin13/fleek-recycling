(function(namespace, $){
  "use strict";
  
  var Schedule = function() {
    var o = this;
    $(document).ready(function(){
      o.initialize();
    });
  }
  
  var p = Schedule.prototype;
  var environment = fleek.App.environment();
  
  // =========================================================================
  // MEMBERS
  // =========================================================================

  p.tmp = null;

  // =========================================================================
  // INIT
  // =========================================================================

  p.initialize = function() {
    if( $('.schedule-form').length > 0 ) {
      this.fields(); 
    };
    this.schedule();
  }
  
  p.fields = function() {
    //Date field
    var today = moment().add(1, 'days').format();
    var format = moment().add(1, 'days').format();
    rome(date, {
      min: today,
      initialValue: today,
      time: false
    });
    
    var timeOptions = {
      date: false,
      timeValidator: function(d) {
        var m = moment(d);
        var start = m.clone().hour(5).minute(59).second(59);
        var end = m.clone().hour(21).minute(30).second(1);
        return m.isAfter(start) && m.isBefore(end);
      },
      timeFormat: 'h:mma',
      inputFormat: 'h:mma'
    };
    
    var timepicker = rome(time, timeOptions);
    var timepicker2 = rome(time2, timeOptions);
    
    var timetoData = {
      error: false,
      message: ''
    };
    
    var timeData = {
      error: false,
      message: ''
    };
    
    timepicker.on('data', function(value){
      var timefrom = moment(timepicker.getDate());
      if( $('#time2').val() ) {
        var timeto = moment(timepicker2.getDate());
        var diff = timeto.diff(timefrom);
        var d = moment.duration(diff);
        var h = 60 * Math.floor(d.asHours());
        
        if( timeto.format() == timefrom.format() ) {
          timeData.error = true;
          timeData.message = 'Please select at least a minimum of 1 hour window.';
        } else if( timeto.diff(timefrom, 'days', true) < 0 ) {
          timeData.error = true;
          timeData.message = 'Please select a time before the end time.';
        } else if( h < 1 ) {
          timeData.error = true;
          timeData.toerror = true;
          timeData.message = 'Please select at least a minimum of 1 hour window.';
        } else {
          timeData.toerror = false;
          timeData.error = false;
        }
        
        //var s =  parseInt(moment.utc(diff).format("mm")) + h;
        if(timeData.toerror) {
          $('#time2').parents('.form-group').addClass('has-error');
        } else {
          $('#time2').parents('.form-group').removeClass('has-error');
        }
        
        if(timeData.error) {
          $('#time').parents('.form-group').addClass('has-error');
          $('.time-response').show();
          $('.time-response').html(timeData.message);
        } else {
          $('.time-response').hide();
          $('#time').parents('.form-group').removeClass('has-error');
        }
      }
      timepicker2.on('data', function(value){
        var timeto = moment(timepicker2.getDate());
        var diff = timeto.diff(timefrom);
        var d = moment.duration(diff);
        var h = 60 * Math.floor(d.asHours());
        
        if( timefrom.format() == timeto.format() ) {
          timeData.error = true;
          timeData.message = 'Please select at least a minimum of 1 hour window.';
        } else if( timeto.diff(timefrom, 'days', true) < 0 ) {
          timeData.error = true;
          timeData.message = 'Please select a time after the start time.';
        } else if( h < 1 ) {
          timeData.error = true;
          timeData.fromerror = true;
          timeData.message = 'Please select at least a minimum of 1 hour window.';
        } else {
          timeData.fromerror = false;
          timeData.error = false;
        }
        
        if(timeData.fromerror) {
          $('#time').parents('.form-group').addClass('has-error');
        } else {
          $('#time').parents('.form-group').removeClass('has-error');
        }
        
        if(timeData.error) {
          $('.time-response').show();
          $('.time-response').html(timeData.message);
          $('#time2').parents('.form-group').addClass('has-error');
        } else {
          $('.time-response').hide();
          $('#time2').parents('.form-group').removeClass('has-error');
        }
      });
    });
    
    $('#allday').change(function() {
      if( $(this).is(':checked') ) {
        $('#time').prop('disabled', true);
        $('#time2').prop('disabled', true);
      } else {
        $('#time').prop('disabled', false);
        $('#time2').prop('disabled', false);
      }
    });
    
    $('#doorman').change(function() {
      if( $(this).is(':checked') ) {
        $('.time-optional').show();
      } else {
       $('.time-optional').hide();
      }
    });
  }
  
  p.schedule = function() {
    var p = this;
    $(document).on('click', '#schedule', function(event){
      if(event.preventDefault) {
        event.preventDefault();
      } else {
        event.returnValue = false;
      }

      var user = $('#schedule-username').val();

      if(user) {
        $('.response').hide();
        var date = moment($('#date').val()).format('MMMM Do YYYY');
        var slug = moment($('#date').val()).format('YYYYMMDD');
        var pickup = {
          id: Math.floor(Math.random() * 26) + Date.now(),
          username: $('#schedule-username').val(),
          slug: slug,
          date: date,
          timefrom: $('#time').val(),
          timeto: $('#time2').val(),
          allday: $('#allday:checked').val(),
          doorman: $('#doorman:checked').val(),
          notes: $('#notes').val()
        }; 
        
        var data = p.validate(pickup);
        if( data.error ) {
          $.each( data.fields, function(key, value) {
            value.parents('.form-group').addClass('has-error');
          });
          $('.schedule-response').show();
          $('.schedule-response').html('Please do not leave the following blank.');
        } else {
          $.post('/submit/schedule', pickup, function(response) {
            var errorResponse = $.parseJSON(response);
            console.log(errorResponse);
            $('.schedule-response').show();
            $('.schedule-response').addClass('success');
            $('.schedule-response').html(errorResponse.message);
          });
        }
      } else {
        $('.modal').modal('show'); 
      }
    });
  }
  
  p.validate = function(data) {
    var response = {
      error: false,
      fields: {}
    }
    
    if( !data.date ) {
      response.error = true;
      response.fields.date = $('#date');
    }
    
    if( !data.allday && !data.doorman && !data.timeto && !data.timefrom && !data.notes ) {
      response.error = true;
      response.fields.time = $('#time');
      response.fields.time2 = $('#time2');
      response.fields.notes = $('#notes');
    } 
     
    return response;
  }
  
  namespace.Schedule = new Schedule();
}(this.fleek, jQuery));
