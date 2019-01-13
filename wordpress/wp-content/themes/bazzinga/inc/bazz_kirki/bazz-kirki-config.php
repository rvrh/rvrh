<?php 

//** configuring kirki for bazzinga theme *//
/** 
1.0 Configuring Kirki field Id
2.0 Bazzinga Customizer Panels
3.0 Bazzinga Customizer Sections
4.0 Bazzinga Customizer Controls and sections
*/


// 1.0 Add an empty config for global fields.
Kirki::add_config( 'bazzinga_config' );

// 2.0 Bazzinga Panels
get_template_part('inc/bazz_kirki/bazzinga-customizer','panels');

// 3.0 Bazzinga Sections
get_template_part('inc/bazz_kirki/bazzinga-customizer', 'sections');

// 4.0 Bazzinga Controls
get_template_part('inc/bazz_kirki/bazzinga-customizer', 'controls');
