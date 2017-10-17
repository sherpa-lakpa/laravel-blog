
var app = (function($, window, document) {
  'use strict';

  var _settings = {};

  var handleInit = function(initSettings) {
    initSettings && $.extend(_settings, initSettings);

    $(document).tooltip({
      selector: '[data-tooltip]',
      container: document.body,
      animation: false,
      delay: {
        show: 200
      },
      title: function() {
        return this.getAttribute('data-title') || '';
      }
    });
  };

  var handleOnResize = function() {
    var resizeTimer;

    $(window).on('resize', function() {
      document.body.classList.add('no-transition');

      resizeTimer = setTimeout(function() {
        setTimeout(function() {
          document.body.classList.remove('no-transition');
        }, 150);
      }, 200);
    });
  };

  var handleLangSwitch = function() {
    var $langSwitcher = $('#lang-switcher');
    var $langList     = $('.lang-list');
    var activeLang    = localStorage.getItem('activeLang') || _settings.activeLang;

    function translate() {
      $(document.body).localize();
    }

    function setLang(lang) {
      var deferred = $.Deferred();

      i18next.changeLanguage(lang, function(err) {
        if (!err || err && !err.length) {
          translate();

          localStorage.setItem('activeLang', lang);

          activeLang = lang;

          deferred.resolve(lang);
        } else {
          deferred.reject(err);
        }
      });

      return deferred.promise();
    }

    var i18options = {
      lng: activeLang,
      fallbackLng: _settings.activeLang,
      whitelist: _settings.langs,
      postProcess: true,
      backend: {
        loadPath: '/locales/{{ lng }}.json'
      },
      cache: {
        enabled: true
      }
    };

    i18next
      .use(i18nextXHRBackend)
      .use(i18nextLocalStorageCache)
      .init(i18options, function(err, t) {

        i18nextJquery.init(i18next, $, {
          useOptionsAttr: true,
          parseDefaultValueFromContent: true
        });

        translate();
      });


    function highlightActiveLang(lang) {
      var activeLangLink    = $langList.find('[data-lang-id="' + lang + '"]')[0];
      var activeLangLinkImg = activeLangLink.children[0];
      var langSwitcherImg   = $langSwitcher[0].children[0];

      langSwitcherImg.src = activeLangLinkImg.src || activeLangLinkImg.getAttribute('data-src');
      langSwitcherImg.alt = activeLangLinkImg.alt;

      $langSwitcher[0].children[1].textContent = activeLangLink.textContent;

      $langList
        .find('.active')
        .removeClass('active');

      activeLangLink.classList.add('active');
    }

    highlightActiveLang(activeLang);


    // Switch lang
    $langList.on('click', 'a', function(e) {
      e.preventDefault();

      var choosenLang = this.getAttribute('data-lang-id');

      setLang(choosenLang).then(function() {
        highlightActiveLang(choosenLang);
      });
    });

    // load images
    $langList.closest('.dropdown').one('show.bs.dropdown', function() {
      var images = $langList[0].getElementsByTagName('img');
      var image;

      for (var i = 0, len = images.length; i < len; i++) {
        image = images[i];
        image.src = image.getAttribute('data-src');
        image.removeAttribute('data-src');
      }
    });
  };

  var handleDownloadPopup = function() {
    var $downloadBtn        = $('#js-download-btn');
    var $downloadModal      = $('#download');
    var downloadStatusShown = false;
    var status = {
      isChecking: false,
      interval: 10000,
      hash: null,
      timer: null
    };

    function fetchOffersList(ajaxData) {
      return $.ajax({
        url: '/ajax/getOffers',
        type: 'POST',
        data: ajaxData || {}
      });
    }

    function startCheckingStatus() {
      if (!status.isChecking) {
        status.timer = setInterval(checkStatus, status.interval);
        status.isChecking = true;
      }
    }

    function stopCheckingStatus() {
      if (status.isChecking) {
        clearInterval(status.timer);
        status.isChecking = false;
      }
    }

    function checkStatus() {
      $.ajax({
        url: '/ajax/status',
        type: 'POST',
        data: {
          hash: status.hash
        }
      }).done(function(response) {
        if (response && response.result === 2) {
          window.location.href = response.redirectUrl;
        }
      });
    }

    function appendOffersList(data) {
      var $offersList = $downloadModal.find('.offers-list');

      $offersList.empty();
      $offersList.html(buildOffersList(data.offers));

      return $.Deferred().resolve().promise();
    }

    function buildOffersList(offers) {
      var html = '';
      var offer;
      var efficiency;

      for (var i = 0, len = offers.length; i < len; i++) {
        offer = offers[i];

        efficiency = 100 - (i * 20);
        efficiency = efficiency < 0 ? 0 : efficiency;

        offer.efficiency = efficiency;

        html += buildOffersItem(offer);
      }

      return html;
    }

    function buildOffersItem(offer) {
      var tpl = '';

      tpl += '<li>';
      tpl += '<div class="popularity" data-tooltip data-i18n="[data-title]download.efficiencyTooltip" data-i18n-options=\'{"value": "' + offer.efficiency + '%"}\'>';
      tpl += '<span data-i18n="download.efficiency">Efficiency:</span>';
      tpl += '<div class="progress">';
      tpl += '<div class="progress-bar" style="width: ' + offer.efficiency + '%;"></div>';
      tpl += '</div>'
      tpl += '</div>';
      tpl += '<a class="offer-link" data-tooltip title="' + offer.description + '" href="' + offer.url + '" target="_blank">' + offer.name + '</a>';
      tpl += '</li>';

      return tpl;
    }

    function openModal() {
      var deferred = $.Deferred();

      $.magnificPopup.open({
        items: {
          src: $downloadModal
        },
        type:'inline',
        midClick: true,
        closeOnBgClick: false,
        closeBtnInside: true,
        removalDelay: 300,
        mainClass: 'mfp-zoom-effect',
        callbacks: {
          afterClose: afterModalCloseCallback,
          open: function() {
            $downloadModal.find('.offers-list').localize();
            deferred.resolve();
          }
        }
      });

      return deferred.promise();
    }

    function afterModalCloseCallback() {
      stopCheckingStatus();
      $.magnificPopup.instance.items = null;
      $downloadModal.removeClass('show-status');
      downloadStatusShown = false;
    }

    $downloadBtn.on('click', function() {

      $.when(fetchOffersList({ fileId: _settings.fileId }))
        .then(function(data) {
          status.hash = data.hash;

          return appendOffersList(data);
        })
        .then(openModal)
        .then(startCheckingStatus);
    });

    $downloadModal.find('.offers-list').on('click', 'a', function() {
      if (!downloadStatusShown) {
        $downloadModal.addClass('show-status');
        downloadStatusShown = true;
      }

      this.blur();
    });
  };

  return {
    init: function(initSettings) {
      handleInit(initSettings);
      handleOnResize();
      handleLangSwitch();
      handleDownloadPopup();
    }
  };

})(window.jQuery, window, document);
