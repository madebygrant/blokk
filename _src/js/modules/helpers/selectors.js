/**
 * Select a single DOM element
 * 
 * @param {string} element The element to select
 * @param {*} source A source to select the element from. Optional
 * @returns The selected element
 */

export const select = (element, source = null) => {
    return source !== null ? source.querySelector(element) : document.querySelector(element);
}

/**
 * Select multiple DOM elements
 * 
 * @param {string} element The elements to select
 * @param {*} source A source to select the elements from. Optional
 * @returns The selected elements
 */

export const selectAll = (element, source = null) => {
    return source !== null ? source.querySelectorAll(element) : document.querySelectorAll(element);
}