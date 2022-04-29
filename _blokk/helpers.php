<?php
/**
 * Blokk: Helpers
 *
 */

namespace Blokk;

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) exit;

// ----------------------------

if( !class_exists('Blokk\Helpers') ){

    class Helpers{

        /**
         * Get the sidebar meta data
         * 
         * @param string $key Meta key
         * @param int $post_id Post ID
         * @param bool $output_as_array Output the meta data as an array. Default, as an object
         * 
         * @return mixed Either as object or an array
         */
        function get_sidebar_meta($key, $post_id = false, $output_as_array = false){

            if(!$post_id){
                $post_id = Helpers::get_post_id_by_url();
            }

            $meta = get_post_meta($post_id, $key, 1);
            $meta = json_decode($meta, $output_as_array);
            $meta = json_last_error() === 0 ? $meta : false;

            if($meta){
                $data = $output_as_array ? [] : (object)[];
                foreach($meta as $key => $val){
                    if(!empty($val) && is_string($val)){
                        $decoded = json_decode($val, $output_as_array);
                        if(!$output_as_array){
                            $data->{$key} = $decoded ? $decoded : $val;
                        }
                        else{
                            $data[$key] = $decoded ? $decoded : $val;
                        }
                    }
                }
                return $data;
            }
            return $meta;
        }

        /**
         * Print a formatted string with the text domain already assigned
         * 
         * @param string $format The string to format
         * @param mixed $values (str|arr) An array of values
         * @return mixed Output the formatted string
         * 
         */
        public static function printf($format = '', $values = []){
            if(is_array($values)){
                call_user_func_array('printf', array_merge((array)esc_html__($format, 'blokk'), $values));
            }
            else{
                printf(esc_html__($format, 'blokk'), $values);
            }
        }

        /**
         * Return a formatted string with the text domain already assigned
         * 
         * @param string $format The string to format
         * @param mixed $values (str|arr) An array of values
         * @return mixed Output the formatted string
         * 
         */
        public static function sprintf($format = '', $values = []){
            if(is_array($values)){
                return call_user_func_array('sprintf', array_merge((array)esc_html__($format, 'blokk'), $values));
            }
            else{
                return sprintf(esc_html__($format, 'blokk'), $values);
            }
        }

        /**
         * Escape and echo a string with the text domain already assigned
         * @param string $string The string to escape and echo
         * @return void
         */
        public static function esc_html_e($string){
            esc_html_e($string, 'blokk');
        }

        /**
        * Get the post/page ID
        *
        * It can be used within or outside the loop
        *
        * @return string Returns the post/page ID
        */
        function get_post_id(){
            return in_the_loop() ? get_the_ID() : get_queried_object_id();
        }

        /**
        * Get the post/page ID by current URL
        *
        * @return string Returns the post/page ID
        */
        function get_post_id_by_url(){
            $get_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            return url_to_postid($get_url);
        }

        /**
         * If in a multidimensional array
         * 
         * @param string $needle The value to find in the array
         * @param array $haystack The array to find the needle in
         * @param bool $strict Strictness
         * @return bool The result if need is in the array
         */
        public static function in_multi_array($needle, $haystack, $strict = false) {
            $helpers = new Helpers;
            
            foreach ($haystack as $item) {

                if( ! $strict && is_string( $needle ) && ( is_float( $item ) || is_int( $item ) ) ) {
                    $item = (string)$item;
                }

                if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $helpers::in_multi_array($needle, $item, $strict))) {
                    return true;
                }
            }

            return false;
        }

        /**
        * Get the id of an attachment
        *
        * @param string $url URL of the attachment
        * @return int Return the attachment's ID number
        */
        public static function get_attachment_id($url){
            global $wpdb;
            $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$url'";
            $id = $wpdb->get_var($query);
            return $id;
        }

    }

    new Helpers;

}