(function($){'use strict';if(typeof theme.PluginScrollToTop!=='undefined'){theme.PluginScrollToTop.initialize();}
var tooltipTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList=tooltipTriggerList.map(function(tooltipTriggerEl){return new bootstrap.Tooltip(tooltipTriggerEl)});var popoverTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList=popoverTriggerList.map(function(popoverTriggerEl){return new bootstrap.Popover(popoverTriggerEl)});if($.isFunction($.validator)&&typeof theme.PluginValidation!=='undefined'){theme.PluginValidation.initialize();}
if($.isFunction($.fn['themePluginAnimate'])&&$('[data-appear-animation]').length){theme.fn.dynIntObsInit('[data-appear-animation], [data-appear-animation-svg]','themePluginAnimate',theme.PluginAnimate.defaults);}
if($.isFunction($.fn['themePluginAnimatedLetters'])&&($('[data-plugin-animated-letters]').length||$('.animated-letters').length)){theme.fn.intObsInit('[data-plugin-animated-letters]:not(.manual), .animated-letters','themePluginAnimatedLetters');}
if($.isFunction($.fn['themePluginBeforeAfter'])&&$('[data-plugin-before-after]').length){theme.fn.intObsInit('[data-plugin-before-after]:not(.manual)','themePluginBeforeAfter');}
if($.isFunction($.fn['themePluginCarouselLight'])&&$('.owl-carousel-light').length){theme.fn.intObsInit('.owl-carousel-light','themePluginCarouselLight');}
if($.isFunction($.fn['themePluginCarousel'])&&$('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)').length){theme.fn.intObsInit('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)','themePluginCarousel');}
if($.isFunction($.fn['themePluginChartCircular'])&&($('[data-plugin-chart-circular]').length||$('.circular-bar-chart').length)){theme.fn.dynIntObsInit('[data-plugin-chart-circular]:not(.manual), .circular-bar-chart:not(.manual)','themePluginChartCircular',theme.PluginChartCircular.defaults);}
if($.isFunction($.fn['themePluginCountdown'])&&($('[data-plugin-countdown]').length||$('.countdown').length)){theme.fn.intObsInit('[data-plugin-countdown]:not(.manual), .countdown','themePluginCountdown');}
if($.isFunction($.fn['themePluginCounter'])&&($('[data-plugin-counter]').length||$('.counters [data-to]').length)){theme.fn.dynIntObsInit('[data-plugin-counter]:not(.manual), .counters [data-to]','themePluginCounter',theme.PluginCounter.defaults);}
if($.isFunction($.fn['themePluginCursorEffect'])&&$('[data-plugin-cursor-effect]').length){theme.fn.intObsInit('[data-plugin-cursor-effect]:not(.manual)','themePluginCursorEffect');}
if($.isFunction($.fn['themePluginFloatElement'])&&$('[data-plugin-float-element]').length){theme.fn.intObsInit('[data-plugin-float-element], [data-plugin-float-element-svg]','themePluginFloatElement');}
if($.isFunction($.fn['themePluginGDPR'])&&$('[data-plugin-gdpr]').length){$(function(){$('[data-plugin-gdpr]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginGDPR(opts);});});}
if($.isFunction($.fn['themePluginGDPRWrapper'])&&$('[data-plugin-gdpr-wrapper]').length){$(function(){$('[data-plugin-gdpr-wrapper]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginGDPRWrapper(opts);});});}
if($.isFunction($.fn['themePluginIcon'])&&$('[data-icon]').length){theme.fn.dynIntObsInit('[data-icon]:not(.svg-inline--fa)','themePluginIcon',theme.PluginIcon.defaults);}
if($.isFunction($.fn['themePluginLightbox'])&&($('[data-plugin-lightbox]').length||$('.lightbox').length)){theme.fn.execOnceTroughEvent('[data-plugin-lightbox]:not(.manual), .lightbox:not(.manual)','mouseover.trigger.lightbox',function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginLightbox(opts);});}
if($.isFunction($.fn['themePluginMasonry'])&&$('[data-plugin-masonry]').length){$(function(){$('[data-plugin-masonry]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginMasonry(opts);});});}
if($.isFunction($.fn['themePluginMatchHeight'])&&$('[data-plugin-match-height]').length){$(function(){$('[data-plugin-match-height]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginMatchHeight(opts);});});}
if($.isFunction($.fn['themePluginParallax'])&&$('[data-plugin-parallax]').length){theme.fn.intObsInit('[data-plugin-parallax]:not(.manual)','themePluginParallax');}
if($.isFunction($.fn['themePluginProgressBar'])&&($('[data-plugin-progress-bar]')||$('[data-appear-progress-animation]').length)){theme.fn.dynIntObsInit('[data-plugin-progress-bar]:not(.manual), [data-appear-progress-animation]','themePluginProgressBar',theme.PluginProgressBar.defaults);}
if($.isFunction($.fn['themePluginRandomImages'])&&$('[data-plugin-random-images]').length){theme.fn.dynIntObsInit('.plugin-random-images','themePluginRandomImages',theme.PluginRandomImages.defaults);}
if($.isFunction($.fn['themePluginReadMore'])&&$('[data-plugin-readmore]').length){theme.fn.intObsInit('[data-plugin-readmore]:not(.manual)','themePluginReadMore');}
if($.isFunction($.fn['themePluginRevolutionSlider'])&&($('[data-plugin-revolution-slider]').length||$('.slider-container .slider').length)){$(function(){$('[data-plugin-revolution-slider]:not(.manual), .slider-container .slider:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginRevolutionSlider(opts);});});}
if($.isFunction($.fn['themePluginScrollSpy'])&&$('[data-plugin-scroll-spy]').length){$(function(){$('[data-plugin-scroll-spy]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginScrollSpy(opts);});});}
if($.isFunction($.fn['nanoScroller'])&&$('[data-plugin-scrollable]').length){theme.fn.intObsInit('[data-plugin-scrollable]','themePluginScrollable');}
if($.isFunction($.fn['themePluginSectionScroll'])&&$('[data-plugin-section-scroll]').length){$(function(){$('[data-plugin-section-scroll]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginSectionScroll(opts);});});}
if($.isFunction($.fn['themePluginSort'])&&($('[data-plugin-sort]').length||$('.sort-source').length)){theme.fn.intObsInit('[data-plugin-sort]:not(.manual), .sort-source:not(.manual)','themePluginSort');}
if($.isFunction($.fn['themePluginStarRating'])&&$('[data-plugin-star-rating]').length){theme.fn.intObsInit('[data-plugin-star-rating]:not(.manual)','themePluginStarRating');}
if($.isFunction($.fn['themePluginSticky'])&&$('[data-plugin-sticky]').length){theme.fn.execOnceTroughWindowEvent(window,'scroll.trigger.sticky',function(){$('[data-plugin-sticky]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginSticky(opts);});});}
if($.isFunction($.fn['themePluginToggle'])&&$('[data-plugin-toggle]').length){theme.fn.intObsInit('[data-plugin-toggle]:not(.manual)','themePluginToggle');}
if($.isFunction($.fn['themePluginTweets'])&&$('[data-plugin-tweets]').length){$(function(){$('[data-plugin-tweets]:not(.manual)').each(function(){var $this=$(this),opts;var pluginOptions=theme.fn.getOptions($this.data('plugin-options'));if(pluginOptions)
opts=pluginOptions;$this.themePluginTweets(opts);});});}
if($.isFunction($.fn['themePluginVideoBackground'])&&$('[data-plugin-video-background]').length){theme.fn.intObsInit('[data-plugin-video-background]:not(.manual)','themePluginVideoBackground');}
if(typeof theme.StickyHeader!=='undefined'){theme.StickyHeader.initialize();}
if(typeof theme.Nav!=='undefined'){theme.Nav.initialize();}
if(typeof theme.Search!=='undefined'&&($('#searchForm').length||$('.header-nav-features-search-reveal').length)){theme.Search.initialize();}
if(typeof theme.Newsletter!=='undefined'&&$('#newsletterForm').length){theme.fn.intObs('#newsletterForm','theme.Newsletter.initialize();',{});}
if(typeof theme.Account!=='undefined'&&($('#headerAccount').length||$('#headerSignUp').length||$('#headerSignIn').length||$('#headerRecover').length||$('#headerRecoverCancel').length)){theme.Account.initialize();}}).apply(this,[jQuery]);