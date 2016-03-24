(function(namespace, $){
	"use-strict";

	var Account = function() {
		var o = this;
		$(document).ready(function(){
			o.initialize();
		});
	}
	var p = Account.prototype;

	// =========================================================================
  // MEMBERS
  // =========================================================================

  p.tmp = null;

  // =========================================================================
  // INIT
  // =========================================================================

  p.initialize = function() {
    this.format();
  }

  p.format = function() {
    $('.pickup').each(function(key, pickup) {
      var date = $(pickup).find('#date').data();
          date = moment(date.date).format('ddd, MMMM Do YYYY');
      $(pickup).find('#date').html(date);
    });
  }

  namespace.Account = new Account();
}(this.fleek, jQuery));