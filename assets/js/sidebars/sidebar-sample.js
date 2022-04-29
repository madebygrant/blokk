/**
 * Sample Sidebar
 * 
 * Requires the 'WP Sides' plugin to be activated.
 * Tested with 'WP Sides' version: 0.3
 */
(async () => {

    const { wpSides } = await import(wpSidesPlugin.load); // Import the WP Sides controls
    const { extras } = await import('./extras.js'); // Import extra options for the sidebar controls

    const { __ } = wp.i18n;
    const el = wp.element.createElement;
    const { Fragment } = wp.element;
    const { PanelBody } = wp.components;
    const { Sidebar, AddSidebar, groupControl, icons, utils } = wpSides;

    const sidebar = () => {
        
        /**
         * Sidebar details
         */
        const details = {
            title: __('WPSides - Sample Sidebar'),
            name: 'wpsides-sample-sidebar',
            metaKey: '_page_sidebar_meta',
        };

        /**
         * Get the sidebar meta data, post type and page template of the current page
         */
        const get = {
            meta: utils.get.groupMeta(details.metaKey),
            postType: utils.get.postType(),
            pageTemplate: utils.get.pageTemplate()
        };

        /**
         * Restrict to specific post types
         */
        /*
        const allowedPostTypes = [ 'page' ];
        if( !allowedPostTypes.includes(get.postType) ){
            return null;
        }
        */

        /**
         * Restrict to specific page templates
         */
        /*
        const allowedPageTemplates = [ 'some-template' ];
        if( !allowedPageTemplates.includes(get.pageTemplate) ){
            return null;
        }
        */

        /**
         * Render the sidebar
         */
        return (

            el( Fragment, {},

                // Adds the sidebar to the 'Plugins' section
                el( AddSidebar,
                    { target: details.name }, details.title
                ),
                
                // Create the sidebar
                el( Sidebar,
                    { name: details.name, title: details.title },
    
                    // ------------------ Add your options below ------------------

                    /**
                     * Group 1
                     */
                    el( PanelBody, { title: "Group 1" },
    
                        // Text field
                        el( 
                            groupControl('text'),
                            {
                                id: 'text_1',
                                title : __('Sample Text Field'),
                                metaKey: details.metaKey,
                            }
                        ),
    
                        // Checkbox
                        el( 
                            groupControl('checkbox'),
                            {
                                id: 'checkbox',
                                title : __('Checkbox test'),
                                metaKey: details.metaKey,
                            }
                        ),
            
                        // Toggle button
                        el( 
                            groupControl('toggle'),
                            {
                                id: 'toggle',
                                title : __('Boolean test'),
                                metaKey: details.metaKey,
                            }
                        ),
                        
                        // Date field
                        el( 
                            groupControl('date'),
                            {
                                id: 'date',
                                title : __('Date test'),
                                metaKey: details.metaKey,
                            }
                        ),
    
                    ),
    
                    /**
                     * Group 2
                     */
                    el( PanelBody, { title: "Group 2", initialOpen: false },
                            
                        // Color select
                        el( 
                            groupControl('colour'),
                            {
                                id: 'colour',
                                title : __('Colour test'),
                                metaKey: details.metaKey,
                            }
                        ),
    
                        // Font size
                        el( 
                            groupControl('fontSize', { 
                                fontSizes: [
                                    {
                                        name: __( 'Small' ),
                                        slug: 'small',
                                        size: 12,
                                    },
                                    {
                                        name: __( 'Large' ),
                                        slug: 'large',
                                        size: 32,
                                    },
                                ] 
                            }),
                            {
                                id: 'font_size',
                                title : __('Font size test'),
                                metaKey: details.metaKey,
                            }
                        ),
    
                        // Radio buttons
                        el( 
                            groupControl('radio', { 
                                options: [
                                    { label: 'Author', value: 'author' },
                                    { label: 'Editor', value: 'editor' },
                                ]
                            }),
                            {
                                id: 'radio',
                                title : __('Radio test'),
                                metaKey: details.metaKey,
                            }
                        ),
                        
                        // Range field
                        el( 
                            groupControl('range', { min: 0, max: 100 }),
                            {
                                id: 'range',
                                title : __('Range test'),
                                metaKey: details.metaKey,
                            }
                        ),
                        
                        // Time field
                        el( 
                            groupControl('time'),
                            {
                                id: 'time',
                                title : __('Time test'),
                                metaKey: details.metaKey,
                            }
                        ),
    
                        // Select field
                        el( 
                            groupControl('select', {
                                options: [
                                    { label: 'Big', value: '100%' },
                                    { label: 'Medium', value: '50%' },
                                    { label: 'Small', value: '25%' },
                                ]
                            }),
                            {
                                id: 'select',
                                title : __('Select test'),
                                metaKey: details.metaKey,
                            }
                        ),
                        
                        // Select field (displaying all pages)
                        el(
                            groupControl('select', {
                                options: extras.selectAllPages()
                            }),
                            {
                                id: 'select',
                                title: __('Page select test'),
                                metaKey: details.metaKey,
                            }
                        ),
                        
                        // Media field
                        el( 
                            groupControl('media'),
                            {
                                id: 'media',
                                title : __('Media test'),
                                metaKey: details.metaKey,
                            }
                        ),
                    )
                )
    
            )    

        )
    }

    /**
     * Register the sidebar
     */
    wp.plugins.registerPlugin( 'wpsides-sample-sidebar', {
        render: sidebar,
        icon: icons.sliders // Icon to be associated with
    });

})();
