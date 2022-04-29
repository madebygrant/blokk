export const extras = {

    /**
     * Fetch all page data, sort by alphabetically for the 'select' field
     * 
     * @returns array Page data
     */
    selectAllPages: () => {
        const getPages = wp.data.useSelect(select => select('core')).getEntityRecords('postType', 'page');
        const pages = [];

        if (getPages) {
            getPages.forEach(p => {
                const obj = {
                    label: p.title.raw,
                    value: p.id
                }
                pages.push(obj);
            });

            pages.sort((a, b) => {
                let fa = a.label.toLowerCase(),
                    fb = b.label.toLowerCase();

                if (fa < fb) {
                    return -1;
                }
                if (fa > fb) {
                    return 1;
                }
                return 0;
            });
        }

        return pages;
    }

}