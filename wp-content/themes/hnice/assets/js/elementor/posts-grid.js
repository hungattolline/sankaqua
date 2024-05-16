(function ($) {
    "use strict";
    $(window).on('elementor/frontend/init', () => {
        const addHandler = ($element) => {
            elementorFrontend.elementsHandler.addHandler(hniceSwiperBase, {
                $element,
            });
        };
        elementorFrontend.hooks.addAction('frontend/element_ready/hnice-post-grid.default', addHandler);
    });
})(jQuery);

