(function(namespace, $){
  "use strict";
  
  var Register = function() {
    var o = this;
    $(document).ready(function() {
      o.initialize();
    });
  }
  var p = Register.prototype;
  var environment = fleek.App.environment();
  
  // =========================================================================
  // MEMBERS
  // =========================================================================

  p.tmp = null;

  // =========================================================================
  // INIT
  // =========================================================================

  p.initialize = function() {
    this.address();
    this.register();
    this.resetForm();
  }
  
  p.register = function() {
    var registerLink = 'submit/register',
        loginLink = 'submit/login';
    if( environment !== 'localhost') {
      registerLink = '/' + registerLink;
      loginLink = '/' + loginLink;
    }
    $(document).on('click', '#register', function(event){
      if(event.preventDefault) {
        event.preventDefault();
      } else {
        event.returnValue = false;
      }
      
      var user = {
        first: $('#first').val(),
        last: $('#last').val(),
        username: $('#username').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        password2: $('#password2').val(),
        address: $('#address').val(),
        apartment: $('#apartment').val(),
        city: $('#locality').val(),
        state: $('#administrative_area_level_1').val(),
        zip: $('#postal_code').val(),
        phone: $('#phone').val(),
        contact: $('#contact:checked').val()
      }
      
     var data = p.validate(user);
      
      if( data.error ) {
        $(this).closest('form').find('form-group').removeClass('has-error');
        var blank = false;
        var errorMessage = '<h4>Fix the following errors:</h4><ul class="error-message">';
        $.each( data.fields, function(key, value){
          if( value.input ) {
            value.input.parents('.form-group').addClass('has-error');
          } 
          
          if( value.message) {
            console.log(value.message);
            if( value.message == 'blank' ) {
              blank = true;
            } else {
              errorMessage += '<li>' + value.message + '</li>';
            }
          }
        });
        if( blank ) {
          errorMessage += '<li>Please do not leave the following blank</li>';
        }
        errorMessage += '</ul>';
        $('.modal .register-response').show();
        $('.modal .register-response').html(errorMessage);
      } else {
        $.post(registerLink, user, function(response){
          var errorResponse = $.parseJSON(response);
          if( errorResponse.error ) {
            $('.modal .register-response').show();
            $('.modal .register-response').html(errorResponse.message);
          } else {
            $('.modal').modal('hide');
            $.post(loginLink, user, function(login){
              var loginResponse = $.parseJSON(login);
              var message = errorResponse.message + ' ' + loginResponse.message;
              if( !loginResponse.error ) {
                $('.nav-link').hide();
                $('.navmenu').append('<a href="submit/logout">Logout</a>');
              }
              $('.schedule-form').prepend('<input type="hidden" id="schedule-username" value="' + user.username + '">');
              $('.register-head-response').html(message);
              $('.register-head-response').show();
              $('.register-head-response').addClass('success');
            });
          }
        });
      }
    });
  }
  
  p.validate = function(data) {
    var response = {
      error: false,
      fields: {}
    }
    
    if( !data.first ) {
      response.error = true;
      response.fields.first = {
        input: $('#first'),
        message: 'blank'
      };
    } 
    
    if( !data.last ) {
      response.error = true;
      response.fields.last = {
        input: $('#last'),
        message: 'blank'
      };
    }
    
    if( !data.username ) {
      response.error = true;
      response.fields.username = {
        input: $('#username'),
        message: 'blank'
      };
    }
    
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if( !regex.test(data.email) ) {
      response.error = true;
      response.fields.email = {
        input: $('#email'),
        message: 'Please enter a valid email'
      };
    }
    
    if( !data.email ) {
      response.error = true;
      response.fields.email = {
        input: $('#email'),
        message: 'blank'
      };
    }
    
    if( !data.password ) {
      response.error = true;
      response.fields.password = {
        input: $('#password'),
        message: 'blank'
      };
    }
    
    if( !data.password2 ) {
      response.error = true;
      response.fields.password2 = {
        input: $('#password2'),
        message: 'blank'
      };
    }
    
    if( data.password && data.password2 && data.password !== data.password2 ) {
      response.error = true;
      response.fields.password = {
        input: $('#password'),
        message: 'Passwords do not match'
      };
      
      response.fields.password2 = {
        input: $('#password2')
      };
    }
    
    if( !data.address ) {
      response.error = true;
      response.fields.address = {
        input: $('#address'),
        message: 'blank'
      };
    }
    
    if( !data.city ) {
      response.error = true;
      response.fields.city = {
        input: $('#locality'),
        message: 'blank'
      };
    }
    
    if( !data.state ) {
      response.error = true;
      response.fields.state = {
        input: $('#administrative_area_level_1'),
        message: 'blank'
      };
    }
    
    if( !data.zip ) {
      response.error = true;
      response.fields.zip = {
        input: $('#postal_code'),
        message: 'blank'
      };
    }
    
    if( !data.phone ) {
      response.error = true;
      response.fields.phone = {
        input: $('#phone'),
        message: 'blank'
      };
    }

    if( !data.contact ) {
      response.error = true;
      response.fields.contact = {
        input: $('#contact'),
        message: 'blank'
      }
    }
    
    return response;
  }
  
  var placeSearch, autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',  
    postal_code: 'short_name'
  }
  
  p.address = function() {
    p = this;
    autocomplete = new google.maps.places.Autocomplete(
      (document.getElementById('address')),
      { types: ['geocode'] }
    );
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      p.fillInAddress();
    });
  }
  
  p.fillInAddress = function() {
    var place = autocomplete.getPlace();
    for( var component in componentForm ) {
      document.getElementById(component).value = '';
    }
    for(var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if(componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
      }
    }
  }

  p.resetForm = function() {
    var form = $('.register-form');
    $('.modal').on('hide.bs.modal', function() {
      $('.response').hide();
      fleek.App.resetForm(form);
    });
  }
  
  namespace.Register = new Register();
}(this.fleek, jQuery));
