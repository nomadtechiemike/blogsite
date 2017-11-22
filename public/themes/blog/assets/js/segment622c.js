(function($) {
  $(document).on('ready', function () {
    function readCookie(k){return(document.cookie.match('(^|; )'+k+'=([^;]*)')||0)[2]};

    function getUserEmail() {
      var edxUserInfoCookie = readCookie('edx-user-info');
      var edxUserInfoJson = JSON.parse(JSON.parse(edxUserInfoCookie.replace(/\\054/g, ',')));

      return edxUserInfoJson.email;
    }

    function getUserName() {
      var edxUserInfoCookie = readCookie('edx-user-info');
      var edxUserInfoJson = JSON.parse(JSON.parse(edxUserInfoCookie.replace(/\\054/g, ',')));

      return edxUserInfoJson.username;
    }

    function trackEvent(eventProperty) {
      if (readCookie('edx-user-info')) {
        eventProperty['customName1'] = 'UserName';
        eventProperty['customValue1'] = getUserName();
        eventProperty['customName2'] = 'UserEmail';
        eventProperty['customValue2'] = getUserEmail();
      }
      eventProperty['productTitle'] = 'IBM Cognitive Class';
      eventProperty['category'] = 'Uncategorized \(IBM Cognitive Class\)';
      window.bluemixAnalytics.trackEvent('Custom Event', eventProperty)
    }

    $('.segment-click-track').on('click', function() {
      trackEvent($(this).data('segment-event-property'));
    });

    $('.segment-referral-track').on('click', function() {
      trackEvent({action: "Referred", object: $(this).data('segment-event-product-name'), objectType: 'Product'});
    });
  });
})(jQuery);

