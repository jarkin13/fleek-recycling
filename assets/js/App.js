(function($){
  "user strict";
  
  var App = function() {
    var o = this;
    $(document).ready(function(){
      o.initialize();
    });
  }
  
  var p = App.prototype;
  
  p.initialize = function() {
    this.logout();
    this.register();
    this.offcanvas();
  }

  p.environment = function() {
    var location = document.location.hostname;
    var environment;
    if( location == 'localhost') {
      environment = 'localhost';
    } 
    if( location == 'staging.fleekrecycling.com') {
      environment = 'staging';
    }
    if( location == 'fleekrecycling.com') {
      environment == 'production';
    }
    return environment;
  }

  p.resetForm = function(form) {
    form.find('input, textarea').val('');
    form.find('input, textarea').parents('.form-group').removeClass('has-error');
  }
  
  p.logout = function() {
    $(document).on('click', '#logout', function(event){
      if(event.preventDefault) {
        event.preventDefault();
      } else {
        event.returnValue = false;
      }
      
      $.post('/submit/logout', function(response){
        $('.register-head-response').html('You have successfully logged out.');
      });
    });
  }

  p.register = function() {
    $(document).on('click', '#register-nav-link', function(){
      $('.modal').modal('show');
    });
  }

  p.offcanvas = function() {
    $('.toggle-menu').jPushMenu({
      closeOnClickLink: '.close-btn'
    });
  }
  
  window.fleek = window.fleek || {};
  window.fleek.App = new App;
}(jQuery));
