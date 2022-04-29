
const CSS = {

    /**
     * Get the value of a CSS property
     * @param {string} property The CSS property name
     * @param {object} element The node to find the property in, it'll search the <body> tag if nothing is given
     * @returns {string} Returns the found value
     */
    getProperty: (property, element = null) => {
        const el = element && typeof element == 'object' ? element : document.body;
        return window.getComputedStyle(el, null).getPropertyValue(property)
    },

    /**
     * Get the value of the CSS property: --wp--custom--width--content
     * @returns {int} Returns the property value
     */
    contentWidth: () => {
        let width = CSS.getProperty("--wp--custom--width--content");
        return parseInt(width, 10);
    }
}

export default CSS;