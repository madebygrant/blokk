import { select, CSS } from './modules/helpers';
import toggleMaxWidthClass from './modules/toggleMaxWidthClass';

document.addEventListener('DOMContentLoaded', () => {

    // Toggle a class on the '.page-container' element compared to the "--wp--custom--width--content" CSS property.
    toggleMaxWidthClass( select('.page-container'), CSS.contentWidth(), 'page-container--narrow' );

});