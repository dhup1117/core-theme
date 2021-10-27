<?php
// Color option
Redux::set_section('core_opt', array(
    'title'     => esc_html__( 'Color Scheme', 'core' ),
    'id'        => 'color',
    'icon'      => 'dashicons dashicons-admin-appearance',
    'fields'    => array(
        array(
            'id'          => 'accent_solid_color_opt',
            'type'        => 'color',
            'title'       => esc_html__( 'Accent Color', 'core' ),
            'output_variables' => true,
        ),
        array(
            'id'          => 'secondary_color_opt',
            'type'        => 'color',
            'title'       => esc_html__( 'Secondary Color', 'core' ),
            'subtitle'       => esc_html__( 'Normally used in Titles, Gradient Colors', 'core' ),
            'output_variables' => true,
        ),
        array(
            'id'          => 'paragraph_color_opt',
            'type'        => 'color',
            'title'       => esc_html__( 'Paragraph Color', 'core' ),
            'subtitle'    => esc_html__( 'Normally used in meta content, paragraph, doc lists, subtitles, icon', 'core' ),
            'output_variables' => true,
        ),
    )
));