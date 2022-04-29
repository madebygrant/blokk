/**
 * Compares the given width and the viewport width. If smaller, adds a class. If equal or larger, removes the class if it exists.
 * 
 * @param {node} element The element to measure
 * @param {int} width The width to compare against the viewport width
 * @param {string} toggleClass The class to add
 */
const toggleMaxWidthClass = (element, width, toggleClass = false) => {
    const item = element;
    const itemToggleClass = toggleClass ? toggleClass : "narrow";
    const itemMaxWidth = Number.isInteger(width) ? width : 0;

    if (window.innerWidth < itemMaxWidth) {
        item.classList.add(itemToggleClass);
    }

    window.addEventListener('resize', () => {

        if (window.innerWidth < itemMaxWidth) {
            item.classList.add(itemToggleClass);
        }
        else {
            item.classList.remove(itemToggleClass);
        }

    })
}

export default toggleMaxWidthClass;