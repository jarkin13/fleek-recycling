(function(namespace, $){
  "use strict";
  
  var Login = function() {
    var o = this;
    $(document).ready(function(){
      o.initialize();
    }); 
  }
  var p = Login.prototype;
  var environment = fleek.App.environment();
  
  // =========================================================================
  // MEMBERS
  // =========================================================================

  p.tmp = null;

  // =========================================================================
  // INIT
  // =========================================================================

  p.initialize = function() {
    this.login();
  }

  p.login = function() {
    var p = this;
    var home, 
        loginLink = 'submit/login';
    if( environment == 'localhost' ) {
      home = '/fleek-recycling';
    } else {
      home = '/';
      loginLink = '/' + loginLink;
    }
    $(document).on('click', '#submit-login', function(event){
      if(event.preventDefault) {
        event.preventDefault();
      } else {
        event.returnValue = false;
      }
      var user = {
        username: $('#login-username').val(),
        password: $('#login-password').val()
      }
      
      var data = p.validate(user);
      if(data.error) {
        $.each(data.fields, function(key, value) {
          value.parents('.form-group').addClass('has-error');
        });
        $('.login-response').show();
        $('.login-response').html('Please do not leave the following blank');
      } else {
        $.post(loginLink, user, function(response){
          var errorResponse = $.parseJSON(response);
          if( errorResponse.error == false ) {
            document.location.href = home;
          } else {
            $('.login-form').find('.form-group').addClass('has-error');
            $('.login-response').show();
            $('.login-response').html(errorResponse.message);
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
    
    if( !data.username ) {
      response.error = true;
      response.fields.username = $('#login-username');
    }
    
    if( !data.password ) {
      response.error = true;
      response.fields.password = $('#login-password');
    }
    
    return response;
  }
  namespace.Login = new Login();
}(this.fleek, jQuery));
