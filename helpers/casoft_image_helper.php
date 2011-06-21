<?php
/**
 * casoft_image_helper.php
 *
 * Helpers for images
 */

/**
 * casoft_image_get_area
 *
 * This function gets an area in the middle if an image and resizes it
 * 
 * @param string    $images_path        Path to the images dir
 * @param string    $image_name         Original image's name
 * @param string    $new_image_prefix   A prefix to new image's name
 * @param integer   $area_width         The width of the final image
 * @param integer   $area_height        The height of the final image
 * @return boolean
 */
function casoft_image_get_area($images_path, $image_name, $new_image_prefix, $area_width, $area_height) {
    // TODO check if image_lib methods ran ok before returnin TRUE
    // CI Instance
    $CI =& get_instance();

    // How long does it take to run?
    //$CI->output->enable_profiler(TRUE);
    
    $original_image = $images_path . $image_name;

    $image_properties = getimagesize($original_image);

    $original_image_width = $image_properties[0];
    $original_image_height = $image_properties[1];

    unset($image_properties);

    // Is width smaller than the new one?
    if ($original_image_width < $area_width) {
        return FALSE;
    }
    // Is the height smaller than the new one?
    if ($original_image_height < $area_height) {
        return FALSE;
    }

    $width_prop = $original_image_width / $area_width;
    $height_prop = $original_image_height / $area_height;

    // Getting the smaller proportion...
    if ($width_prop < $height_prop) {
        $image_prop = $width_prop;
    }
    else {
        $image_prop = $height_prop;
    }

    unset($width_prop, $height_prop);

    $new_image_width = floor($area_width * $image_prop);
    $new_image_height = floor($area_height * $image_prop);

    $x_cut = $original_image_width - $new_image_width;
    $x_cut = ceil($x_cut / 2);
    $y_cut = $original_image_height - $new_image_height;
    $y_cut = ceil($y_cut / 2);

    // Loading image_lib
    $CI->load->library('image_lib');

    // Cropping image center
    $config = array(
        'image_library'     => 'gd2',
        'source_image'      => $original_image,
        'new_image'         => $images_path . $new_image_prefix . $image_name,
        'x_axis'            => $x_cut,
        'y_axis'            => $y_cut,
        'width'             => $new_image_width,
        'height'            => $new_image_height,
        'maintain_ratio'    => FALSE
    );

    $CI->image_lib->initialize($config);

    $CI->image_lib->crop();

    // And now, resizing
    $config = array(
        'image_library'     => 'gd2',
        'source_image'      => $images_path . $new_image_prefix . $image_name,
        'width'             => $area_width,
        'height'            => $area_height
    );

    $CI->image_lib->initialize($config);

    $CI->image_lib->resize();

    return TRUE;
}

/* End of file caimg_helper.php */
/* Location: ./application/helpers/caimg_helper.php */
